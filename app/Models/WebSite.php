<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class WebSite extends Model
{
    use HasFactory;

    protected $table = 'web_sites';

    protected $fillable = [
        'email',
        'name'
    ];

    public function post()
    {
        return $this->hasMany(Post::class,'website_id','id');
    }

    public function subscribers()
    {
        return $this->hasMany(SubeScribe::class,'website_id','id');
    }

}
