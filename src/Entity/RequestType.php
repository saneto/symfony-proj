<?php

namespace App\Entity;

use App\Entity\Traits\PublishedTrait;
use App\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestTypeRepository")
 */
class RequestType
{


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $value;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Saisie", mappedBy="type")
     */
    private $saisies;

    public function __construct()
    {
        $this->saisies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return Collection|Saisie[]
     */
    public function getSaisies(): Collection
    {
        return $this->saisies;
    }

    public function addSaisy(Saisie $saisy): self
    {
        if (!$this->saisies->contains($saisy)) {
            $this->saisies[] = $saisy;
            $saisy->setType($this);
        }

        return $this;
    }

    public function removeSaisy(Saisie $saisy): self
    {
        if ($this->saisies->contains($saisy)) {
            $this->saisies->removeElement($saisy);
            // set the owning side to null (unless already changed)
            if ($saisy->getType() === $this) {
                $saisy->setType(null);
            }
        }

        return $this;
    }
}
