<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function process(Request $request)
    {
        // Űrlap adatok feldolgozása
        $data = [];

        foreach ($request->all() as $name => $value) {
            // Az adatok name és value értékeinek mentése
            $data[] = [
                'name' => $name,
                'value' => $value,
            ];
        }
        return redirect()->back()->with('success', 'Az adatok elmentve');
    }
}