<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){

        $roles=DB::table('roles')->get();
        return view('role.index',compact('roles'));
    }
    public function create(){
        return view('role.create');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('roles')->insert($data);

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }
    public function edit($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now(),
        ];

        $updated = DB::table('roles')->where('id', $id)->update($data);

        if ($updated) {
            return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
        } else {
            return redirect()->route('roles.index')->with('error', 'Role not found or no changes made.');
        }
    }

    public function destroy($id)
    {
        $deleted = DB::table('roles')->where('id', $id)->delete();

        if ($deleted) {
            return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
        } else {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        }
    }


}
