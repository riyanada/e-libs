<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Role;
use App\Enrolment;

class UsersController extends Controller
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
        $user = User::all();
        return view('admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('admin.user.create', compact('role'));
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
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'name' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
            ]
        );

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'tempat_lahir' => '',
            'tgl_lahir' => '',
            'bio' => '',
            'pp' => '',
            'users_id' => $user->id,
        ]);

        // Enrolment::create([
        //     'users_id' => $user->id,
        //     'role_id' => $request->role,
        // ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::all();
        $user = User::findOrFail($id);
        $enrol = Enrolment::where('users_id', '=', $id)->firstOrFail();
        $profile = Profile::where('users_id', '=', $id)->firstOrFail();
        return view('admin.user.show', compact('role', 'user', 'enrol', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::all();
        $user = User::findOrFail($id);
        // $enrol = Enrolment::where('users_id', '=', $id)->firstOrFail();
        $profile = Profile::where('users_id', '=', $id)->firstOrFail();
        return view('admin.user.edit', compact('role', 'user', 'profile'));
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
                'username' => 'required',
                'email' => 'required',
                'name' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
            ]
        );
            //update user
        $user = User::find($id); 
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

            //update prfoile
        $profile = Profile::firstOrCreate(['users_id' => $id]);
        $profile->name = $request->name;
        $profile->no_telp = $request->no_telp;
        $profile->alamat = $request->alamat;
        $profile->tempat_lahir = '';
        $profile->tgl_lahir = '';
        $profile->bio = '';
        $profile->pp = '';
        $profile->save();

            //update role
        // $enrol = Enrolment::firstOrCreate(['users_id' => $id]); 
        // $enrol->role_id = $request->role;
        // $enrol->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        $enrol = Enrolment::where('users_id', $id)->delete();

        return redirect('/users');
    }
}
