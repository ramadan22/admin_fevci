<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'event';

    protected $fillable = [
        'title_event',
        'content_event',
        'image_event',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_event';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
