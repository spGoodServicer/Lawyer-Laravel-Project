<?php

namespace Modules\RolePermission\Repositories;

use App\Repositories\UserRepository;
use Modules\RolePermission\Entities\Role;
use Modules\RolePermission\Entities\Permission;
use Auth;
use Illuminate\Http\Request;
use Modules\RolePermission\Repositories\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        if(Auth::user()->role_id == 1){
            return Role::orderBy('id', 'desc')->get();
        }else{
            return Role::orderBy('id', 'desc')->where('id','>',1)->get();
        }
        
    }

    public function create(array $data)
    {
        $role = new Role();
        $role->name = $data['name'];
        $role->type = $data['type'];
        $role->save();
    }

    public function update(array $data, $id)
    {
        return Role::findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        $role = Role::with('users')->findOrFail($id);
        if ($role->users){
            return false;
        }
        return $role->delete();
    }

    public function normalRoles()
    {
        return Role::where('type','!=','system_user')->get();
    }

    public function regularRoles()
    {
        return Role::where('type', 'regular_user')->get();
    }

}
