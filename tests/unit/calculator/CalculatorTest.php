<?php 

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function can_set_single_operation()
	{
		$addition = new \App\Calculator\Addition;

		$addition->setOperands([5,10]);

		$calculator = new \App\Calculator\Calculator;

		$calculator->setOperation($addition);

		$this->assertCount(1, $calculator->getOperations());

	}

	/** @test */
	public function can_set_multiple_operations()
	{
		$addition1 = new \App\Calculator\Addition;
		$addition1->setOperands([5,10]);

		$addition2 = new \App\Calculator\Addition;
		$addition2->setOperands([5,10]);

		$calculator = new \App\Calculator\Calculator;

		$calculator->setOperations([$addition1,$addition2]);
		

		$this->assertCount(2, $calculator->getOperations());
	}

	/** @test */
	public function operations_are_ignored_if_not_instance_of_operation_interface()
	{
		$addition1 = new \App\Calculator\Addition;
		$addition1->setOperands([5,10]);

		$calculator = new \App\Calculator\Calculator;

		$calculator->setOperations([$addition1,'dogs','cats']);

		$this->assertCount(1,$calculator->getOperations());


	}

	/** @test */
	public function can_calculate_result()
	{
		$addition1 = new \App\Calculator\Addition;
		$addition1->setOperands([5,10]);

		$calculator = new \App\Calculator\Calculator;

		$calculator->setOperation($addition1);

		$this->assertEquals(15, $calculator->calculate()[0]);

	}

	/** @test */
	public function calculate_method_multiple_results()
	{
		$addition = new \App\Calculator\Addition;
		$addition->setOperands([5,10]); //15

		$divison = new \App\Calculator\Division;
		$divison->setOperands([10,5]); // 2

		$calculator = new \App\Calculator\Calculator;
		$calculator->setOperations([$addition,$divison]);
		
		//var_dump($calculator);

		$this->assertInternalType('array', $calculator->calculate());

		$this->assertEquals(15, $calculator->calculate()[0]);
		$this->assertEquals(2, $calculator->calculate()[1]);


	}


}