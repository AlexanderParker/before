Playing with an idea based on aspect oriented programming. In this take, the flow of execution is determined by a sequence of fragments which may only specify one ancestor. This restriction imposes a stream-like flow to processing program logic.

Fragments are simple units that are passed a context object and specify their ancestor, e.g:

<?php

$before = "terminate";

$execute = function($context) {
	echo $context->hello;
};

?>

This will execute before the terminate function, and echo the contents of the $context->hello property.

The $context object is passed to every fragment. Fragments are free to access and mutate any data on the context object.

For example, one could envision a flow that starts by setting a route context based on the current visitor URL, accessing and manipulating data, generating template output, and rendering to the screen.

Could be fun to play with some more complex use cases.

