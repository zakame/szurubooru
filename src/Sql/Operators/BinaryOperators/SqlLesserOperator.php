<?php
class SqlLesserOperator extends SqlBinaryOperator
{
	public function __construct($subject, $target)
	{
		parent::__construct($subject, $target, '<');
	}
}
