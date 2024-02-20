<?php

$expected_lines = array(
	'[onNotSuccessfulTestCompat called]',
	'[runCompat called]',
);
$tests_output = shell_exec($_SERVER['TESTS_COMMAND']);

if ( preg_match('/\[runner version: ([\d]+.[\d]+.[\d]+)\]/', $tests_output, $regs) ) {
	array_unshift($expected_lines, $regs[0]);

	if ( version_compare($regs[1], '8.2.0', '<') ) {
		$expected_lines[] = '[tearDownCompat called]';
	}
}
else {
	array_unshift($expected_lines, '[runner version: a.b.c]');
}

echo $tests_output . PHP_EOL;

function colorize($text, $foreground_color)
{
	return "\033[" . $foreground_color . 'm' . $text . "\033[39m";
}

foreach ( $expected_lines as $expected_line ) {
	if ( strpos($tests_output, $expected_line) === false ) {
		echo '[' . colorize('X', 91) . '] The "' . $expected_line . '" text not found.' . PHP_EOL;
		exit(1);
	}

	echo '[' . colorize('V', 92) . '] The "' . $expected_line . '" text found.' . PHP_EOL;
}

exit(0);
