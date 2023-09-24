<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        try {

            $keyword = $request->input('keyword');

            // Query the roles table based on the keyword

            $query = User::orderBy('id', 'ASC')->where('role', User::ADMIN_ROLE)->with('roles', 'permissions');

            if (!empty($keyword)) {
                $query->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            }

            $data['users'] = $query->paginate(7);
            return view('admin.users.list', $data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        $data['roles'] = Role::pluck('name', 'id')->all();
        $data['permissions'] = Permission::pluck('name', 'id')->all();
        return view('admin.users.create', $data);
    }

    function store(RegisterRequest $request)
    {

        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => User::ADMIN_ROLE,
        ];
        // dd($data);
        $user = User::create($data);

        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');
            $user->profile_photo = $profilePhotoPath;
        }
        $user->assignRole($request->input('roles'));
        $user->syncPermissions($request->input('permissions'));

        $user->save();

        if ($user and $user->id > 0) {
            UserRegisteredEvent::dispatch($user);
            return redirect(route('users.index'))->with('message', 'Succesfully Created!');
        } else {
            return redirect()->back()->with('error', 'Error occured!');
        }
    }
    public function edit(Request $request)
    {

        try {
            $data['user'] = User::find($request->id);

            if (!$data['user']) {
                // Handle the case where the user with the given ID does not exist.
                return redirect()->route('users.index')->with('error', 'User not found');
            }

            $data['roles'] = Role::pluck('name', 'id')->all();
            $data['permissions'] = Permission::pluck('name', 'id')->all();
            return view('admin.users.edit', $data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = [

                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
            ];
            $user = User::find($id);
            if ($request->hasFile('profile_photo')) {
                $profilePhoto = $request->file('profile_photo');
                $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');
                $user->profile_photo = $profilePhotoPath;
            } else {
                $data['profile_photo'] = $user->profile_photo;
            }

            $user->update($data);
            $user->syncRoles($request->input('roles'));
            $user->syncPermissions($request->input('permissions'));
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy(string $id)
    {
        // Find the User by its ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
        // Delete the User

        try {

            $user->delete();
            return redirect()->route('users.index')->with('success', 'User  deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
