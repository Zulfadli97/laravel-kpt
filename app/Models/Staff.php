<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
            // define table default - 'vstafs'
            protected $table = 'vstaf';

            // define primary key default - 'id'
            protected $primaryKey = 'ID';

            // define timestamps to false
            public $timestamps = false;

}
