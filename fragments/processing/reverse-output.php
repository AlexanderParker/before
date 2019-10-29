<?php

$before = "echo";

$execute = function($context) {
	$context->hello = strrev($context->hello);
};