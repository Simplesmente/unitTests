<?php 

class DivisionTest extends \PHPUnit_Framework_TestCase
{
	/** @test */
	public function divides_given_operands()
	{
		$division = new \App\Calculator\Division;

		$division->setOperands([100,4]);

		$this->assertInternalType('float',$division->calculate());

		$this->assertEquals(25, $division->calculate());

	}

	/** @test */
	public function removes_division_by_zero()
	{
		$division = new \App\Calculator\Division;

		$division->setOperands([10,0,0,5,0]);

		$this->assertEquals(2, $division->calculate());
	}

	/** @test */

	public function no_operands_given_throws_exception_when_calculating()
	{
		$this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

		$division = new \App\Calculator\Division();

		$division->calculate();
	}
}