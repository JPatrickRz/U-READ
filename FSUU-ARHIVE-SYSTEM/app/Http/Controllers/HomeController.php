<?php

namespace App\Http\Controllers;
use App\Models\Publication;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    // Retrieve all the publications from the database
    $publications = Publication::paginate(8);
    
    // Pass the $publications variable to the view
    return view('home', ['publications' => $publications,'search' => null]);
    }
    
    public function adminHome() {
        
        session()->flash('success', 'You have successfully logged in.');
        return view('admin-dashboard');
    }
}
