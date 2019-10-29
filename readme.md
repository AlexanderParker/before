# Before
## What is it?
Playing with an idea based on aspect oriented programming. In this take, the flow of execution is determined by a sequence of fragments which may only specify one ancestor. This restriction imposes a stream-like flow to processing program logic.

## What is a fragment?

Fragments are simple units that are passed a context object and specify their ancestor, e.g:

```php
$before = "terminate";

$execute = function($context) {
	echo $context->hello;
};
```

This will execute before the terminate function, and echo the contents of the $context->hello property.

## What is context?

The $context object is passed to every fragment. Fragments are free to access and mutate any data on the context object.

## Does it work?

I don't know. One could envision a flow that starts by setting a route context based on the current visitor URL, accessing and manipulating data, generating template output, and rendering to the screen.

Manipulating the execution flow could then be as simple as adding a fragment at the point before you want to change the $context.

Could be fun to play with some more complex use cases.

## What could be improved.

A LOT of stuff.

* Optimise load speed by caching the stack after initial generation
* Add rewiring capability, to override the ancestry of individual fragments, or replace them entirely
* Security protections to prevent nasty folk creating fragments that leak into other fragments or do mean things to the context object
* On that note, if the context were based on a common interface, a lot of these protections would be easier to write
* Anonymous function debugging can be difficult to follow, so improved exception handling
* Find a more efficient way to sort out the call stack using some kind of topological sorting algorithm (to also support multiple "before" statements
* Do I want to add "after" and "mutate" capability... I dunno.  Maybe? I kind of like the logical simplicity of only being able to go before something else that already exists.

## Why use it?

I wouldn't recommend it beyond curiosity at this point, or ever :)

