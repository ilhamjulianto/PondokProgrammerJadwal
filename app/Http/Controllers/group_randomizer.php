<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class group_randomizer extends Controller
{
    protected $groupsReturnArray = array();
    protected $memberNum;
    protected $usersRow;

    function __construct ($usersRow, $memberNum) {
        $this->memberNum = $memberNum;
        $this->usersRow = $usersRow;
    }

    function arrange_group () {

        $count = count($this->usersRow) / $this->memberNum;
        $groupNumRound = floor($count);
        $usersRowOwn = $this->usersRow;

        for ( $x=1; $x<=$groupNumRound; $x++ ) :

            $odd = $this->odd_checker( $x );
            $groups = array_rand( $usersRowOwn, $this->memberNum );
            $groupMember = ''; $counter = 1;

            foreach ( $groups as $keyIndex ) :
                $groupMember = $groupMember.$usersRowOwn[$keyIndex].$this->comma_filter($counter);
                unset( $usersRowOwn[$keyIndex] );
                $counter++;
            endforeach;

            $groupMember = array( $groupMember );
            $groupMember = $this->odd_group_filter( $groupMember, $odd, $usersRowOwn );
            $this->groupsReturnArray = array_merge( $this->groupsReturnArray, $groupMember );

            // if ( $odd ) :
            //     break;
            // endif;
        endfor;

        return $this->groupsReturnArray ;

    }

    function odd_checker ( $loopNum ) {
        $userRowCount = count( $this->usersRow );
        $odd = floor( $userRowCount / $this->memberNum );

        if ( $userRowCount % $this->memberNum != 0 && $loopNum == $odd ) :
            return true;
        else:
            return false;
        endif;
    }

    function odd_group_filter ($groupMember, $odd, $customRows ) {
        if ( $odd ) :
            $oddMember = implode( ', ', $customRows );
            foreach ( $groupMember as $key => $value ) :
                $newGroupMember = array( $key => $value.', '.$oddMember );
            endforeach;

            return $newGroupMember;
        else :

            return $groupMember;
        endif;
    }

    function comma_filter ( $loopNum ) {
        if ( $loopNum < $this->memberNum ) :
            return ', ';
        else :
            return '';
        endif;
    }

}
