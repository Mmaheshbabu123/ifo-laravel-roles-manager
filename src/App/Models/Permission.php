<?php

namespace Packages\RoleManager\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
   protected $table = 'ifo_permissions';
    protected $fillable = [
        'name',
        'classification_type',
        'constant_key'
    ];
}
