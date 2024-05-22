<?php

namespace Packages\RoleManager\App\Http\Controllers\Admin;

use Packages\RoleManager\App\Models\PermissionClassifications as Permission;
use Illuminate\Http\Request;
use Packages\RoleManager\App\Http\Controllers\Controller;
use Packages\RoleManager\App\Http\Requests\StorePermissionTypesRequest as StorePermissionRequest;
use Packages\RoleManager\App\Http\Requests\UpdatePermissionTypesRequest as UpdatePermissionRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Packages\RoleManager\App\Models\PermissionClassifications;
use Packages\RoleManager\App\Http\Requests\UpdatePermissionTypesRequest;
class PermissionClassificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $permissions = Permission::paginate(5)->appends($request->query());;

        return view('role-manager::admin.permission_classfications.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('role-manager::admin.permission_classfications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated());

        return redirect()->route('admin.permission_classfications.index')->with('status-success','New Permission Created');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit( PermissionClassifications $permission_classfication)
    {


      //  abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('role-manager::admin.permission_classfications.edit', compact('permission_classfication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionTypesRequest $request, PermissionClassifications $permission_classfication)
    {


        $permission_classfication->update($request->validated());

        return redirect()->route('admin.permission_classfications.index')->with('status-success','Permission Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
      //  abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $permission->delete();

        return redirect()->back()->with('status-success','Permission Deleted');
    }
}
