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

    // relationship satu pelajar belongsTo satu negeri
    public function negeri()
    {
        // model , fk , pk
        return $this->belongsTo('App\Models\Negeri', 'Kod_Negeri_IPT', 'KOD_NEGERI');
    }

    public function ipt()
    {
        return $this->belongsTo('App\Models\IPT', 'Kod_IPT', 'KOD_IPT');
    }
}
