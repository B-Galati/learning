<?php
declare(strict_types=1);

namespace App\xUnit;

class TestCase
{
    public function __construct(protected string $name)
    {
    }

    public function run(): void
    {
        $this->{$this->name}();
    }
}
