<?php
declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
{
    public function testBubbleSort(): void
    {
        $this->assertSame([], sort([]), '[]');
        $this->assertSame([1], sort([1]), '[1]');
        $this->assertSame([1, 2], sort([1, 2]), '[1, 2]');
        $this->assertSame([1, 2], sort([2, 1]), '[2, 1]');
        $this->assertSame([1, 2, 3], sort([1, 2, 3]), '[1, 2, 3]');
        $this->assertSame([1, 2, 3], sort([2, 1, 3]), '[2, 1, 3]');
        $this->assertSame([1, 2, 3], sort([1, 3, 2]), '[1, 3, 2]');
        $this->assertSame([1, 2, 3], sort([3, 2, 1]), '[3, 2, 1]');
        $this->assertSame(
            [1, 1, 2, 2, 3, 3, 4, 5, 5, 5, 8, 10, 11, 99],
            sort([3, 2, 1, 8, 5, 4, 10, 11, 99, 5, 5, 3, 2, 1]),
            'final case'
        );
    }
}

function sort(array $list): array
{
    if (count($list) > 1) {
        for ($max = count($list) - 1; $max > 0; $max--) {
            for ($i = 0; $i < $max; $i++) {
                $first  = $list[$i];
                $second = $list[$i + 1];

                if ($first > $second) {
                    $list[$i]     = $second;
                    $list[$i + 1] = $first;
                }
            }
        }
    }

    return $list;
}
