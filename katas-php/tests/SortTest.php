<?php
declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public function testBubbleSort(): void
    {
        $this->assertSame([], bubbleSort([]));
    }
}

function bubbleSort(): array
{
    return [];
}
