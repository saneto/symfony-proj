<?php
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


Trait PublishedTrait
{


    /**
     * @var boolean publish
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $published;

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param bool $published
     * @return PublishedTrait
     */
    public function setPublished(bool $published): PublishedTrait
    {
        $this->published = $published;

        return $this;
    }




}