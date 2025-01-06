<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'message_id',
        'image_path'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
