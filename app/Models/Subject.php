<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected  $guarded =[];

    public function chapters(){
        return $this->hasMany(Chapter::class, 'subject_id');
    }

    public function questionbanks()
    {
        return $this->hasManyThrough(QuestionBank::class, Chapter::class);
    }
}
