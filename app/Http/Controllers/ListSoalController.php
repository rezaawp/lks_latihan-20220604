<?php

namespace App\Http\Controllers;

use App\Models\ListSoal;
use Illuminate\Http\Request;

class ListSoalController extends Controller
{
    //
    public function status($id, $boolean,Request $request)
    {  
        return $id;   
        $soal = ListSoal::find($id);
        $soal->update(['status' => $boolean]);

        return redirect()->back();
    }
}
