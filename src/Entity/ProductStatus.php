<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductStatusRepository")
 */
class ProductStatus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Seller", mappedBy="category")
     */
    private $sellers;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    public function __construct()
    {
        $this->sellers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Seller[]
     */
    public function getSellers(): Collection
    {
        return $this->sellers;
    }

    public function addSeller(Seller $seller): self
    {
        if (!$this->sellers->contains($seller)) {
            $this->sellers[] = $seller;
            $seller->setCategory($this);
        }

        return $this;
    }

    public function removeSeller(Seller $seller): self
    {
        if ($this->sellers->contains($seller)) {
            $this->sellers->removeElement($seller);
            // set the owning side to null (unless already changed)
            if ($seller->getCategory() === $this) {
                $seller->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getName();
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }


}
