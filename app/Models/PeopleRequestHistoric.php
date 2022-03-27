<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleRequestHistoric extends Model
{
    protected $table = "people_request_historic";

    protected $fillable = [
        'id_people',
        'name',
    ];
}
