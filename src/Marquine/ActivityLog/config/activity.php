<?php

return [

    'model' => App\Activity::class,

    'diff' => [
        'raw' => true,
        'granularity' => 'word'
    ],

    'log' => [
        'except' => [
            'created_at',
            'updated_at',
            'deleted_at',
        ],
    ],

];
