<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Options;

class OptionsController extends Controller
{
    public function process(Request $request)
    {
        $data = [];
        $optionModel = new Options();
        if (!isset($requestData['homepageswitch'])) {
            $requestData['homepageswitch'] = 0;
        }
        if (!isset($requestData['news_in_menu'])) {
            $requestData['news_in_menu'] = 0;
        }
        foreach ($request->all() as $name => $value) {
            $optionModel->saveOption($name, $value);
        }
        

        return redirect()->back()->with('success', 'Az adatok elmentve');
    }
}
