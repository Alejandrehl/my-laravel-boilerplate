<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'display_name', 'description'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function users() {
        return $this->belongsToMany(User::class, 'assigned_roles');
    }
}
