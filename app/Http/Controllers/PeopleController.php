<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public $arr_people = array();

    public function crawler(){
        $next_page = $this->searchData('https://swapi.dev/api/people/');

        while ($next_page){
            $next_page = $this->searchData($next_page);
        }
        return $this->arr_people;
    }

    public function searchData($url){
        $data = $this->getData($url);
        $this->handlePeople($data->results);
        return $data->next;
    }

    public function getData($url){
        $response = Http::get($url);
        return json_decode($response->body());
    }

    public function handlePeople($people){
        foreach ($people as $person){
            $person->films     = $this->makeString($person->films);
            $person->species   = $this->makeString($person->species);
            $person->vehicles  = $this->makeString($person->vehicles);
            $person->starships = $this->makeString($person->starships);
            $this->arr_people[] = $person;

            $this->insertPerson($person);
        }
    }

    public function makeString($arr){
        $aux = "";
        if (count($arr) > 0) {
            foreach ($arr as $row) {
                $aux .= $row . ",";
            }
            $aux = substr($aux, 0, -1); // Remove a vírgula do final
        }
        return $aux;
    }

    public function insertPerson($person){
        $row = new People();

        $row->name = $person->name;
        $row->height = $person->height;
        $row->mass = $person->mass;
        $row->hair_color = $person->hair_color;
        $row->skin_color = $person->skin_color;
        $row->eye_color = $person->eye_color;
        $row->birth_year = $person->birth_year;
        $row->gender = $person->gender;
        $row->homeworld = $person->homeworld;
        $row->films = $person->films;
        $row->species = $person->species;
        $row->vehicles = $person->vehicles;
        $row->starships = $person->starships;
        $row->created = $person->created;
        $row->edited = $person->edited;
        $row->url = $person->url;

        $row->save((array)$person);
    }
    public function index(){
        return json_encode('a');
    }
}
