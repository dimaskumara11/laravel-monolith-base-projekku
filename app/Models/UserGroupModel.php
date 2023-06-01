<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroupModel extends Model
{
    protected $table = 'user_group';
    protected $primaryKey = 'id';
    protected $fillable = ["name"];
    public $timestamps = false;
}