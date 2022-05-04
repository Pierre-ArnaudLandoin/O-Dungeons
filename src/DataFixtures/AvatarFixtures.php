<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Avatar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AvatarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) {
            $avatar = new Avatar();
            $avatar->setName($faker->lastName());
            $avatar->setImageUrl($faker->url());

            $manager->persist($avatar);
        }
        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
