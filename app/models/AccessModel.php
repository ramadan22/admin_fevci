<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AccessModel extends Model
{
    protected $table = 'app_token';

    public $timestamps = true;

    public $primaryKey = 'id_app_token';

    const CREATED_AT = 'created_date';
}
