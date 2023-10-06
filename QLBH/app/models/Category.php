<?php
class Category {
    private $id;
    private $nameCategory;

    public function __construct($id, $nameCategory) {
        $this->id = $id;
        $this->nameCategory = $nameCategory;
    }
    

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
	public function getNameCategory() {
		return $this->nameCategory;
	}
	
	/**
	 * @param mixed $nameCategory 
	 * @return self
	 */
	public function setNameCategory($nameCategory): self {
		$this->nameCategory = $nameCategory;
		return $this;
	}
}

?>