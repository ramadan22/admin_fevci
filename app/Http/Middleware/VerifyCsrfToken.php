<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/manage-content/about/update',

        '/manage-content/banner-header/form-edit',
        '/manage-content/banner-header/update',

        '/manage-articles/add',
        '/manage-articles/form-edit',
        '/manage-articles/update',

        '/manage-event/add',
        '/manage-event/form-edit',
        '/manage-event/update',

        '/manage-info/add',
        '/manage-info/form-edit',
        '/manage-info/update',

        '/manage-galery/add',
        '/manage-galery/form-edit',
        '/manage-galery/update',

        '/manage-merchandise/add',
        '/manage-merchandise/form-edit',
        '/manage-merchandise/update',

        '/register',

        '/configuration/update-menu',
        '/configuration/update-privileges-user'
    ];
}
