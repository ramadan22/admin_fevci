<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    protected $table = 'aboutus';

    protected $fillable = [
        'id_aboutus',
        'content_aboutus',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_aboutus';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
