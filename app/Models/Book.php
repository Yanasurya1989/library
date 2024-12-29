<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_code',
        'book_title',
        'book_author',
        'book_stock',
        'book_synopsis',
    ];
}