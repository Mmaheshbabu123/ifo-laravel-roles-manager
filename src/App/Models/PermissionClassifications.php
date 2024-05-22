<?php

namespace Packages\RoleManager\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\RoleManager\App\Models\Permission;
class PermissionClassifications extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'permission_classfications';
    protected $fillable = [
        'name',
    ];
    public  function getFunctions(){
        return $this->hasMany(Permission::class,'classification_type');

    }

}
