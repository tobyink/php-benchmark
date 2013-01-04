<?php

require_once "BenchSet.php";

class Benchmark {
	public $name;
	protected $_start;
	protected $_finish;
	
	public function __construct ($name) {
		$this->name = $name;
	}

	public function start () {
		if ($this->_start) die("already started");
		$this->_start = microtime(true);
	}

	public function finish () {
		if ($this->_finish) die("already finished");
		$this->_finish = microtime(true);
	}
	
	public function total_time () {
		return $this->_finish - $this->_start;
	}
	
	public function run ($callable, $count=1) {
		$this->start();
		for ($i = 0; $i < $count; $i++)
			call_user_func($callable);
		$this->finish();
	}
	
	public function __toString () {
		return sprintf("%s: %0.6f s", $this->name, $this->total_time());
	}
	
	public static function cmpthese ($iterations, $tests) {
		if ($tests instanceof BenchSet) {
			$tests = $tests->toArray();
		}
		foreach ($tests as $name => $code) {
			$bench = new Benchmark ($name);
			$bench->run($code, $iterations);
			$per_second = $iterations / $bench->total_time();
			printf("%s: %0.2f /s\n", $bench->name, $per_second);
		}
	}
}

