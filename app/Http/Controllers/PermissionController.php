<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware('auth:api');
        // $this->middleware(['auth:api', 'scopes:edit,create,delete'])->except(['index', 'show']);
    }

    public function index()
    {
        $permissions = $this->permission::all();

        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required'
        ]);

        $this->permission->create([
            'name' => $request->name
        ]);

        return response()->json('success', 200);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string',
        ]);

        $permission = Permission::findOrFail($id);

        $permission->name = $request->name;

        $permission->save();

        return response()->json('success', 200);

    }

    public function destroy($id)
    {
        //
    }
}
