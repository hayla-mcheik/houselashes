<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = [
        'code', 'discount_amount', 'valid_from', 'valid_to'
    ];

    protected $dates = [
        'valid_from', 'valid_to'
    ];
    
    public function isValid()
    {
        $now = now();
        return $this->valid_from <= $now && $this->valid_to >= $now;
    }
}
