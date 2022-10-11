<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'notebook_name',
        'discription',
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function words()
    {
        return $this->hasMany('Word');
    }
}
