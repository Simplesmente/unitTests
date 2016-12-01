<?php 

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Contracts\OperandsInterface;
use App\Calculator\Contracts\OperationAbstract;
use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperandsInterface
{
	
	public function calculate(): float
	{

		if( count($this->operands) === 0 ){

			throw new NoOperandsException;
		}
		

		return array_reduce(array_filter($this->operands), function($a, $b){

			if($a !== null && $b !== null){
			
				return (float) $a / $b;
			}

			return (float) $b;

		},null );
		
	}
}