<?php
declare(strict_types=1);

namespace App\xUnit;

final class TestSuite
{
    /** @var TestCase[] */
    private array $tests;

    public function add(TestCase $testCase): void
    {
        $this->tests[] = $testCase;
    }

    public function run(TestResult $result): void
    {
        foreach ($this->tests as $test) {
            $test->run($result);
        }
    }
}
