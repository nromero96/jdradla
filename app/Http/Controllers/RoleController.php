<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index(){
        // $category_name = '';
        $data = [
            'category_name' => 'roles',
            'page_name' => 'roles',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        $roles = Role::all();
        return view('pages.roles.index')->with($data)->with('roles',$roles);
    }

    public function create(){
        // $category_name = '';
        $data = [
            'category_name' => 'roles',
            'page_name' => 'rolecreate',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        $permissions = Permission::all();
        return view('pages.roles.create')->with($data)->with('permissions',$permissions);
    }


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.edit', $role)->with('info','The role was created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('pages.roles.show')->with($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category_name = '';
        $data = [
            'category_name' => 'roles',
            'page_name' => 'roleedit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $role = Role::find($id);
        $permissions = Permission::all();
        $rolepermissions = \DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('pages.roles.edit')->with($data)->with('role',$role)->with('permissions',$permissions)->with('rolepermissions',$rolepermissions);
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
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->save();

        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.edit', $id)->with('info','The role was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
