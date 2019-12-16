<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class InfoModel extends Model
{
    protected $table = 'info';

    protected $fillable = [
        'title_info',
        'content_info',
        'image_info',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_info';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
