<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id', 'ASC')->paginate(7);
        return view('admin.permissions.list')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        // Create the permission
        $permissions = Permission::orderBy('id', 'ASC')->paginate(7);
        return view('admin.permissions.list')->with('permissions', $permissions);
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
    public function edit(Permission $request)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd('$id');
        // Validate input
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::find(3);
        $permission->title = "Updated title";
        $permission->save();

        // Create the permission
        $permissions = Permission::orderBy('id', 'ASC')->paginate(7);
        return view('admin.permissions.list')->with('permissions', $permissions);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}