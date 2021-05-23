<?php

declare(strict_types=1);

namespace Service;

class TestService
{
    protected $testRepository;

    public function __construct(\Repository\TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }
}
