<?php

namespace App\models\config;

use Illuminate\Database\Eloquent\Model;

class PrivilegesModel extends Model
{
    protected $table = 'privileges';

    public $timestamps = true;

    public $primaryKey = 'id_privileges';

}
