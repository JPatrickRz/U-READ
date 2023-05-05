<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Is_Admin;

class AdminUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(Is_Admin::class);
    }

    public function upload()
    {
        return view('admin.admin-upload');
    }
}
