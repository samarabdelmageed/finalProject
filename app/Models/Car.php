<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'active',
        'content',
        'luggage',
        'doors',
        'passengers',
        'image',
        'category_id',
        ];
        
        public function category(){
            return $this->belongsTo(Category::class, 'category_id');
        }
}
