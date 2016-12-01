<?php 

declare(strict_types=1);

namespace App\Models;

/**
* 		
*/
class User
{
	/**
	 * [$first_name first name]
	 * @var [string]
	 */
	private $first_name;

	/**
	 * [$last_name last name]
	 * @var [string]
	 */
	private $last_name;

	/**
	 * [$email email user]
	 * @var [string]
	 */
	private $email;

	public function setFirstName(string $name): void
	{
		$this->first_name = trim($name);
	}

	public function getFirstName(): string
	{
		return $this->first_name;
	}

	public function setLastName(string $name): void
	{
		$this->last_name = trim($name);
	}

	public function getLastName(): string
	{
		return $this->last_name;
	}

	public function getFullName(): string
	{
		return "$this->first_name $this->last_name";
	}

	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getEmailVariables()
	{
		return [
			'full_name' => $this->getFullName(),
			'email'     => $this->getEmail()
		];
	}
}