<?php 

$before = "echo";

$execute = function($context) {
	$context->hello = $context->data;
};