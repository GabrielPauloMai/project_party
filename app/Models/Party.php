<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table ='parties';
    protected $fillable = ['type', 'date_init', 'date_end', 'guests', 'price', 'description', 'status'];
}
