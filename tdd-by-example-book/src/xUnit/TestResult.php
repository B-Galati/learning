<?php
declare(strict_types=1);

namespace App\xUnit;

class TestResult
{
    private int $runCount = 1;
    private int $failedCount = 0;

    public function summary(): string
    {
        return sprintf('%s run, %s failed', $this->runCount, $this->failedCount);
    }
}
