<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Enrolment;
use App\Http\Controllers\Controller;

class EnrolmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrol = DB::table('users_enrolment')
                ->join('users', 'users_enrolment.users_id', '=', 'users.id')
                ->join('role', 'users_enrolment.role_id', '=', 'role.id')
                ->select('users_enrolment.*', 'users.name as username', 'role.name as role_name', 'role.description')
                ->get();
        return view('admin.enrolment.index', compact('enrol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $role = Role::all();

        return view('admin.enrolment.create', compact('user', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'iname' => 'required',
                'irole' => 'required'
            ]
        );

        $roleExist = Enrolment::where('users_id', '=', $request->iname)->where('role_id', '=',$request->irole)->first();

        if ($roleExist == null) {
            $enrol = new Enrolment;
            $enrol->users_id = $request->iname;
            $enrol->role_id = $request->irole;
            $enrol->save();
        }

        return redirect('/enrolments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::all();
        $role = Role::all();
        $enrol = Enrolment::findOrFail($id);

        return view('admin.enrolment.edit', compact('user', 'role', 'enrol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'iname' => 'required',
                'irole' => 'required'
            ]);
    
    
            $enrol = Enrolment::find($id); 
            $enrol->users_id = $request->iname;
            $enrol->role_id = $request->irole;
            $enrol->save();        
    
            return redirect('/enrolments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Enrolment::find($id);
        $role->delete();
        return redirect('/enrolments');
    }
}
