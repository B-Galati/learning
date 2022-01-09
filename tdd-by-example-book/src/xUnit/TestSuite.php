<?php
declare(strict_types=1);

namespace App\xUnit;

final class TestSuite
{
    public function add(TestCase $testCase): void
    {

    }

    public function run(): TestResult
    {
        return new TestResult();
    }
}
