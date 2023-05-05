<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllReferenceController extends Controller
{
    public function allReference()
    {
        return view('user.library.allReference');
    }
}
