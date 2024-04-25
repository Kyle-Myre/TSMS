<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Allocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'type' , 'is_active' , 'chip_id'
    ];
    /**
     * An Allocation has one unique chip
     */
    public function chip() : HasOne  {
        return $this->hasOne(Chip::class);
    }
}
