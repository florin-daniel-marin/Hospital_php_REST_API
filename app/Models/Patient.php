<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Patient extends Model
{
    public function scopeFilter($query, array $filters){
        if($filters['atspec'] ?? false){
            $query->where('atspec', 'like', '%'.request('atspec').'%');
        }

        if($filters['search'] ?? false){
            $query->where('name', 'like', '%'.request('search').'%')
                    ->orWhere('atspec', 'like', '%'.request('search').'%')
                    ->orWhere('sex', 'like', '%'.request('search').'%');
        }
    }

    use HasFactory;
    //eloquent relation 1 to many: doc has n patients
    //---------------------------------
    public function doctors(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'byDoc');
    }
    //---------------------------------
    //eloquent relation many to many: patient has n assistants
    //---------------------------------
    public function assistants(): BelongsToMany
    {
        return $this->belongsToMany(Assistant::class, "patient-assistant", 'id' ,'id');
    }

}
