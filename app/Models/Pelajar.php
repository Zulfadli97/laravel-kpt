<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    use HasFactory;

    // define table - PRUSER -> default : users
    protected $table = 'PELAJAR';

    // define primary key - USERID -> default : id
    protected $primaryKey = 'ID_Pelajar';

    public $incrementing = true;

    // set timestamps to false
    public $timestamps = false;
}
