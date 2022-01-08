<?php
declare(strict_types=1);

namespace Test\xUnit;

use App\xUnit\TestCase;

final class WasRun extends TestCase
{
    public bool   $wasRun   = false;
    public bool   $wasSetUp = false;
    public string $log;

    protected function setUp(): void
    {
        $this->wasSetUp = true;
        $this->log      = 'setUp ';
    }

    public function testMethod(): void
    {
        $this->wasRun = true;
    }
}
