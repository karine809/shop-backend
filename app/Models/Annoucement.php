<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annoucement extends Model
{
    use HasFactory;
    protected $table = 'annoucements';

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'solary',
        'user_id'
    ];
}
