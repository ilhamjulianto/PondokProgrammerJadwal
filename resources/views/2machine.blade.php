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
        $great = 0;
        $lastIndex = 0;

        // for ($x=0; $x <= 30 ; $x++)
        //     {        $area = array(
        //                 0 => 'A1',
        //                 1 => 'A2',
        //                 2 => 'A3',
        //                 3 => 'A4',
        //                 4 => 'A5'
        //             );
        //             $group = array(
        //                 0 => '1adrian, basuki',
        //                 1 => '2miko, rahmadi',
        //                 2 => '3ajun, ali',
        //                 3 => '4latif, mukhlas',
        //                 4 => '5hafidz, andari',
        //                 5 => '6hanif, syarif',
        //                 6 => '7muhyidin, musa',
        //                 7 => '8orang, partner'
        //             );
        //             $jadwal= array();
        //
        //
        //             $areaMoverNum = null;
        //
        //             if ( isset( $areaMoverNum ) ) :
        //                 $areaCount = count($area) + $areaMoverNum;
        //             else :
        //                 $areaCount = count($area);
        //             endif;
        //
        //             $groupCount = count($group);
        //             foreach ($area as $areaKeyIndex => $areaValue ) :
        //                 foreach ($group as $groupKeyIndex => $groupValue ) :
        //                     if ( ( $lastIndex + $areaKeyIndex ) - $groupCount == $groupKeyIndex ) :
        //                         $jadwal[] = $groupValue;
        //                         break;
        //                     elseif ( $lastIndex + $areaKeyIndex == $groupKeyIndex ) :
        //                         $jadwal[] = $groupValue;
        //                         break;
        //                     endif;
        //                 // foreach ($group as $groupIndex => $groupValue ):
        //                 //
        //                 //     if ($groupIndex >= $great ){if ( ($lastIndex+$areaCount) >= $groupCount && $groupIndex <= ($lastIndex+$areaCount) - $groupCount ) :
        //                 //         $jadwal = array_merge($jadwal, array($value => $groupValue) );
        //                 //         continue;
        //                 //     elseif ( ($lastIndex+$areaCount) < $groupCount && (($groupIndex > $lastIndex ) || $groupIndex <= $lastIndex)):
        //                 //         $jadwal = array_merge($jadwal, array($value => $groupValue) );
        //                 //         continue;
        //                 //     elseif (( $lastIndex+$areaCount) >= $groupCount && $groupIndex > $lastIndex) :
        //                 //         $jadwal = array_merge($jadwal, array($value => $groupValue) );
        //                 //         continue;
        //                 //     endif;}
        //                 //
        //                 // endforeach;
        //                 // $great++;
        //                 endforeach;
        //             endforeach;
        //             if ($lastIndex + $areaCount >= $groupCount) :
        //                 $lastIndex = ($lastIndex+$areaCount) - $groupCount;
        //             else:
        //                 $lastIndex = $lastIndex + $areaCount;
        //             endif;
        //
        //             var_dump($jadwal);
        //             echo "<br><br>";
        //         }

                function customArrayRand($array, $number) {
                    $arrCount = count($array);
                    $return = array();
                    $numRows = array();
                    for ($a=1;$a<=$number;$a++) {
                        do {
                            $random = mt_rand(0,$arrCount-1);
                        } while ( check_random($array,$random,$numRows) );
                        $numRows[] = $random;
                        $return[] = $random;
                    }
                    return $return;
                }

                function check_random($par0, $par1, $par2) {
                    foreach ($par2 as $value) :
                        if( $par1 ==  $value) :
                            return true;
                            break;
                        else:
                            continue;
                        endif;
                    endforeach;
                    return false;
                }
                $group = array(
                    '1adrian',
                    '2miko',
                    '3ajun',
                    '4latif',
                    '5hafidz',
                    '6hanif',
                    '7muhyidin',
                    '8orang'
                );

                $arrayss = customArrayRand($group, 2);
                $gr = $group;
                $rtrn = '';
                $rrtrn = array();
                for ($j=1;$j<=4;$j++) :

                    $arrayss = customArrayRand($gr, 2);
                    foreach ($arrayss as $g) :
                        while (array_key_exists($g, $gr) != true ) :
                            $g = customArrayRand($gr, 1);
                            $g = $g[0];
                        endwhile;

                        unset($gr[$g]);
                        var_dump($gr);echo '<br><br><br>';
                    endforeach;
                    $rtrn = $rtrn.'; ';
                endfor;
                var_dump($rtrn);echo '<br><br><br>';
        ?>
    </div>
    </body>
</html>
