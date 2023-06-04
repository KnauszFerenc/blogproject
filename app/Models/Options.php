<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $fillable = [

    ];
    protected $guarded = [

    ];
    public function createOption($data){
        return $this->create($data);
    }
    public function updateOption($option, $data){
        $post = $this->where('option', $option);
        if($post){
            $post->update($data);
            return $post;
        }
        return null;
    }
    public function saveOption($option, $data){
        $post = $this->where('option', $option)->first();
        if($post){
            $post->update($data);
            return $post;
        } else {
            return $this->create(['option' => $option], $data);
        }
    }
    public function getOption($option){
        return $this->where('option', $option)
                    ->first();
    }
}
