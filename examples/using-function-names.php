<?php

function use_lib ($path) {
	set_include_path($path . PATH_SEPARATOR . get_include_path());
}

use_lib('../lib');
require_once "Benchmark.php";

function single_quotes () {
	return 'foo';
}

function double_quotes () {
	return "foo";
}

Benchmark::cmpthese(100000, array(
	"single quotes" => "single_quotes",
	"double quotes" => "double_quotes",
));
