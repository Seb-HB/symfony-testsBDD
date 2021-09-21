<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="tags")
     */
    private $products;


    public function __construct(){
        $this->products= new ArrayCollection();
    }

	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return Tag
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getLabel() {
		return $this->label;
	}
	
	/**
	 * 
	 * @param mixed $label 
	 * @return Tag
	 */
	function setLabel($label): self {
		$this->label = $label;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getProducts() {
		return $this->products;
	}
}
