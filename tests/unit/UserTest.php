<?php 

class UserTest extends \PHPUnit_Framework_TestCase
{

	private $user;

	public function setUp()
	{
		$this->user = new \App\Models\User;

	}
	/** @test */

	public function That_We_Can_Get_The_FirstName()
	{
		$this->user->setFirstName('André');

		$this->assertEquals($this->user->getFirstName(),'André');
		
	}

	/** @test */
	public function That_We_Can_Get_The_LastName()
	{

		$this->user->setLastName('Teles');


		$this->assertEquals($this->user->getLastName(), 'Teles');

	}

	public function testFullNameisReturned()
	{
		$this->user->setFirstName('André');

		$this->user->setLastName('Teles');

		$this->assertEquals($this->user->getFullName(),'André Teles');
	}

	public function testFirstAndLastNameAreTrimmed()
	{
		$this->user->setFirstName('André     ');

		$this->user->setLastName('       Teles');

		$this->assertEquals($this->user->getFirstName(), 'André');

		$this->assertEquals($this->user->getLastName(), 'Teles');
	}

	public function testEmailAddressCanSet()
	{
		$this->user->setEmail('andre@domain.com');


		$this->assertEquals($this->user->getEmail(), 'andre@domain.com');
	}


	public function testEmailVariablesContainCorrectValues()
	{

		$this->user->setFirstName('André     ');

		$this->user->setLastName('       Teles');

		$this->user->setEmail('andre@domain.com');

		$emailVariables = $this->user->getEmailVariables();

		$this->assertArrayHasKey('full_name', $emailVariables);

		$this->assertArrayHasKey('email', $emailVariables);

		$this->assertEquals($emailVariables['full_name'], 'André Teles');

		$this->assertEquals($emailVariables['email'], 'andre@domain.com');
	}
}