<?php /** @noinspection AutoloadingIssuesInspection */
/** @noinspection PhpIllegalPsrClassPathInspection */

declare(strict_types=1);

require './../../vendor/autoload.php';

if (ini_get('zend.assertions') !== '1' || ini_get('assert.exception') !== '1') {
    throw new \RuntimeException('Assertions must be enabled.');
}

use App\xUnit\TestCase;
use App\xUnit\TestResult;
use App\xUnit\TestSuite;
use Test\xUnit\WasRun;

final class TestCaseTest extends TestCase
{
    private TestResult $result;

    protected function setUp(): void
    {
        $this->result = new TestResult();
    }

    public function testAssertionError(): void
    {
        assert(false);
    }

    public function testTemplateMethod(): void
    {
        $test = new WasRun('testMethod');
        $test->run($this->result);
        assert($test->log === 'setUp testMethod tearDown ');
    }

    public function testResult(): void
    {
        $test = new WasRun('testMethod');
        $test->run($this->result);
        assert($this->result->summary() === '1 run, 0 failed');
    }

    public function testFailedResult(): void
    {
        $test = new WasRun('testBrokenMethod');
        $test->run($this->result);
        assert($this->result->summary() === '1 run, 1 failed');
    }

    public function testSuite(): void
    {
        $suite = new TestSuite();
        $suite->add(new WasRun('testMethod'));
        $suite->add(new WasRun('testBrokenMethod'));
        $suite->run($this->result);
        assert($this->result->summary() === '2 run, 1 failed');
    }
}

$result = new TestResult();

try {
    (new TestCaseTest('testAssertionError'))->run($result);
    $assertionNotTriggered = true;
} catch (\AssertionError $e) {}
if (isset($assertionNotTriggered)) {
    assert(false, 'Assertions should make the test failed.');
}

$suite = new TestSuite();
$suite->add(new TestCaseTest('testTemplateMethod'));
$suite->add(new TestCaseTest('testResult'));
$suite->add(new TestCaseTest('testFailedResult'));
$suite->add(new TestCaseTest('testSuite'));
$suite->run($result);

echo $result->summary();
