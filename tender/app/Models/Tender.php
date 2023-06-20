<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImages;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tender extends Model
{
    use HasFactory;

    protected $table = 'tenders';

    protected $guarded = '';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images(){
        return $this->hasMany(ProductImages::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
