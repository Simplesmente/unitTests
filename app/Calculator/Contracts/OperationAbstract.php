<?php 
declare(strict_types=1);

namespace App\Calculator\Contracts;

abstract class OperationAbstract 
{
	/**
	 * [$operands description]
	 * @var array
	 */
	protected $operands;

	public function setOperands(array $operands): void
	{
		$this->operands = $operands;
	}
	
}