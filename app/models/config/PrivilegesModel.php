<?php

namespace App\models\config;

use Illuminate\Database\Eloquent\Model;

class PrivilegesModel extends Model
{
    protected $table = 'privileges';

    protected $fillable = [
        'id_privileges',
        'view_action',
        'create_action',
        'edit_action',
        'delete_action',
        'id_menu',
        'id_sub_menu',
        'id_user',
        'created_date',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_privileges';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

}
