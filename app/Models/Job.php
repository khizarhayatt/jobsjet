<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function languages(){
        return $this->belongsToMany(Language::class);
    }

    public function organizations(){
        return $this->belongsToMany(Organization::class);
    }

    public function professions(){
        return $this->belongsToMany(Profession::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);

    }
    public function industries(){
        return $this->belongsToMany(Industry::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

     public function benefits(){
         return $this->belongsToMany(Benefit::class);
     }
}