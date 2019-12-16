<?php

namespace App\models\config;

use Illuminate\Database\Eloquent\Model;

class IconModel extends Model
{
    protected $table = 'icons';

    public $timestamps = true;

    public $primaryKey = 'id_icon';

}
