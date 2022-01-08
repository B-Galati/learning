<?php

declare(strict_types=1);

require './../../vendor/autoload.php';

use App\xUnit\WasRun;

$test = new WasRun("testMethod");
echo $test->wasRun;
echo "\n";
$test->testMethod();
echo $test->wasRun;
