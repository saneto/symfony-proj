<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Saisie", inversedBy="saisies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saisie;

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

    public function getSaisie(): ?Saisie
    {
        return $this->saisie;
    }

    public function setSaisie(?Saisie $saisie): self
    {
        $this->saisie = $saisie;

        return $this;
    }
}
