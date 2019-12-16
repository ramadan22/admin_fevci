<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    protected $table = 'register';

    public $timestamps = true;

    protected $fillable = [
        'full_name',
        'nick_name',
        'address',
        'place_of_birth',
        'birth_of_date',
        'domicile_address',
        'nra_number',
        'police_number',
        'production_year',
        'type',
        'motivation',
        'suggestion',
        'image',
        'created_date',
        'delete_status'
        
    ];

    public $primaryKey = 'id_register';

    const CREATED_AT = 'created_date';
}
