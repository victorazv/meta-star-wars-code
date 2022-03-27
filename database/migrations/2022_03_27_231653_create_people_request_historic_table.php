<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleRequestHistoricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_request_historic', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('id_people')->nullable();
            $table->foreign('id_people')->references('id')->on('people');
            $table->string('name', '200')->comment('Nome digitado na busca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_request_historic');
    }
}
