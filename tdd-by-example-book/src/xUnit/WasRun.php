<?php
declare(strict_types=1);

namespace App\xUnit;

class WasRun
{
    public string $wasRun = 'None';

    public function testMethod(): void
    {
        $this->wasRun = '1';
    }

    public function run(): void
    {
        $this->testMethod();
    }
}
