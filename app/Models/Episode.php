<?php

namespace App\Models;

class Episode
{
    /**
     * @param  string[]  $characters
     */
    public function __construct(
        int $id,
        string $name,
        string $air_date,
        string $episode,
        array $characters,
        string $url,
        string $created
    ) {
    }
}
