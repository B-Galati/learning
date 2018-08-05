# Transversal knowledge

## Event Loop

It is a programming construct that waits for and dispatches events in a program. It works by making a request to some
internal or external "event provider" (that generally blocks the request until an event has arrived),
and then it calls the relevant event handler ("dispatches the event"). 
The event loop almost always operates asynchronously with the message originator.

>When the event loop forms the central control flow construct of a program, as it often does, 
it may be termed the main loop or main event loop. This title is appropriate, 
because such an event loop is at the highest level of control within the program.

From AmpPhp:

>The event loop is our task scheduler.

The event loop controls the program flow as long as it runs. Once we tell the event loop to run it will maintain control until the application errors out, has nothing left to do, or is explicitly stopped.

## Coroutines

Coroutines = Subroutines with yield

Coroutines allow multiple entry points for suspending and resuming executions.

Coroutines are well-suited for implementing familiar program components such as 
cooperative tasks, exceptions, event loops, iterators, infinite lists and pipes. 

## Generators

Generators, also known as semicoroutines.

Generators are iterators.

>Instead of building an array containing all the values and returning them all at once,
 a generator yields the values one at a time, which requires less memory and allows the 
 caller to get started processing the first few values immediately. In short, a generator 
 looks like a function but behaves like an iterator.

The yield statement in a generator does not specify a coroutine to jump to, 
but rather passes a value back to a parent routine.

It is still possible to implement coroutines on top of a generator facility, with 
the aid of a top-level dispatcher routine

## Fibers and Coroutines

They are basically the same but at different level of abstraction.
Fibers are a system level construct while coroutines are a language-level construct.

Fibers can also be seen  as an implementation of coroutines.

## What about thread

A thread is preemptive multitasking system, meaning that the scheduler is responsible for dispatching
the execution time.
A fiber is a cooperative multitasking system, meaning that it's up to task to give control 
back to the scheduler.

Because Fibers are cooperative multitasking, thread safety is not really a problem.

# With PHP

>Generators are special functions in PHP. Whenever a function contains yield, it’s no longer 
a normal function anymore, but always returns a Generator. Generator implements the Iterator interface, that’s why it works with foreach.

When a generator is created, it is paused until one is using it: with `next()`, `valid()`, etc.
Once one of those is called, the generator is paused until the 1st `yield` is reached.
The generator is resumed each time `next()`, `send()` or `throw` is called.
This behavior allow to write lazy function that are memory and CPU efficient.

Compared to and `\Iterator`, a `\Generator` defined these extra methods:

```php
function send($value) {}
function throw(Exception $exception) {}
function getReturn() {}
```

Basically, coroutine is a bidirectional generator.

If `send()` is the very first call of the generator then the 1st yielded value is ignored

# References

- [Event Loop Wikipedia](https://en.wikipedia.org/wiki/Event_loop)
- [Coroutine Wikipedia](https://en.wikipedia.org/wiki/Coroutine)
- [Generator Wikipedia](https://en.wikipedia.org/wiki/Generator_(computer_programming))
- [Fiber Wikipedia](https://en.wikipedia.org/wiki/Fiber_(computer_science))

- [An introduction to generators in PHP](https://blog.kelunik.com/2017/09/14/an-introduction-to-generators-in-php.html)
- [Going Async in Symfony controllers](https://symfony.fi/entry/going-async-in-symfony-controllers)
- [Cooperative multitasking using coroutines in PHP](https://nikic.github.io/2012/12/22/Cooperative-multitasking-using-coroutines-in-PHP.html)
- []()
- []()
- []()

