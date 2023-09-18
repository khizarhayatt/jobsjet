<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    public function edit(Permission $permission)
    {
        // $this->authorize('PermissionsEdit');
        $data['title']  = "Permission Edit";
        $data['permissions'] = Permission::where('id', $permission->id)->first();

        if (!empty($data['permissions'])) {
            return view('admin.permissions.edit', $data);
        }
        return redirect()->route("permissions.index")->with('error', 'permissions not found!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $single_permission = Permission::where('id', $permission->id)->first();

        if (!empty($single_permission)) {

            $rules = [
                'name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            try {
                $update =  $single_permission->update([
                    'name' => $request->name,

                ]);

                if ($update > 0) {
                    return redirect()->route("permissions.index")->with('success', 'Permission has been update');
                }
                return redirect()->back()->with('error', 'failed to update this Role');
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the permission by its ID
        $permission = Permission::find($id);

        if (!$permission) {
            return redirect()->route('permissions.index')->with('error', 'Permission not found');
        }

        // Delete the permission
        $permission->delete();

        // Redirect back to the list with a success message
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
    }
}
