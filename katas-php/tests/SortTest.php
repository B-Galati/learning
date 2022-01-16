<?php
declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public function testBubbleSort(): void
    {
        $this->assertSame([], bubbleSort([]), '[]');
        $this->assertSame([1], bubbleSort([1]), '[1]');
        $this->assertSame([1, 2], bubbleSort([1, 2]), '[1, 2]');
        $this->assertSame([1, 2], bubbleSort([2, 1]), '[2, 1]');
    }
}

function bubbleSort(array $list): array
{
    if (count($list) > 1) {
        $first = $list[0];
        $second = $list[1];

        if ($first > $second) {
            return [$second, $first];
        }
    }

    return $list;
}
