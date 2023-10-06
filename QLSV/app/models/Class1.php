<?php
class Class1 {
    private $id;
    private $nameClass1;

    public function __construct($id, $nameClass1) {
        $this->id = $id;
        $this->nameClass1 = $nameClass1;
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
	public function getNameClass1() {
		return $this->nameClass1;
	}
	
	/**
	 * @param mixed $nameClass1 
	 * @return self
	 */
	public function setNameClass1($nameClass1): self {
		$this->nameClass1 = $nameClass1;
		return $this;
	}
}

?>