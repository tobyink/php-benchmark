<?php

function use_lib ($path) {
	set_include_path($path . PATH_SEPARATOR . get_include_path());
}

use_lib('../lib');
require_once "Benchmark.php";

class Quotes {
	public static function single_quotes () {
		return 'foo';
	}
	public static function double_quotes () {
		return "foo";
	}
}

Benchmark::cmpthese(100000, array(
	"single quotes" => array("Quotes", "single_quotes"),
	"double quotes" => array("Quotes", "double_quotes"),
));
