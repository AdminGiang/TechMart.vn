<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'Id';
    public $timestamps = true;

    protected $fillable = [
        'Name',
        'Description',
        'CategoryId',
        'UserId',
        'Price',
        'IsPublish',
        'Sale',
        'Image',
        'Tag',
        'IsTagBlog',
        'Count'
    ];

    protected $casts = [
        'IsPublish' => 'boolean',
        'IsTagBlog' => 'boolean',
        'Price' => 'float',
        'Sale' => 'float',
        'Count' => 'integer'
    ];
} 