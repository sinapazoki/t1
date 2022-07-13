<?php

namespace App\Models\Content;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;


    protected $guarded = [
        'id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function PostCategory()
    {
        return $this->belongsTo(PostCategory::class , 'category_id');
    }
    public function PostCategoryPath()
    {
        return route('post.category' , [$this->PostCategory->slug]);
    }
    public function Author()
    {
        return $this->belongsTo(User::class , 'author_id');
    }
    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
    public function Path()
    {
        return route('post.single' , [$this->PostCategory->slug ,$this->slug]);
    }


}
