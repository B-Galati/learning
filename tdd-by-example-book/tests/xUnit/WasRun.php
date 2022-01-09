<?php
declare(strict_types=1);

namespace Test\xUnit;

use App\xUnit\TestCase;

final class WasRun extends TestCase
{
    public string $log = '';

    protected function setUp(): void
    {
        $this->log .= 'setUp ';
    }

    protected function tearDown(): void
    {
        $this->log .= 'tearDown ';
    }

    public function testMethod(): void
    {
        $this->log .= 'testMethod ';
    }

    public function testBrokenMethod(): void
    {
        throw new \Exception();
    }
}
