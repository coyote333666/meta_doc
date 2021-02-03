<?php

namespace App\DataFixtures;

use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $document = new Document();
            $document->setLabel($faker->text($maxNbChars = 10) );
            $document->setStartDate($faker->dateTime());
            $document->setText($faker->text);
            $document->setCode($faker->text($maxNbChars = 10));
            $manager->persist($document);
        }

        $manager->flush();
    }
}
