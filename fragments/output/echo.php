<?php

if (!defined('NO_DIRECT_ACCESS')) die;

$before = "terminate";

$execute = function($context) {
	echo $context->hello;
};