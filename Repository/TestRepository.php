<?php

declare(strict_types=1);

namespace Repository;

class TestRepository extends \Core\CacheRepository
{
    protected $t1;
    protected $t2;
    protected $t3;

    public function __construct(\Model\Test\T1 $t1, \Model\Test\T2 $t2, \Model\Test\T3 $t3)
    {
        $this->t1 = $t1;
        $this->t2 = $t2;
        $this->t3 = $t3;
    }
}
