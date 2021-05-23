<?php

declare(strict_types=1);

namespace Repository;

class #B_CAMEL_NAME#Repository extends \Core\CacheRepository
{
    protected #MODELS_PROP#;

    public function __construct(#MODELS#)
    {
        #SET_MODELS#
    }
}
