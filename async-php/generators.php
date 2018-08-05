<?php

/**
 * @see https://blog.kelunik.com/2017/09/14/an-introduction-to-generators-in-php.html
 */

// MAIN

/** Simply display a generator with a loop */
foreach (listOfThings() as $val) {
    dump($val);
}

/** Test how yield behave */
dump('=======');
$generator = listOfThings();
dump('=======');

dump($generator->valid()); // true
dump($generator->key(), $generator->current(), '----');
$generator->next();
dump($generator->key(), $generator->current(), '----');
$generator->next();
dump($generator->key(), $generator->current(), '----');
$generator->send(null); // Equivalent $generator->next();
dump($generator->key(), $generator->current(), '----');
$generator->send('lsklsdjf'); // The value sent will be the return value of yield
dump($generator->valid()); // true
dump($generator->key(), $generator->current(), '----');
dump($generator->valid());
$generator->next(); // true
dump($generator->getReturn()); // Value returned by the generator function
dump($generator->valid());

/** Test how next() behave */

dump('=======');
$generator = listOfThings();
dump('=======');
dump('sleep 2s');
sleep(2);
$generator->next(); // Generator was paused until this point
dump('--');
$generator->next();
dump('--');
$generator->next();
// here goes the sleep !
dump('--');
$generator->next();
dump('--');
$generator->next();
dump('--');

// ---------------------------

function listOfThings(): \Generator
{
    // This is not reached until the first value is asked
    dump('Beginning of the generator');

    dump(yield 'A');
    dump(yield '1');
    dump(yield 1);
    dump('This is the middle of the Generator');
    dump('Wait 1 second');
    sleep(1);
    dump('End of sleep');
    dump('It\'s interesting to see that the sleep is not reached until we ask for the next yield');
    dump(yield 999);
    dump(yield 'Hello World');

    // This state
    return 'You can return whatever you want in fact';
    dump('END '.__FUNCTION__);
}
