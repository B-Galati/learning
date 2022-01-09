<?php /** @noinspection PhpIllegalPsrClassPathInspection */

declare(strict_types=1);

require './../../vendor/autoload.php';

if (ini_get('zend.assertions') !== '1' || ini_get('assert.exception') !== '1') {
    throw new \RuntimeException('Assertions must be enabled.');
}

use App\xUnit\TestCase;
use App\xUnit\TestSuite;
use Test\xUnit\WasRun;

class TestCaseTest extends TestCase
{
    public function testTemplateMethod(): void
    {
        $test = new WasRun('testMethod');
        $test->run();
        assert($test->log === 'setUp testMethod tearDown ');
    }

    public function testResult(): void
    {
        $test = new WasRun('testMethod');
        $result = $test->run();
        assert($result->summary() === '1 run, 0 failed');
    }

    public function testFailedResult(): void
    {
        $test = new WasRun('testBrokenMethod');
        $result = $test->run();
        assert($result->summary() === '1 run, 1 failed');
    }

    public function testSuite(): void
    {
        $suite = new TestSuite();
        $suite->add(new WasRun('testMethod'));
        $suite->add(new WasRun('testBrokenMethod'));
        $result = $suite->run();
        assert($result->summary() === '2 run, 1 failed');
    }
}

// TODO assertions are fucked :D FIX IT

(new TestCaseTest('testTemplateMethod'))->run();
(new TestCaseTest('testResult'))->run();
(new TestCaseTest('testFailedResult'))->run();
(new TestCaseTest('testSuite'))->run();
