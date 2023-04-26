<?php

namespace App\DataFixtures;

use App\Entity\Avatar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AvatarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; ++$i) {
            $avatar = new Avatar();
            $avatar->setName($faker->lastName());
            $avatar->setImageUrl('https://picsum.photos/id/'.random_int(100, 1000).'/200/300');

            $manager->persist($avatar);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
