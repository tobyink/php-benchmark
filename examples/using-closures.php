<?php

function use_lib ($path) {
	set_include_path($path . PATH_SEPARATOR . get_include_path());
}

use_lib('../lib');
require_once "Benchmark.php";

Benchmark::cmpthese(100000, array(
	"single quotes" => create_function('', 'return \'foo\';'),
	"double quotes" => create_function('', 'return "foo";'),
));
