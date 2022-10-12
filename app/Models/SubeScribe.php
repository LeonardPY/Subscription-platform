<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubeScribe extends Model
{
    use HasFactory;

    protected $table = 'subscribers';

    protected $fillable = [
        'email',
        'website_id'
    ];

    public function website()
    {
        return $this->belongsTo(WebSite::class,'website_id','id');
    }

}
