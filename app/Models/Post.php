<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

    ];
    protected $guarded = [

    ];
    public function getAllPosts($value, $published){
        if($published == ''){
            return $this->where('post_type', $value);
        } else {
            return $this->where('post_type', $value)
                        ->where('status', $published);
        }
    }
    public function createPost($data){
        return $this->create($data);
    }
    public function updatePost($id, $data){
        $post = $this->find($id);
        if($post){
            $post->update($data);
            return $post;
        }
        return null;
    }
    public function getPostByTitleOrId($value){
        return $this->where('slug', $value)
                    ->first();
    }
    public function getPostById($value){
        return $this->where('ID', $value)
                    ->first();
    }
}
