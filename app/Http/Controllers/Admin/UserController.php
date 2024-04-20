<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $params = request()->query();
        $users = User::role('user')->filter($params)->paginate($params['row'] ?? 10);

        $data = [
            'users' => $users,
        ];

        return view('pages.admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];

        return view('pages.admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $data = $request->all();

        try {
            DB::beginTransaction();

            // Create User
            $user = User::create($data);

            // Assign Role
            $user->assignRole('user');

            DB::commit();

            notyf()->addSuccess('User created successfully.');

            return back();
        } catch (\Throwable $th) {
            DB::rollBack();

            if(app()->isLocal()){
                throw $th;
            } else {
                notyf()->addError('Failed to create user.');
                return back();
            }
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
    public function edit(string $id)
    {
        $data = [
            'user' => User::findOrFail($id)
        ];

        return view('pages.admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->password){
            $data['password'] = $request->password;
        }

        try {
            DB::beginTransaction();

            // Update User
            $user = User::findOrFail($id);
            $user->update($data);

            // Assign Role
            $user->syncRoles('user');

            DB::commit();

            notyf()->addSuccess('User updated successfully.');

            return back();
        } catch (\Throwable $th) {
            DB::rollBack();

            if(app() && app()->isLocal()){
                throw $th;
            } else {
                notyf()->addError('Failed to update user.');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            // Delete User
            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            notyf()->addSuccess('User deleted successfully.');

            return back();
        } catch (\Throwable $th) {
            DB::rollBack();

            if(app()->isLocal()){
                throw $th;
            } else {
                notyf()->addError('Failed to delete user.');
                return back();
            }
        }
    }
}
