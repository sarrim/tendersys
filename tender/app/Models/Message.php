<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImages;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

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

    public function from_user(){
        return $this->belongsTo(User::class, 'from_id', 'id');
    }

    public function to_user(){
        return $this->belongsTo(User::class, 'to_id', 'id');
    }

}
