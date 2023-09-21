<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $keyword = $request->input('keyword');

            // Query the roles table based on the keyword

            $query = Role::orderBy('id', 'ASC');

            if (!empty($keyword)) {
                $query->where('name', 'like', '%' . $keyword . '%');
            }

            $data['permissions'] = Permission::pluck('name', 'id')->all();
            $data['roles'] = $query->paginate(7);;
            return view('admin.roles.list', $data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $role = Role::create([
                'name' => $request->name,
            ]);
            $role->syncPermissions($request->permissions);

            // Create the permission
            if (isset($role->id)) {
                return redirect()->route('roles.index')->with('success', 'Role  Created successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Role $role)
    {
        try {

            $data['role'] = Role::with('permissions')->find($request->id);
            $data['permissions'] = Permission::pluck('name', 'id')->all();
            if (!empty($data['role'])) {
                return view('admin.roles.edit', $data);
            }
            return redirect()->route("roles.index")->with('error', 'Role  not found!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find the role by its ID
            $role = Role::find($id);

            if (!$role) {
                return redirect()->back()->with('error', 'Role not found.');
            }

            // Update the role's name
            $role->name = $request->name;
            $role->save();

            // Sync permissions if needed
            if (isset($request->permissions)) {
                $role->syncPermissions($request->permissions);
            }

            return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the role by its ID
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('roles.index')->with('error', 'Role not found');
        }
        // Delete the role

        try {

            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Role  deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}