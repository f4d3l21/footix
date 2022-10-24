<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Team($faker));

        for ($i = 0; $i < 10; $i++) {
            $team = new Team();
            $team->setName($faker->team);
           
            $manager->persist($team);
        }

        $manager->flush();
    }
}
