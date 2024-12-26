<?php

namespace App\Models;

class EpisodeResponse
{
    /**
     * @param  Episode[]  $results
     */
    public function __construct(
        ResponseInfo $info,
        array $results
    ) {
        //
    }
}