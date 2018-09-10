<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $table = 'variable';
    public $timestamps = false;
    protected $fillable = ['name','value'];
}
