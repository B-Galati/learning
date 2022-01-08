<?php /** @noinspection PhpIllegalPsrClassPathInspection */

declare(strict_types=1);

require './../../vendor/autoload.php';

use App\xUnit\TestCase;
use App\xUnit\WasRun;

class TestCaseTest extends TestCase
{
    public function testRunning(): void
    {
        $test = new WasRun("testMethod");
        echo $test->wasRun;
        echo "\n";
        $test->run();
        echo $test->wasRun;
    }
}

(new TestCaseTest('testRunning'))->run();
