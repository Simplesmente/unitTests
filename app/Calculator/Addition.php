<?php 

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Contracts\OperandsInterface;
use App\Calculator\Contracts\OperationAbstract;
use App\Calculator\Exceptions\NoOperandsException;

class Addition extends OperationAbstract implements OperandsInterface
{
	
	public function calculate(): float
	{
		if( count($this->operands) === 0 ){

			throw new NoOperandsException;
		}

			return array_sum($this->operands);
		
	}
}