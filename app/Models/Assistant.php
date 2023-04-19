<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assistant extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['spec'] ?? false){
            $query->where('spec', 'like', '%'.request('spec').'%');
        }

        if($filters['search'] ?? false){
            $query->where('name', 'like', '%'.request('search').'%')
                    ->orWhere('spec', 'like', '%'.request('search').'%')
                    ->orWhere('sex', 'like', '%'.request('search').'%');
        }
    }

    //polymorph 1 to 1 doctor has account:
    public function hasAccount(): MorphOne
    {
        return $this->morphOne(User::class, 'employee_type');
    }  
    //------------------------------------
    //Relation one to many polymorphic: n treatments by 1 doc or 1 assistant
    public function treatments(): MorphMany
    {
        return $this->morphMany(Treatment::class, 'byWho');
    }
    //---------------------------------
    //eloquent relation many to many: assistant has n patients
    //---------------------------------
    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'patient-assistant', 'id', 'id');
    }





}
