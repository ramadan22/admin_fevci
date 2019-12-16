<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class GaleryModel extends Model
{
    protected $table = 'galery';

    protected $fillable = [
        'thumbnail_galery',
        'image_galery',
        'title_galery',
        'alt_galery',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_galery';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
