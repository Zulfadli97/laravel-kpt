<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CustomUser extends User
{
    use HasFactory;

    protected $table = 'PRUSER';
    protected $primaryKey = 'USERID';
    public $timestamps = false;
}
