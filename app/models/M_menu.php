<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class M_menu extends Model
{
    protected $table = "menu";
    protected $fillable = [
        'name_menu',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_menu';

    const CREATED_DATE = 'created_date';
    const UPDATED_DATE = 'updated_at';
}