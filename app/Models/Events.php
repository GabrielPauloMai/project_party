<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
   protected $table ='event';
    protected $fillable = ['client_id', 'party_id', 'status'];
   
}
