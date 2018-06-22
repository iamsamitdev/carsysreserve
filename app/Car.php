<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['license','cartype','carseat','carlevel','carimg_1','carimg_2','carimg_3','owner','responsibility','status'];
}
