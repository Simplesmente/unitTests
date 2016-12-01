<?php 

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Contracts\OperandsInterface;


class Calculator
{
	/**
	 * [$operations description]
	 * @var array
	 */
	protected $operations = [];


	public function setOperation(OperandsInterface $operation): void
	{
		$this->operations[] = $operation;
	}

	public function setOperations(array $operations)
	{

		$filterOperations = array_filter($operations, function($operation){
			
			return $operation instanceof OperandsInterface;
			
		});
		
		$this->operations = array_merge($this->operations,$filterOperations);
	}

	public function getOperations(): array
	{
		return $this->operations;
	}

	public function calculate(): array
	{
		
		if( count($this->operations) > 1 ){
			
			return array_map(function($operation){

				return $operation->calculate();
			
			}, $this->operations);
		}


		return [$this->operations[0]->calculate()];
	}
}