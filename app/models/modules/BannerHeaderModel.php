<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class BannerHeaderModel extends Model
{
    protected $table = 'banner_header';

    protected $fillable = [
        'title_banner_header',
        'description_banner_header',
        'image_banner_header',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_banner_headers';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
