<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

            // define table default - 'negeris'
            protected $table = 'client';

            // define primary key default - 'id'
            protected $primaryKey = 'id';

            // define timestamps to false
            public $timestamps = false;

}
