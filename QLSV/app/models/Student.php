<?php
class Student {
    private $id;
    private $nameStudent;
    private $email;
    private $dateOfBirth;
    private $idClass1;

    public function __construct($id, $nameStudent, $email, $dateOfBirth, $idClass1) {
        $this->id = $id;
        $this->nameStudent = $nameStudent;
        $this->email = $email;
        $this->dateOfBirth = $dateOfBirth;
        $this->idClass1 = $idClass1;
    }

    // Getter and setter
	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNameStudent() {
		return $this->nameStudent;
	}
	
	/**
	 * @param mixed $nameStudent 
	 * @return self
	 */
	public function setNameStudent($nameStudent): self {
		$this->nameStudent = $nameStudent;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}
	
	/**
	 * @param mixed $dateOfBirth 
	 * @return self
	 */
	public function setDateOfBirth($dateOfBirth): self {
		$this->dateOfBirth = $dateOfBirth;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdClass1() {
		return $this->idClass1;
	}
	
	/**
	 * @param mixed $idClass1 
	 * @return self
	 */
	public function setIdClass1($idClass1): self {
		$this->idClass1 = $idClass1;
		return $this;
	}
}

?>