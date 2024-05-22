<?php

namespace Packages\RoleManager\App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Packages\RoleManager\App\Http\Controllers\Controller;
use Packages\RoleManager\App\Http\Requests\StoreRoleRequest;
use Packages\RoleManager\App\Http\Requests\UpdateRoleRequest;
use Packages\RoleManager\App\Models\Permission;
use Packages\RoleManager\App\Models\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Packages\RoleManager\App\Models\PermissionClassifications as PermissionTypes;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('roles_access'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles = Role::with('permissions')->paginate(5)->appends($request->query());;

        return view('role-manager::admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $permissions = Permission::all()->pluck('name', 'id');
        $classifications = PermissionTypes::with('getFunctions')->get()->toArray();

        return view('role-manager::admin.roles.create', compact('permissions','classifications'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')->with('status-success','New Role Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('role-manager::admin.roles.show',compact('role'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $classifications = PermissionTypes::with('getFunctions')->get()->toArray();
        $permissions = Permission::all()->pluck('name', 'id');
      //  print_r($role->permissions()->get()->toArray());exit;
        return view('role-manager::admin.roles.edit', compact('role','permissions','classifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.index')->with('status-success','Role Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back()->with(['status-success' => "Role Deleted"]);
    }
}
