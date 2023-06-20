<?php

namespace App\Models;

use App\Models\SubCategory;
// use App\Models\Category;
use App\Models\Tender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $appends = [
        'countTenders'
    ];


    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

    // public function count_tenders()
    // {
    //     return $this->hasManyThrough(Category::class, Tender::class);
    //     // return $this->tenders()->count() + $this->categories()->count();
    // }

}
