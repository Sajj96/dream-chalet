<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function property()
    {
        return $this->belongsToMany(Property::class, 'property_stages')->withPivot(['id','price']);
    }

    public function getStagePriceAttribute()
    {
        if($this->property){
            return $this->pivot->price;
        } else {
            return 0;
        }
    }
}
