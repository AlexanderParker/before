<?php

$context = new stdClass();
$context->system = new stdClass();
// Grab all fragments
$fragments = array_map(function($fragment) use (&$context) {	
	require($fragment);
	return ["name" => basename($fragment, '.php'), "before" => $before, "execute" => function() use ($execute, &$context) { $execute($context);}];
}, glob("{fragments/terminate.php,fragments/**/*.php}", GLOB_BRACE));


$stack = array();
$keepWalking = true;

// Sort all fragments (index 0 is always terminate)
while(count($fragments) > 0) {
	$lastCount = count($fragments);
	array_walk($fragments, function($value, $index) use (&$stack, &$fragments) {
		// Ensure only terminate has a null ancestor
		if ($value['before'] == NULL & $index == 0) {
			$stack[$value["name"]] = $value['execute'];
			unset($fragments[$index]);				
			return;
		} else if ($value['before'] == NULL & $index == 0) {
			throw new Exception("Undefined ancestor in fragment '" . $value["name"] . "'");
		}
		// Insert the fragment before its ancestor
		$pos  = array_search($value['before'], array_keys($stack));
		if ($pos !== false) {
			$stack = array_slice($stack, 0, $pos) + [$value["name"] => $value['execute']] + array_slice($stack, $pos);
			unset($fragments[$index]);
		}
	});
	if ($lastCount == count($fragments)) {
		throw new Exception("Unresolved ancestry in fragments: " . implode(", ", array_map(function($fragment) { return "'" . $fragment['name'] . "'";}, $fragments)));
	}
}

// Execute the stack
foreach($stack as $function) {
	$function($context);
}