<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Image
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
    private $url;

    /**
     * @ORM\Column(type="string")
     */
    private $alt;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, inversedBy="image")
     */
    private $product;

	/**
	 * 
	 * @return mixed
	 */
	function getUrl() {
		return $this->url;
	}
	
	/**
	 * 
	 * @param mixed $url 
	 * @return Image
	 */
	function setUrl($url): self {
		$this->url = $url;
		return $this;
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
	 * @return mixed
	 */
	function getAlt() {
		return $this->alt;
	}
	
	/**
	 * 
	 * @param mixed $alt 
	 * @return Image
	 */
	function setAlt($alt): self {
		$this->alt = $alt;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getProduct() {
		return $this->product;
	}
	
	/**
	 * 
	 * @param mixed $product 
	 * @return Image
	 */
	function setProduct($product): self {
		$this->product = $product;
		return $this;
	}
}