<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Options extends Model
{
    protected $fillable = ['option_name', 'option_value'];
    protected $guarded = [];

    public function createOption($data)
    {
        return $this->create($data);
    }

    public function updateOption($option, $data)
    {
        $post = $this->where('option_name', $option)->first();
        if ($post) {
            $post->update(['option_value' => $data]);
            return $post;
        }
        return null;
    }

    public function saveOption($option, $data)
    {
        $post = $this->where('option_name', $option)->first();

        if ($post) {
            $query = "UPDATE options SET option_value = $data WHERE option_name = $option";
            DB::update($query, [$data, $option]);
        } else {
            return $this->create(['option_name' => $option, 'option_value' => $data]);
        }
    }

    public function getOption($option)
    {
        return $this->where('option_name', $option)->first();
    }
}
