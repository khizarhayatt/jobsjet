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
        try {
            $data['permissions'] = Permission::orderBy('id', 'ASC')->paginate(7);
            return view('admin.permissions.list', $data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
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

        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $permission = Permission::create([
                'name' => $request->name,
            ]);
            // Create the permission
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully');
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
    public function edit(Request $request, Permission $permission)
    {
        try {

            $data['permissions'] = Permission::where('id', $request->id)->first();
            if (!empty($data['permissions'])) {
                return view('admin.permissions.edit', $data);
            }
            return redirect()->route("permissions.index")->with('error', 'Permission  not found!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {

        $single_permission = Permission::where('id', $request->id)->first();

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

        try {

            $permission->delete();
            return redirect()->route('permissions.index')->with('success', 'Permission  deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
