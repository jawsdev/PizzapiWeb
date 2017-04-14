<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sides extends Model
{
    protected $fillable = ['imagePath', 'title', 'description', 'price'];
}
