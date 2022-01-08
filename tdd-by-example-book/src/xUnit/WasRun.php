<?php
declare(strict_types=1);

namespace App\xUnit;

final class WasRun extends TestCase
{
    public string $wasRun = 'None';

    public function testMethod(): void
    {
        $this->wasRun = '1';
    }
}
