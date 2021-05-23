<?php

declare(strict_types=1);

namespace Controller;

class TestController
{
    protected $testService;

    public function __construct(
        \Service\TestService $testService
    ) {
        $this->testService = $testService;
    }

    public function test()
    {
        try {

        } catch (\Exception $e) {
            
        }
    }
}
