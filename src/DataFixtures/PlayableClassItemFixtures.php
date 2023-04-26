<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\PlayableClass;
use App\Entity\PlayableClassItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayableClassItemFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $playableClassRepo = $manager->getRepository(PlayableClass::class);
        $itemRepo = $manager->getRepository(Item::class);

        /** Barde */
        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Corne (Instrument de musique)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Coffre']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(2);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Étui à cartes ou à parchemins']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Vêtements de qualité']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Encre (bouteille de 30 cl)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Porte-plume']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Lampe']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(2);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Huile (flasque)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(5);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Papier (la feuille)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Parfum (flacon)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Cire à cacheter']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Barde']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Savon']));

        $manager->persist($relation);

        /** Clerc */
        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => "Carreaux d'arbalète x20 (Munitions)"]));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Sac à dos']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Couverture']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(10);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Bougie']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Boîte à amadou']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(2);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Rations (1 jour)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Outre (pleine)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Clerc']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Amulette (Symbole sacré)']));

        $manager->persist($relation);

        /** Guerrier */
        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => "Carreaux d'arbalète x20 (Munitions)"]));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Sac à dos']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Pied-de-biche']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Marteau']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(10);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Piton']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(10);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Torche']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Boîte à amadou']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(10);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Rations (1 jour)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Outre (pleine)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Guerrier']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Corde en chanvre (15 m)']));

        $manager->persist($relation);

        /** Magicien */
        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Sacoche à composantes']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Grimoire']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Sac à dos']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Livre']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Encre (bouteille de 30 cl)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Porte-plume']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(10);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Magicien']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Parchemin (la feuille)']));

        $manager->persist($relation);

        /** Roublard */
        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Carquois']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Flèches x20 (Munitions)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Outils de voleur']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Sac à dos']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Billes (sac de 1 000)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Cloche']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(5);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Bougie']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Marteau']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(10);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Piton']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Lanterne à capote']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(2);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Huile (flasque)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(5);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Rations (1 jour)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Boîte à amadou']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Outre (pleine)']));

        $manager->persist($relation);

        $relation = new PlayableClassItem();
        $relation->setQuantity(1);
        $relation->setPlayableClass($playableClassRepo->findOneBy(['name' => 'Roublard']));
        $relation->setItem($itemRepo->findOneBy(['name' => 'Corde en chanvre (15 m)']));

        $manager->persist($relation);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ItemFixtures::class,
                PlayableClassFixtures::class];
    }
}
