<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Score;

class ScoreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++) {
            $score = new Score();
            $teamA = rand(0, 10);
            $teamB = rand(0, 10);
            $score->setScoreTeamA($teamA);
            $score->setScoreTeamB($teamB);
            $score->setScoreDate(new \DateTime());
            $score->setScoreResultat($teamA > $teamB ? 'Victoire' : 'Défaite');
            $manager->persist($score);
        }

        $manager->flush();
    }
}
