<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'post_category_id',
        'content',
        'thumbnail',
        'status'
    ];

    public const LIMIT = 30;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function getCategoryNameAttribute()
    {
        if($this->category){
            return $this->category->name;
        } else {
            return "Unknown";
        }
    }

    public function limit()
    {
        return Str::words(strip_tags($this->content), self::LIMIT);
    }
}
