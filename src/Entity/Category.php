<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable="false")
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="category")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
	 * @return Category
	 */
	function setId($id): self {
                        		$this->id = $id;
                        		return $this;
                        	}

	/**
	 * 
	 * @return mixed
	 */
	function getLibelle() {
                        		return $this->libelle;
                        	}
	
	/**
	 * 
	 * @param mixed $libelle 
	 * @return Category
	 */
	function setLibelle($libelle): self {
                        		$this->libelle = $libelle;
                        		return $this;
                        	}

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }
}