<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'kind',
        'word',
        'mean',
        'is_memorized'
    ];

    public function notebook()
    {
        return $this->belongsTo('Notebook');
    }
}
