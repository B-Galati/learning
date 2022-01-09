<?php
declare(strict_types=1);

namespace App\xUnit;

class TestCase
{
    public function __construct(protected string $name)
    {
    }

    protected function setUp(): void {}
    protected function tearDown(): void {}

    public function run(): TestResult
    {
        $this->setUp();
        $this->{$this->name}();
        $this->tearDown();

        return new TestResult();
    }
}
