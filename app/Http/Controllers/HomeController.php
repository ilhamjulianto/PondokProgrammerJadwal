<?php

namespace App\Http\Controllers;

use App\Santri;
use App\Variable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Santri = new Santri();
        $Santri = $Santri->all();
        return view('home', ['santri' => $Santri]);
    }
    public function show () {

    }

    public function shuffleGroup () {
        $santri = new Santri();
        // $santri = $santri->where('active', 1)->get();
        $santri = $santri->where('active', 1)->get();
        $newSantri = array();
        foreach($santri as $key => $value ){
            $newSantri[] = $value['name'];
        }
        var_dump($newSantri);
        $group = new group_randomizer($newSantri, 2);
        $group = $group->arrange_group();
        $group = implode('; ', $group);

        $variable = new Variable();
        $variable = $variable->firstOrCreate(
            ['name' => 'group'],
            ['value' => $group]);

        return redirect('home');
    }

    public function shuffleSchedule () {
        $variable = new Variable();
        $group = $variable->where('name', 'group')->get();
        $group = $group[0]['value'];
        $group = explode('; ', $group);

        $variable = new Variable();
        $area = $variable->where('name', 'area')->get();
        $area = $area[0]['value'];
        $area = explode('; ', $area);


        $groupSchedule = new scheduler($group, $area );
        $groupSchedule = $groupSchedule->arrange_schedule();

        $groupSchedule = implode('; ', $groupSchedule);

        $variable = new Variable();
        $variable = $variable->updateOrCreate(
            ['name' => 'groupSchedule'],
            ['value' => $groupSchedule]
        );

        return redirect('home');
    }

    public function area (Request $request){
        $variable = new Variable();
        $variable->name = 'area';
        $variable->value = $request->area;
        $variable->save();
        return redirect('home');
    }

    public function edit_santri (Request $request) {
        $santri = new Santri();
        $santri->find($request->id);
        $santri->name = $request->name;
        $santri->active = $request->active;
        $santri->save();
        return view('home');
    }

    public function delete_santri (Request $request) {
        $santri = new Santri();
        $santri->find($request->id);
        $santri->active = 0;
        $santri->save();
        return view('home');
    }


}
