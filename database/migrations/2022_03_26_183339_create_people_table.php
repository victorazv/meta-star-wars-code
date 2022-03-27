<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', '200');
            $table->string('height', '5');
            $table->string('mass', '5');
            $table->string('hair_color', '25');
            $table->string('skin_color', '25');
            $table->string('eye_color', '25');
            $table->string('birth_year', '10');
            $table->string('gender', '10');
            $table->string('homeworld', '250')->comment('Planet URL');
            $table->text('films')->comment('URLs');
            $table->text('species')->comment('URLs');
            $table->text('vehicles')->comment('URLs');
            $table->text('starships')->comment('URLs');
            $table->string('created', '100');
            $table->string('edited', '100');
            $table->string('url', '100');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
