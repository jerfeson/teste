<?php

namespace App;

class Usuario
{
	public $id;
	public $email;
	public $password;
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function toArray()
	{
		return get_object_vars($this);
	}
}