<?php

namespace App\Http\Controllers;

use App\Santri;
use App\Variable;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function index () {
        if (
        $areaRows = Variable::where('name', 'area')->get() &&
        $schedule = Variable::where('name', 'schedule')->get()
        ) :
            return view('machine', ['area' => $areaRows, 'schedule' => $schedule ]);
        endif;
    }

    public function store (Request $request) {
        $santri = new Santri();
        $santri->name = $request->name;
        $santri->active = 1;
        $santri->save();
        return redirect('/welcome');
    }
    public function show () {
        $variable = new Variable();
        $groupSchedule = $variable->where('name', 'groupSchedule')->get();

        $area = new Variable();
        $area = $area->where('name', 'area')->get();

        $area = $area[0]['value'];
        $groupSchedule = $groupSchedule[0]['value'];

        $groupSchedule = explode('; ', $groupSchedule);
        $area = explode('; ', $area );
        $schedule = array();
        foreach ($area as $keyIndex => $value ):
            $schedule = array_merge($schedule , array($value => $groupSchedule[$keyIndex]));
        endforeach;

        return view('/welcome', ['schedule' => $schedule ]);
    }

    public function uji_coba() {
        $variable = new Variable();
        $area = $variable->where('name','area')->get();
        return view('testing', ['area' => $area]);
    }
}
