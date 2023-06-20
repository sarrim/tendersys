<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tender;
use App\Models\User;


class Bid extends Model
{
    use HasFactory;

    protected $table = 'bids';
    protected $guarded = '';


    public function tender(){
        return $this->belongsTo(Tender::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
