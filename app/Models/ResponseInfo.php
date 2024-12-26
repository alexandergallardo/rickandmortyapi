<?php

namespace App\Models;

class ResponseInfo
{
    /**
     * Response info model.
     */
    public function __construct(
        int $count,
        int $pages,
        ?string $next = null,
        ?string $prev = null
    ) {
        //
    }
}