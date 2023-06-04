<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            $query = "UPDATE posts SET post_type = ?, post_title = ?, post_excerpt = ?, slug = ?, author = ?, modified_by = ?, post_body = ?, status = ?, priority = ?, post_picture = ? WHERE id = ?";
            DB::update($query, [$data['post_type'], $data['post_title'], $data['post_excerpt'], $data['slug'], $data['author'], $data['modified_by'], $data['post_body'], $data['status'], $data['priority'], $data['post_picture'], $id]);
            return $post;
        }
        return null;
    }
    public function savePost($id, $data)
    {
        if($id == 'new'){
            $this->createPost($data);
        } else {
            $this->updatePost($id, $data);
        }
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
