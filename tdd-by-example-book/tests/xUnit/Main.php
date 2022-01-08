<?php /** @noinspection PhpIllegalPsrClassPathInspection */

declare(strict_types=1);

require './../../vendor/autoload.php';

if (ini_get('zend.assertions') !== '1' || ini_get('assert.exception') !== '1') {
    throw new \RuntimeException('Assertions must be enabled.');
}

use App\xUnit\TestCase;
use Test\xUnit\WasRun;

class TestCaseTest extends TestCase
{
    public function testRunning(): void
    {
        $test = new WasRun("testMethod");
        assert($test->wasRun === false);
        $test->run();
        assert($test->wasRun);
    }
}

(new TestCaseTest('testRunning'))->run();
