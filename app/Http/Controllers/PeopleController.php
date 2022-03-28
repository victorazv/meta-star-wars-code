<?php

namespace App\Http\Controllers;
use App\Models\PeopleRequestHistoric;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    public $arr_people = array();

    public function crawler(){
        $next_page = $this->searchData('https://swapi.dev/api/people/');
        // $next_page = null; // Linha par salvar somente 10 dados no teste
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
        $row->fill((array)$person);

        $find_person = People::getPerson($row->name);
        if(!$find_person){
            $row->save();
        }
    }

    public function extractIds($people){
        $arr_ids = array();

        foreach ($people as $person){
            $arr_ids[] = $person->id;
        }

        return $arr_ids;
    }

    public function index(Request $request){

        $people     = People::getPersonByStr($request->person);
        $ids_people = $this->extractIds($people);

        Artisan::call('historic:insert', ['people' => $ids_people, 'str_search' => $request->person]);

        return (count($people) > 0 ? $people : ["message" => "Registros não encontrados"]);
    }
}
