<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender',
        'homeworld',
        'films',
        'species',
        'vehicles',
        'starships',
        'created',
        'edited',
        'url',
    ];

    public function getPerson($person){
        return People::where("name", "=", $person)->first();
    }

    public function getPersonByStr($person){
        return People::whereRaw("UPPER(name) LIKE '%".$person."%'")->get();
    }
}
