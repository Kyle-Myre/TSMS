<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Abstract Entity or group of the system
 */
class Entity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 
        'description'
    ];
    /**
     * A Single entity has many entities
     */
    public function staff() : HasMany {
        return $this->hasMany(Staff::class);
    }
}
