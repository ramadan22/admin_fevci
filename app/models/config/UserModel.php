<?php

namespace App\models\config;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public $timestamps = true;

    public $primaryKey = 'id';

}
