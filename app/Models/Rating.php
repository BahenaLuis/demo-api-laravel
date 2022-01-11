<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Rating extends Pivot
{
    use HasFactory;

    protected $table = 'ratings';

    public function reteable() 
    {
        return $this->morphTo();
    }

    public function qualifier() 
    {
        return $this->morphTo();
    }
}
