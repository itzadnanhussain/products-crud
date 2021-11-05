<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'created_at'
    ];
 
    protected $hidden = [
        '',
        
    ];

   
    protected $casts = [
        // 'created_at' => 'datetime',
    ];
}
