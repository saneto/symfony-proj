<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaisieRepository")
 */
class Saisie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $value;

    /**
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RequestType", inversedBy="saisies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="saisie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentaire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Avancement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $avancement;

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

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getType(): ?RequestType
    {
        return $this->type;
    }

    public function setType(?RequestType $type): self
    {
        $this->type = $type;

        return $this;
    }



    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setType($this);
        }

        return $this;
    }

    public function removecommentaire(Saisie $commentaire): self
    {
        if ($this->commentaire->contains($commentaire)) {
            $this->commentaire->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getType() === $this) {
                $commentaire->setType(null);
            }
        }

        return $this;
    }



    public function getAvancement(): ?Avancement
    {
        return $this->avancement;
    }

    public function setAvancement(Avancement $avancement): self
    {
        $this->avancement = $avancement;

        return $this;
    }
}
