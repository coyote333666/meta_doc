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
            $document->setTitle($faker->text($maxNbChars = 10) );
            $document->setStartDate($faker->dateTime());
            $document->setText($faker->text);
            $manager->persist($document);
        }

        $manager->flush();
    }
}
