<?php

function use_lib ($path) {
	set_include_path($path . PATH_SEPARATOR . get_include_path());
}

use_lib('../lib');
require_once "Benchmark.php";

class Quotes extends BenchSet {
	public function single_quotes () {
		return 'foo';
	}
	public function double_quotes () {
		return "foo";
	}
}

$i = new Quotes;
Benchmark::cmpthese(100000, $i);
