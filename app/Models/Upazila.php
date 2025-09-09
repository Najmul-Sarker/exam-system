<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    use HasFactory;

    protected $table = 'upazilas';
    protected  $guarded =[];

     // Upazila.php
    public function district() {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function unions() {
        return $this->hasMany(Union::class, 'upazila_id');
    }
}
