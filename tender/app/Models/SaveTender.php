<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveTender extends Model
{
    use HasFactory;

    protected $table = 'saved_tenders';
    protected $guarded = '';
}
