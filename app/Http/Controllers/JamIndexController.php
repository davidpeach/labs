<?php

namespace App\Http\Controllers;

use App\Models\Jam;
use Illuminate\Http\Request;

class JamIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $jams = Jam::paginate(12);

        return view('jams', [
            'jams' => $jams,
        ]);
    }
}
