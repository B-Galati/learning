<?php
declare(strict_types=1);

namespace App\xUnit;

class TestResult
{
    private int $runCount = 0;
    private int $failedCount = 0;

    public function testStarted(): void
    {
        $this->runCount++;
    }

    public function summary(): string
    {
        return sprintf('%s run, %s failed', $this->runCount, $this->failedCount);
    }
}
