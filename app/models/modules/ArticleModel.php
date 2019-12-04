<?php

namespace App\models\modules;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'article';

    protected $fillable = [
        'title_article',
        'content_article',
        'image_article',
        'delete_status'
    ];

    public $timestamps = true;

    public $primaryKey = 'id_article';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'update_date';
}
