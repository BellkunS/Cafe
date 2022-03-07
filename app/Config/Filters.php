<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'auth'          => \App\Filters\Auth::class,
        //'filterAdmin'   => \App\Filters\FilterAdmin::class,
        'filterKasir'   => \App\Filters\FilterKasir::class,
        //'filterManager' => \App\Filters\FilterManager::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
     //      'filterAdmin' => [
     //          'except' =>['login/*','login','/']
     //      ],
           'filterKasir' => [
            'except' =>['login/*','login','menu/*','menu/','/menu'],
           ],
    //       'filterManager' => [
     //       'except' =>['login/*','login','/'],
      //     ],
        ],
    //    'after' => [
     //       'filterManager' => ['except' => ['user','menu','pesan','laporan','/dasboard']],
     //       'filterAdmin' => ['except' => ['user','menu','pesan','laporan','/dasboard']],
          'filterKasir' => ['except' => ['pesan/*','laporan/*','dashboard/*']],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
           
      //  ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
