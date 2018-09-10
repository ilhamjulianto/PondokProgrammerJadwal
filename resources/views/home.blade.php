@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    @foreach ($santri as $santri1 )
                        <p> name : {{  $santri1->name }}
                    @endforeach
                    <div class='buttonG'>
                        <form method='POST' action='/home/santri'>
                            <p>Buat/Shuffle Group</p>
                            <input type='submit' name='submit' value='GO!'>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class='buttonA'>
                        <form method='POST' action='/home/area'>
                            <p>Masukkan area, gunakan tanda "; " untuk memisahkan antar area. ingat ada spasinya</p>
                            <input type='text' name='area' >
                            <input type='submit' name='submit' value='GO!'>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class='buttonJ'>
                        <form method='POST' action='/home/jadwal'>
                            <p>Buat/Shuffle Jadwal</p>
                            <input type='submit' name='submit' value='GO!'>
                            {{ csrf_field() }}
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
