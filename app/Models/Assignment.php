<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'chip_id' , 'staff_id' , 'description' , 'date'
    ];
    /**
     * Every Assignment Has One Chip
     */
    public function chip() : HasOne {
        return $this->hasOne(Chip::class , "id" , "chip_id");
    }
    /**
     * A Staff member is assigned to one assignment
     */
    public function staff() : HasOne {
        return $this->hasOne(Staff::class , "id" , "staff_id");
    }
}
