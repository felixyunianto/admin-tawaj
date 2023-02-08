<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonPage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent(){
        return $this->belongsTo(static::class, 'button_page_id');
    }

    public function children(){
        return $this->hasMany(static::class, 'button_page_id');
    }
}
