<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .lab {
                font-size: 50px;
            }
        </style>
    </head>
    <body>
        <br>
        <div class="lab">
        <?php
        // Just think there is a $row array
        // $row = fresh from mysqli class
        $santri = array(
            'zamm',
            'developer',
            'bagas',
            'yahya',
            'ali',
            'ajun',
            'hafidz',
            'hanif',
            'ari',
            'mukhlas' ,
            'rahmadi' ,
            'muhyidin' ,
            'syarif' ,
            'amrozi' ,
            'alfan' ,
            'akbar' ,
            'akmal' ,
            'abian' ,
            'dzee' ,
            'mufid' ,
            'miko'  );

        function odd_group_filter ($group, $odd, $row) {
            if ($odd) :
                $last = implode(', ', $row);
                foreach ($group as $key => $value) :
                    $new_group = array( $key => $value.', '.$last );
                endforeach;
                    return $new_group;
            else :
                return $group;
            endif;
        }

        function odd_checker ($loop_count, $rows, $divider) {
            $row_count = count($rows);
            // var_dump($odd = $row_count / $divider );
            $odd = ceil($row_count / $divider) - 1;

            // echo 'section ------------------------------------------'.$loop_count;
            if ($row_count % $divider != 0 && $loop_count == $odd) :
                return true;
            else:
                return false;
            endif;
        }

        function comma_filter ($max, $number) {
            if ( $number < $max ) :
                return ', ';
            else :
                return '';
            endif;
        }

        function group_randomizer ($users = 'santri', $member = 'jumlah member') {
            $count = count($users) / $member;
            $group_num = $count;
            $group_num_round = ceil($group_num);
            var_dump($group_num_round);
            // $group_num_round = round($count);
            $groups_array = array();
            $users_this = $users;

            for ($x=1;$x<=$group_num_round;$x++) :

                $odd_group = odd_checker($x, $users, $member );
                $groups = array_rand($users_this, $member );
                $group = '';$counter = 1;

                foreach ($groups as $key) :
                    $group  = $group.$users_this[$key].comma_filter($member,$counter);
                    unset($users_this[$key]);
                    $counter++;
                endforeach;

                // if ($odd_group == false) { die(var_dump($odd_group)); };
                $group = array($x => $group);
                $groups_array = array_merge($groups_array, odd_group_filter($group, $odd_group, $users_this ) );
                // $groups_array = array_merge($groups_array, odd_group_filter($group, false, $users_this ) );

                if ($odd_group) :
                    break;
                endif;
            endfor;
            return $groups_array;
        }

        function scheduler ($area_count,$rows) {
            for ($x=1;$x<=$area;$x++) {
                $rows_count = count($rows);

            }
        }

        $kelompok = group_randomizer($santri, 2 );


        // ------------------------------------class scheduler
        $area = array('A1','A2','A3','A4','A5');
        function schedule_pattern_maker ($area_rows = 'ini row area ya cuy', $kelompok1 = 'row array yang di return group_randomizer') {
            $indexLastSelect = 0;
            for ($b=1;$b<=2;$b++) {

                $schedule = array();

                for ($x=1;$x<=count($kelompok1);$x++) {
                    if ( $newIndex = picker($x, $indexLastSelect, count($area_rows), count($kelompok1) )) :
                        echo 'A'.$newIndex.' => '.$kelompok1[$x-1];
                    endif;
                }

                if ( count($area_rows) + $indexLastSelect > count($kelompok1) ):
                    $indexLastSelect = count($area_rows) + $indexLastSelect - count($kelompok1);
                else:
                    $indexLastSelect = count($area_rows) + $indexLastSelect;
                endif;
                echo '<br><br><br>';
            }

        }

        function picker ($array_index , $last_index, $row_count, $groups_count ) {
            $index_TopLimit = $last_index + $row_count;
            $index_BottomLimit = $row_count - ( $groups_count - $last_index );

            if ( $index_TopLimit <= $groups_count && $array_index > $last_index && $array_index <= $index_TopLimit ) :
                return $new_index = $array_index - $last_index;

            elseif ( $index_TopLimit > $groups_count && $array_index <= $index_BottomLimit ) :
                return $new_index = $row_count - ( $index_BottomLimit - $array_index );

            elseif ( $index_TopLimit > $groups_count && $array_index > $last_index && $array_index <= $groups_count ) :
                return $new_index = $array_index - $last_index;
            else:
                return false;
            endif;
        }
         var_dump($kelompok);
         schedule_pattern_maker($area,$kelompok);
        ?>
    </div>
    </body>
</html>
