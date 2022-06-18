<?php
namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function users() {
        return $this->belongsToMany(User::class,'users_roles');
    }
}
