<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'surname',
        'date_of_birth'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }  
    protected function city()
    {
        return $this->belongsTo(City::class);
    }
}
