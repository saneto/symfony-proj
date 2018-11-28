<?php

namespace App\DataFixtures;

use App\Entity\RequestType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $array = ["Saisir un bug","Saisir une fonctionnalité","Saisir une amélioration"];
        foreach ($array as $value)
        {
            $requestType = new RequestType();
            $requestType->setValue($value);
            $manager->persist($requestType);
        }
        $manager->flush();
    }
}