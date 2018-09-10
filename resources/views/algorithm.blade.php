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
            .logic {
                font-family: open-sans;
                font-size: 50px;
            }
            .logic br{
                margin: 0;
                padding: 0;
                line-height: 0;
            }
            .logic p {
                margin: 0;
                padding: 20px;
                line-height: 0.9;
            }
        </style>
    </head>
    <body>
        <main>

            <?php
            $kelom = array('K1','K2','K3','K4','K5','K6','K7','K8','K9');
            // ----------------------------------------------checker for making free-day pattern
            // ---- don't look at this method parameter and if condition if u not the developer
            function checker ($a,$b,$n,$x) {
                $x = count($x);
                // $a = $par1
                // $b = $par2
                // $n = $par3
                // $x = $par4

                $para = ($n - ($x - $b));
                //$para = count(area) - ( count(kelompok) - last_select_index )

                //What the mean is this condition, huh?
                // last_select_index + area_count
                if ( $b + $n <= $x && $a > $b && $a <= $b+$n ) :
                    return $a - $b;
                //this too!
                elseif ( $b + $n > $x && $a <= $para ) :
                    return $n - ($para-$a);
                //WHAT IS THIS?
                elseif ( $b + $n > $x && $a > $b ) :
                    return $a-$b;
                // the developer said : "My God Taufik and Hidayah"
                // WHAT ARE YOU TALKING ABOUT???????
                // the developer stay calm and thinking, he is know not everybody can understand what he is said. so he is finding a more common word to say
                //it is algorithm that is not get explained by the code but it still make a sense
                else :
                    return false;
                endif;
            }

            echo '<div class="logic">';
            echo '<p>';
            // $santri variable emulates the database return values (ex: $santri = $mysqli->fetch-array())
            // But for now i write the database return values by 'hard code'
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

            $gh = count($santri) / 2;
            echo $gh;
            echo round($gh);
            $kelompok = array();
            for ($z = 1; $z <= round($gh); $z++):
                // if (1 == 1): break; endif;
                // echo '/// ';
                // var_dump(round($gh) - $gh != 0); echo '   //';
                $nnn = round($gh) - $gh != 0 && $z == round($gh) - 1 ? 1 : 2;
                var_dump($nnn); echo '//  ';
                $arrayss = array_rand($santri, $nnn);
                if ($nnn = 1) :
                    $arrayss = array($arrayss);

                endif;
                $kel= '';
                $count = 1;
                foreach ($arrayss as $value):
                    $comma = $count != 2 ? ', ' : '';
                    $kel = $kel.$santri[$value].$comma;
                    // echo $santri[$value];
                    // echo '  ,';
                    unset($santri[$value]);
                    $count++;
                endforeach;
                $kel = array( 'KEL'.$z => $kel );
                $kelompok = array_merge($kelompok,$kel);
                $kel = '';
            endfor;
            //---------------------------------------- echoing kelompok
            foreach ($kelompok as $key => $value):
                echo $key.'=>'.$value.'<br>';
            endforeach;
            //------------------------
            echo 'A1 A2 A3 A4 A5 <br>';
            $s = 0;

            // ---------------------------------------------------------------------------------
            for ($x=1;$x<=31;$x++) {

                $df = 5;
                for ($g=0;$g<=(count($kelom) - 1);$g++) {
                    if ($fl = checker($g + 1,$s, $df,$kelom )) :
                        echo '  A'.$fl.'=>'.$kelom[$g].' ';
                    else :
                        echo '  ';
                    endif;
                }
                $bn = count($kelom);
                // $s  = 'last selected index from array($kelompok)'
                // $df = 'hasil count dari array($area)'
                // $bn = 'hasil count dari array($kelompok)'
                if ( $s + $df > $bn ) :
                    $s = ($s + $df) - $bn;
                else:
                    $s = $s + $df;
                endif;

                echo 'value s = '.$s;
                echo "<br>";
            }
            echo '</p>';
            echo '</div>';

             ?>
        </main>
    </body>
</html>
