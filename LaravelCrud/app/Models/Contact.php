<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  protected $fillable = ['firstname',
    'surname',
    'nickname',
    'email',
    'phone',
    'birthday',
    'isFavorite',
    'type',
    'user_id'];


}