<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Options;

class OptionsController extends Controller
{
    public function process(Request $request)
    {
        // Űrlap adatok feldolgozása
        $data = [];
        $optionModel = new Options();
        foreach ($request->all() as $name => $value) {
            // Az adatok name és value értékeinek mentése
            $optionModel->saveOption($name, $value);
        }

        return redirect()->back()->with('success', 'Az adatok elmentve');
    }
}
