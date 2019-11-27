<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_menu extends Model
{
    protected $table = "menu";
    protected $fillable = [
        'name_menu',
        'name_modul',
        'created_date',
        'update_date',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_menu';

    const CREATED_DATE = 'created_date';
    const UPDATED_DATE = 'update_date';
}