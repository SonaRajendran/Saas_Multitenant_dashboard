<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'auth' => \App\Filters\AuthFilter::class,
        'rbac' => \App\Filters\RBACFilter::class,
        'tenant' => \App\Filters\TenantFilter::class,
    ];

    public $globals = [
        'before' => [
            'auth' => ['except' => ['auth/*', '/']],
            'tenant' => ['except' => ['auth/*', 'admin/*', '/']],
        ],
        'after' => [],
    ];
}