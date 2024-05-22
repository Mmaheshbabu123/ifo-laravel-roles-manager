<?php

namespace Packages\RoleManager\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
   protected $table = 'ifo_roles';
    protected $fillable = [
        'title',
        'short_code',
    ];


    public function permissions(){
        return $this->belongsToMany('Packages\RoleManager\App\Models\Permission', 'ifo_role_permissions',  'role_id', 'permission_id');
    }


    static function boot(){

        parent::boot();

        static::deleting(function (Model $model){
           User::where('role_id', $model->id)->update(['role_id' => null]);
        });
    }
}
