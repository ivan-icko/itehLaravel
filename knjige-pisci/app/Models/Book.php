<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'abstract',
        'year_of_publication'
    ];

   public function genre()
   {
       return $this->belongsTo(Genre::class);
   }

   public function writer()
   {
       return $this->belongsTo(Writer::class);
   }
}

