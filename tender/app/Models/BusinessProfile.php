<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessProfile extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user(){
        return $this->hasMany(User::class);
    }

}