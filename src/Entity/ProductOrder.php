<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class ProductOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;




    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="productOrders")
     */
    private $order;
    
    
    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productOrders")
     */
    private $product;




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
	 * @return ProductOrder
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getQuantity() {
		return $this->quantity;
	}
	
	/**
	 * 
	 * @param mixed $quantity 
	 * @return ProductOrder
	 */
	function setQuantity($quantity): self {
		$this->quantity = $quantity;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getOrder() {
		return $this->order;
	}
	
	/**
	 * 
	 * @param mixed $order 
	 * @return ProductOrder
	 */
	function setOrder($order): self {
		$this->order = $order;
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
	 * @return ProductOrder
	 */
	function setProduct($product): self {
		$this->product = $product;
		return $this;
	}
}