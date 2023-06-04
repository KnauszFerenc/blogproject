<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Options extends Model
{
    protected $fillable = ['option', 'value'];
    protected $guarded = [];

    public function createOption($data)
    {
        return $this->create($data);
    }

    public function updateOption($option, $data)
    {
        $post = $this->where('option', $option)->first();
        if ($post) {
            $post->update(['value' => $data]);
            return $post;
        }
        return null;
    }

    public function saveOption($option, $data)
    {
        $post = $this->where('option', $option)->first();

        if ($post) {
            $query = "UPDATE options SET value = $data WHERE option = $option";
            DB::update($query, [$data, $option]);
        } else {
            return $this->create(['option' => $option, 'value' => $data]);
        }
    }

    public function getOption($option)
    {
        return $this->where('option', $option)->first();
    }
}
