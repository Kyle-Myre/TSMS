<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    use HasFactory;
    protected $table = "staff";
    protected $fillable = [
        'registration_number' , 
        'first_name', 
        'last_name', 
        'entity_id',
    ];
    /**
     * A Staff member belongs to a single entity (group)
     */
    public function entity() : BelongsTo  {
        return $this->belongsTo(Entity::class);
    }
    /**
     * A Staff has many possible assignments
     */
    public function assignment() : HasMany {
        return $this->hasMany(Assignment::class);
    }
}
