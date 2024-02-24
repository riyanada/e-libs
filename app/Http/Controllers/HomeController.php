<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UsersEnrolment;
use App\Books;
use App\Category;

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
        $user = \Auth::user();
        $totalCategory =  Category::withCount('books')->count();
        $totalBooks =  Books::withCount('categories')->count();
        $totalUser =  DB::table('users')
                        ->join('users_enrolment', 'users.id', '=', 'users_enrolment.users_id')
                        ->select('users.*')
                        ->where('users_enrolment.role_id', '!=', '1')
                        ->get()->count();
        $books = Books::orderBy('id', 'DESC')->skip(0)->take(6)->get();
        $enrole = UsersEnrolment::where('users_id', '=', $user->id)->firstOrFail()->role_id;
        if ($enrole == 1) {
            $view = view('admin.index', compact('user', 'totalCategory', 'totalBooks', 'totalUser'));
        }else{
            $view = view('users.index', compact('user', 'books'));
        }

        return $view;
    }
}
