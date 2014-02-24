<?php 
class user{
	private $iduser;
	private $username;
	private $mail;
	private $user_type;
	private $name;
	private $description;
	private $status;
	private $image;
	private $phone;
	private $cellphone;
	private $created_date;
	private $created_by;
	private $updated_date;
	private $updated_by;
	
	protected function setIdUser($iduser)
	{
		$this->iduser = $iduser;
	}
	public function getIdUser($iduser)
	{
		return $this->iduser;
	}
	public function setUsername($username)
	{
		$this->username = $username;
	}
	public function getUsername($username)
	{
		return $this->username;
	}
	public function setMail($mail)
	{
		$this->mail = $mail;
	}
	public function getMail()
	{
		return $this->mail;
	}
	public function setUserType($user_type)
	{
		$this->user_type = $user_type;
	}
	public function getUserType()
	{
		return $this->user_type;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setUserStatus($status)
	{
		$this->status = $status;
	}
	public function getUserStatus()
	{
		return $this->status;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function setPhone($phone)
	{
		$this->phone = $phone;
	}
	public function getPhone()
	{
		return $this->phone;
	}
	public function setCellPhone($cellphone)
	{
		$this->cellphone = $cellphone;
	}
	public function getCellPhone()
	{
		return $this->cellphone;
	}
	public function setCreatedDate($created_date)
	{
		$this->created_date = $created_date;
	}
	public function getCreatedDate()
	{
		return $this->created_date;
	}
	public function setCreatedBy($created_by)
	{
		$this->created_by = $created_by;
	}
	public function getCreatedBy()
	{
		return $this->created_by;
	} 
	public function setUpdatedDate($updated_date)
	{
		$this->updated_date = $updated_date;
	} 
	public function getUpdatedDate()
	{
		return $this->updated_date;
	}
	public function setUpdatedBy($updated_by)
	{
		$this->updated_by = $updated_by;
	}
	public function getUpdatedBy()
	{
		return $updated_by;
	}
	
	function __construct($object)
	{
		$this->setIdUser($object->iduser);
		$this->setUsername($object->username);
		$this->setMail($object->mail);
		$this->setUserType($object->user_type);
		$this->setName($object->name);
		$this->setDescription($object->description);
		$this->setUserStatus($object->name);
		$this->setImage($object->image);
		$this->setPhone($object->phone);
		$this->setCellPhone($object->cellphone);
		$this->setCreatedDate($object->created_date);
		$this->setCreatedBy($object->created_by);
		$this->setUpdatedDate($object->updated_date);
		$this->setUpdatedBy($object->updated_by);
	} 
}
?>