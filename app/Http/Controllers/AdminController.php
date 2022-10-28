<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\AdminCredential;
use App\Mail\CreateAdmin;

class AdminController extends Controller
{
    public function getAllAdmins()
    {
        $admins = User::get();
        $admins->transform(function($admin){
            $admin->role = $admin->getRoleNames()->first();
            $admin->adminPermissions = $admin->getPermissionNames();
            return $admin;
        });

        return response()->json([
            'admins' => $admins
        ], 200);
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:6',
            // 'role' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        // $admin->assignRole($request->role);
        // if ($request->has('permissions')) {
        //     $admin->givePermissionTo($request->permissions);
        // }

        $data = [
            'title' => 'Pinecrest Academy',
            'body' => 'Dear ' . $request->name . '. Welcome to Pinecrest Academy. This are your login credentials.
                        You are adviced to change after the first login',
            'email' => $request->email,
            'password' => $request->password
        ];

        \Mail::to($request->email)->send(new CreateAdmin($data));
        
        $admin->save();

        return response()->json('success', 200);
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'name' => 'string',
            'password' => 'nullable|min:6',
            // 'role' => 'required',
            'email' => 'email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        // if ($request->has('role')) {
        //     $userRole = $user->getRoleNames();
        //     foreach ($userRole as $role) {
        //         $user->removeRole($role);
        //     }

        //     $user->assignRole($request->role);
        // }

        // if ($request->has('permissions')) {
        //     $userPermissions = $user->getPermissionNames();
        //     foreach ($userPermissions as $permission) {
        //         $user->revokePermissionTo($permission);
        //     }

        //     $user->givePermissionTo($request->permissions);
        // }

        $details = [
            'title' => 'Mail from Pinecrest Academy',
            'body' => 'You requested a password change. This is your new password please update it after accessing your account again',
            'email' => $request->email,
            'password' => $request->password
        ];

        \Mail::to($request->email)->send(new AdminCredential($details));

        $user->save();

        return response()->json('success', 200);
    }

    public function destroy($id)
    {
        // return $id;
        $admin = User::findOrFail($id);
        $admin->delete();
        return response()->json('success', 200);
    }
}
