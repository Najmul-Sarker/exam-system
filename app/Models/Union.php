<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    protected $table = 'unions';
    protected  $guarded =[];

    // Union.php
    public function upazila() {
        return $this->belongsTo(Upazila::class, 'upazila_id');
    }
}
