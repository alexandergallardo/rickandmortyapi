<?php

namespace App\Models;

class Character
{
    /**
     * @param  int[]  $episode
     */
    public function __construct(
        int $id,
        string $name,
        string $status,
        string $species,
        string $type,
        string $gender,
        string $image,
        array $episode,
        string $url,
        string $created
    ) {
        //
    }
}