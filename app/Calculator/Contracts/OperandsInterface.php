<?php 
declare(strict_types=1);

namespace App\Calculator\Contracts;

interface OperandsInterface
{
	public function calculate(): float;
	
}