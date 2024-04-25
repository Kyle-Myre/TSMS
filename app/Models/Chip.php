<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chip extends Model
{
    use HasFactory;
    protected $fillable = [
        'type' , 'provider' ,'telephone' , 'is_active'
    ];
    /**
     * A Chip Belongs to one unique asignment
     */
    public function assignment() : BelongsTo {
        return $this->belongsTo(Assignment::class);
    }
    /**
     *  A Chip Belongs to one unique allocation
     */
    public function allocation() : BelongsTo {
        return $this->belongsTo(Allocation::class);
    }
}