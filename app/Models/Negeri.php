<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negeri extends Model
{
    use HasFactory;

    // define table default - 'negeris'
    protected $table = 'NEGERI';

    // define primary key default - 'id'
    protected $primaryKey = 'ID';

    // define timestamps to false
    public $timestamps = false;
}
