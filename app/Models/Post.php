<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //mass assignment configurations
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'attachment'
    ];

    //relationships one to many
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    //getter $post->attachment_url
    public function getAttachmentUrlAttribute()
    {
        return asset('storage/'.$this->attachment);
    }
}
