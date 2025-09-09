<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected  $guarded =[];

     // District.php
     public function division() {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function upazilas() {
        return $this->hasMany(Upazila::class, 'district_id');
    }
}
