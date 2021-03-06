<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/image',
        'api/maps',
        'api/image/{id}',
        'api/marker/{id}',
        'api/objects/post',
        'api/category',
        'api/objects',
        'api/objects/data',
        'api/objects/update'
    ];
}
