<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public $arr_people = array();

    public function index(){
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
            // insertPerson($person);
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

    public function crawler(){
        return json_encode('a');
    }
}
