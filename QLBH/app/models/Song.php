<?php
class Song {
    private $id;
    private $nameSong;
    private $singer;
    private $idCategory;

    public function __construct($id, $nameSong, $singer, $idCategory) {
        $this->id = $id;
        $this->nameSong = $nameSong;
        $this->singer = $singer;
        $this->idCategory = $idCategory;
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
	public function getNameSong() {
		return $this->nameSong;
	}
	
	/**
	 * @param mixed $nameSong 
	 * @return self
	 */
	public function setNameSong($nameSong): self {
		$this->nameSong = $nameSong;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getSinger() {
		return $this->singer;
	}
	
	/**
	 * @param mixed $singer 
	 * @return self
	 */
	public function setSinger($singer): self {
		$this->singer = $singer;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getIdCategory() {
		return $this->idCategory;
	}
	
	/**
	 * @param mixed $idCategory 
	 * @return self
	 */
	public function setIdCategory($idCategory): self {
		$this->idCategory = $idCategory;
		return $this;
	}
}

?>