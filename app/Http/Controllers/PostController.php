<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function process(Request $request)
    {
        $data = $request->except('id');
        $id = $request->input('id');
        
        $postModel = new Post();
        $postModel->savePost($id, $data);

        return redirect()->back()->with('success', 'Az adatok elmentve');
    }
}
