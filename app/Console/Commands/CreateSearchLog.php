<?php

namespace App\Console\Commands;

use App\Models\PeopleRequestHistoric;
use Illuminate\Console\Command;

class CreateSearchLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'historic:insert {people} {str_search}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere o parâmetro digitado na busca e os ids dos registros encontrados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $people     = $this->argument('people');
        $str_search = $this->argument('str_search');

        // dd($people, $str_search);

        if (count($people) == 0){
            $person_historic            = new PeopleRequestHistoric();
            $person_historic->id_people = null;
            $person_historic->name      = $str_search;
            $person_historic->save();
        }
        else{
            foreach ($people as $person){
                $person_historic            = new PeopleRequestHistoric();
                $person_historic->id_people = $person;
                $person_historic->name      = $str_search;
                $person_historic->save();
            }
        }

    }
}
