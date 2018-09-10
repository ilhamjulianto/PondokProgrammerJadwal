<?php

namespace App\Http\Controllers;

use App\Variable;
use Illuminate\Http\Request;

class scheduler extends Controller
{
    protected $areaRows;
    protected $scheduleReturnArray = array();
    protected $groupRows;
    protected $lastIndex;
    protected $groupRowsCount;
    protected $areaRowsCount;

    public function __construct ( $groupRows, $areaRows) {

        $this->groupRowsCount = count($groupRows);
        $this->areaRowsCount = count($areaRows);
        $this->groupRows = $groupRows;
        $this->areaRows = $areaRows;
        $this->setLastIndex();

    }


    public function arrange_schedule () {

        foreach ( $this->areaRows as $areaKeyIndex => $areaValue ) :
            $selectedIndex = $this->lastIndex + $areaKeyIndex;
            foreach ( $this->groupRows as $groupKeyIndex => $groupValue ) :
                if ( $selectedIndex == $groupKeyIndex ) :
                    $this->scheduleReturnArray[] = $groupValue;
                    break;
                elseif ( $selectedIndex - $this->groupRowsCount == $groupKeyIndex ) :
                    $this->scheduleReturnArray[] = $groupValue;
                    break;
                endif;
            endforeach;
        endforeach;

        // Untuk check apakah range lastIndex melebihi jumlah group
        $this->check_last_index();
        $this->save_last_index();

        return $this->scheduleReturnArray ;
    }

    public function check_last_index () {
        $range = $this->lastIndex + $this->areaRowsCount;
        if ( $range >= $this->groupRowsCount ) :
            $this->lastIndex = $range - $this->groupRowsCount;
        else :
            // die(var_dump($range));

            $this->lastIndex = $range;
        endif;
    }

    public function save_last_index() {
        $variable = new Variable;
        $variable = $variable->updateOrCreate(
            ['name' => 'lastindex'],
            ['value' => $this->lastIndex]);
    }

    public function setLastIndex() {
        $variabel = new Variable();
        $lastIndex = $variabel->where('name', 'lastindex')->first();
        if( !isset($lastIndex->value) ) :
            // die(var_dump($lastIndex->value));
            $this->lastIndex = 0;
        else:
            // die(var_dump($lastIndex[0]['value']));
            $this->lastIndex = $lastIndex->value;
        endif;
    }

}
