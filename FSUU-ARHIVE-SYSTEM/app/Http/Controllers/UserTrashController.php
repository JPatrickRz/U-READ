<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTrashController extends Controller
{
    public function trash()
    {
        return view('user.trash');
    }
}
