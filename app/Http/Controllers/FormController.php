<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function saveData(Request $request){
        $data = $resuest->all();
        foreach ($data as $key => $value){
            Option::create([
                'option' => $key,
                'value' => $value,
            ]);
        }
        return response()->json(['message' => 'Sikeres beküldés']);
    }
}
