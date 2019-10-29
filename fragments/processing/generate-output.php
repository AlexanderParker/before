<?php 

if (!defined('NO_DIRECT_ACCESS')) die;

$before = "echo";

$execute = function($context) {
	$context->hello = $context->data;
};