<?php

declare(strict_types=1);

return [
    //Fields hidden from logging
    'hiddenFields' => [
        'token',
        'password',
        'api-key',
        'secret',
    ],

    //Fields should be renamed in the logs
    'replaceKeys' => [
        'id' => '_id',
        'message' => '_message',
    ],
];
