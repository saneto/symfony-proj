<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="list_des_saisies")
     */
    private $createBy;

    public function __construct()
    {
        $this->createBy = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getCreateBy(): Collection
    {
        return $this->createBy;
    }

    public function addCreateBy(User $createBy): self
    {
        if (!$this->createBy->contains($createBy)) {
            $this->createBy[] = $createBy;
            $createBy->setListDesSaisies($this);
        }

        return $this;
    }

    public function removeCreateBy(User $createBy): self
    {
        if ($this->createBy->contains($createBy)) {
            $this->createBy->removeElement($createBy);
            // set the owning side to null (unless already changed)
            if ($createBy->getListDesSaisies() === $this) {
                $createBy->setListDesSaisies(null);
            }
        }

        return $this;
    }
}
