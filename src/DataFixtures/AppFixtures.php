<?php

namespace App\DataFixtures;

use App\Entity\Building;
use App\Entity\Company;
use App\Entity\Person;
use App\Entity\PersonInBuilding;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $people = [
            new Person('Person #0'),
            new Person('Person #1'),
        ];
        $manager->persist($people[0]);
        $manager->persist($people[1]);

        $buildings = [
            new Building('Building #0'),
            new Building('Building #1'),
        ];
        $manager->persist($buildings[0]);
        $manager->persist($buildings[1]);

        $manager->persist(new PersonInBuilding($people[0], $buildings[0]));
        $manager->persist(new PersonInBuilding($people[0], $buildings[1]));
        $manager->persist(new PersonInBuilding($people[1], $buildings[0]));
        $manager->persist(new PersonInBuilding($people[1], $buildings[1]));

        $manager->flush();
    }
}
