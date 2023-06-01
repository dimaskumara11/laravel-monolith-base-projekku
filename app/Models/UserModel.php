<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{
    use SoftDeletes;
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ["user_group_id","username","password"];
    protected $hidden = ["password"];
    public $timestamps = true;

    function getUserGroup(): HasOne
    {
        return $this->hasOne(UserGroupModel::class, "id", "user_group_id");
    }
}