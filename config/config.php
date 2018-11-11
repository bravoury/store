<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'guru',

    /*
     * Package.
     */
    'package'   => 'store',

    /*
     * Modules.
     */
    'modules'   => ['store'],


    'store'       => [
        'model'             => 'Guru\Store\Models\Store',
        'table'             => 'stores',
        'presenter'         => \Guru\Store\Repositories\Presenter\StoreItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'name',  'lat',  'lng',  'phone',  'working_hours'],
        'translate'         => ['name',  'lat',  'lng',  'phone',  'working_hours'],

        'upload-folder'     => '/uploads/store/store',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'status',
        ],
    ],
];
