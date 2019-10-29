<?php

if (!defined('NO_DIRECT_ACCESS')) die;

// Final fragment, always.

$before = null;

$execute = function($context) {
	exit(0);
};