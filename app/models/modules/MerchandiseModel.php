<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class MerchandiseModel extends Model
{
    protected $table = 'merchandise';

    protected $fillable = [
        'id_merchandise',
        'name_merchandise',
        'description_merchandise',
        'image_merchandise',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_merchandise';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
