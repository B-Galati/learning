<?php
declare(strict_types=1);

namespace App\xUnit;

abstract class TestCase
{
    public function __construct(protected string $name)
    {
    }

    protected function setUp(): void {}
    protected function tearDown(): void {}

    public function run(TestResult $result): void
    {
        $result->testStarted();
        $this->setUp();
        try {
            $this->{$this->name}();
        } catch (\Throwable $e) {
            if ($e instanceof \AssertionError) {
                throw $e;
            }
            $result->testFailed();
        }
        $this->tearDown();
    }
}
