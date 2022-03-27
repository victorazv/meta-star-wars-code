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
            $table->string('height', '5')->nullable();
            $table->string('mass', '5')->nullable();
            $table->string('hair_color', '25')->nullable();
            $table->string('skin_color', '25')->nullable();
            $table->string('eye_color', '25')->nullable();
            $table->string('birth_year', '10')->nullable();
            $table->string('gender', '10')->nullable();
            $table->string('homeworld', '250')->comment('Planet URL')->nullable();
            $table->text('films')->comment('URLs')->nullable();
            $table->text('species')->comment('URLs')->nullable();
            $table->text('vehicles')->comment('URLs')->nullable();
            $table->text('starships')->comment('URLs')->nullable();
            $table->string('created', '100')->nullable();
            $table->string('edited', '100')->nullable();
            $table->string('url', '100')->nullable();
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
