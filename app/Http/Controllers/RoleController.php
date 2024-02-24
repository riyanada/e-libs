<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
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
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
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
                'icode' => 'required',
                'idescription' => 'required'
            ],
            [
                'iname.required' => 'Harap masukan role',
                'icode.required'  => 'Harap masukan code role',
                'idescription.required'  => 'Harap masukan desc role'
            ]
        );

        $role = new Role;
        $role->name = $request->iname;
        $role->code = $request->icode;
        $role->description = $request->idescription;
        $role->save();

        return redirect('/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.role.edit', compact('role'));
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
                'icode' => 'required',
                'idescription' => 'required'
            ],
            [
                'iname.required' => 'Harap masukan role',
                'icode.required'  => 'Harap masukan code role',
                'idescription.required'  => 'Harap masukan desc role'
            ]
        );

        $role = Role::find($id); 
        $role->name = $request->iname;
        $role->code = $request->icode;
        $role->description = $request->idescription;
        
        $role->save();

        return redirect('/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/role');
    }
}
