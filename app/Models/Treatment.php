<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    public function scopeFilter($query, array $filters){
        if($filters['type'] ?? false){
            $query->where('type', 'like', '%'.request('type').'%');
        }

        if($filters['search'] ?? false){
            $query->where('name', 'like', '%'.request('search').'%')
                    ->orWhere('type', 'like', '%'.request('search').'%')
                    ->orWhere('problem', 'like', '%'.request('search').'%')
                    ->orWhere('byWho_tag', 'like', '%'.request('search').'%')
                    ->orWhere('byWho_id', 'like', '%'.request('search').'%');
        }
    }
    


    use HasFactory;

    public function patients(){
        return $this->hasOne(Patient::class);
    }

    //Relation one to many polymorphic: n treatments by 1 doc or 1 assistant
    public function byWho(): MorphTo
    {
        return $this->morphTo();
    }

}
