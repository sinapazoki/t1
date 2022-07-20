<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function parent()
    {
        return $this->belongsTo($this , 'parent_id')->with('parent');
    }
    public function child()
    {
        return $this->hasMany($this , 'parent_id')->with('child');
    }
}
