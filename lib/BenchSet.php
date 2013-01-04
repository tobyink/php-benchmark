<?php

abstract class BenchSet
{
	public function toArray () {
		$array = array();
		$class = new ReflectionClass ($this);
		foreach ($class->getMethods() as $method) {
			if ($method->isPublic() && $method->name != 'toArray') {
				$array[ $method->name ] = array(
					$method->isStatic() ? $method->class : $this,
					$method->name,
				);
			}
		}
		return $array;
	}
}
