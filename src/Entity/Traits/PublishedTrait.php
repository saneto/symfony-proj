<?php
namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


Trait PublishedTrait
{


    /**
     * @var boolean publish
     * @ORM\Column(type="boolean")
     */
    private $published;


}