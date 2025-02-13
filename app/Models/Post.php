<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'nama',
        'stock',
        'berat',
        'harga',
        'kondisi',
        'deskripsi',
    ];

    protected $with = ['categories'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories', 'post_id', 'category_id');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}