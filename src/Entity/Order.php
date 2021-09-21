<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $totalPrice;

    /**
     * @ORM\OneToMany(targetEntity=ProductOrder::class, mappedBy="order")
     */
    private $productOrders;


    public function __construct()
    {
        $this->productOrders = new ArrayCollection();
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
	 * @return Order
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}



	/**
	 * 
	 * @return mixed
	 */
	function getTotalPrice() {
		return $this->totalPrice;
	}
	
	/**
	 * 
	 * @param mixed $totalPrice 
	 * @return Order
	 */
	function setTotalPrice($totalPrice): self {
		$this->totalPrice = $totalPrice;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getProductOrders() {
		return $this->productOrders;
	}
	
    public function addProductOrder(ProductOrder $productOrder): self
    {
        if (!$this->productOrders->contains($productOrder)) {
            $this->productOrders[] = $productOrder;
            $productOrder->setOrder($this);
        }

        return $this;
    }

    public function removeProductOrder(ProductOrder $productOrder): self
    {
        if ($this->productOrders->removeElement($productOrder)) {
            // set the owning side to null (unless already changed)
            if ($productOrder->getOrder() === $this) {
                $productOrder->setOrder(null);
            }
        }

        return $this;
    }
}