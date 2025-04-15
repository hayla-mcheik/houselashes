<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{
    use HasFactory;
    protected $table='reviews_models';
    protected $fillable = ['name','title','description','image','status'];
}
