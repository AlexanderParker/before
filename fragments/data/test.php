<?php

if (!defined('NO_DIRECT_ACCESS')) die;

$before = "generate-output";

$execute = function($context) {
	$context->data = "Hello world";
};