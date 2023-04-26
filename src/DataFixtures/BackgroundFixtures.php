<?php

namespace App\DataFixtures;

use App\Entity\Background;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BackgroundFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $itemRepo = $manager->getRepository(Item::class);

        $acolyte = new Background();
        $acolyte->setName('Acolyte');
        $acolyte->setCapacities('Intuition, Religion');
        $acolyte->setDescription("Vous avez passé votre vie à servir au sein d'un temple dédié à un dieu ou un panthéon. Vous accomplissez des rites sacrés pour guider les fidèles vers la présence divine. Vous n'êtes pas forcément clerc (mener une cérémonie et canaliser la puissance divine sont deux choses bien différentes).
        Choisissez un dieu, un panthéon ou une autre entité de caractère divin et discutez avec votre MD des détails de votre service religieux. N'étiez-vous qu'un subalterne au sein du temple, élevé depuis l'enfance pour assister les prêtres lors des rites sacrés ? Ou un prêtre qui a soudainement entendu l'appel divin lui enjoignant un service différent ?");
        $acolyte->setNbLanguage(2);
        $acolyte->setNbGolds(15);
        $acolyte->addItem($itemRepo->findOneBy(['name' => 'Amulette (Symbole sacré)']));
        $acolyte->addItem($itemRepo->findOneBy(['name' => 'Livre']));
        $acolyte->addItem($itemRepo->findOneBy(['name' => 'Habit de cérémonie']));

        $manager->persist($acolyte);

        $artiste = new Background();
        $artiste->setName('Artiste');
        $artiste->setCapacities('Acrobaties, Représentation');
        $artiste->setDescription("Vous n'êtes jamais aussi bien que devant un public. Vous savez envoûter l'assistance, l'amuser et même l'exalter. L'art, quelle que soit votre forme d'expression, est toute votre vie");
        $artiste->setNbLanguage(0);
        $artiste->setNbGolds(15);
        $artiste->addItem($itemRepo->findOneBy(['name' => 'Flûte de pan (Instrument de musique)']));
        $artiste->addItem($itemRepo->findOneBy(['name' => 'Costume']));

        $manager->persist($artiste);

        $criminel = new Background();
        $criminel->setName('Criminel');
        $criminel->setCapacities('Discrétion, Tromperie');
        $criminel->setDescription('Vous êtes un criminel expérimenté qui a maintes fois enfreint la loi');
        $criminel->setNbLanguage(0);
        $criminel->setNbGolds(15);
        $criminel->addItem($itemRepo->findOneBy(['name' => 'Pied-de-biche']));

        $manager->persist($criminel);

        $sage = new Background();
        $sage->setName('Sage');
        $sage->setCapacities('Arcanes, Histoire');
        $sage->setDescription("Vous avez consacré de nombreuses années à l'étude du multivers, examinant de nombreux manuscrits et parchemins, sans oublier de vous renseigner auprès des plus grands experts dans vos sujets de prédilection. Ces efforts sont aujourd'hui récompensés par la maitrise dont vous faites preuve dans certains domaines.");
        $sage->setNbLanguage(2);
        $sage->setNbGolds(10);
        $sage->addItem($itemRepo->findOneBy(['name' => 'Encre (bouteille de 30 cl)']));
        $sage->addItem($itemRepo->findOneBy(['name' => 'Vêtements ordinaires']));

        $manager->persist($sage);

        $soldat = new Background();
        $soldat->setName('Soldat');
        $soldat->setCapacities('Athlétisme, Intimidation');
        $soldat->setDescription("Aussi loin que remonte votre mémoire, vous n'avez jamais connu que la guerre. Peut-être avez-vous servi dans l'armée d'une nation ou au sein d'une compagnie de mercenaires, ou encore d'une milice locale.
        Consultez votre MD pour décider à quel type d'organisation militaire vous étiez rattaché, ainsi que le grade que ous avez atteint et quelques détails de votre parcours martial");
        $soldat->setNbLanguage(0);
        $soldat->setNbGolds(10);
        $soldat->addItem($itemRepo->findOneBy(['name' => 'Jeu de cartes (Boîte de jeux)']));
        $soldat->addItem($itemRepo->findOneBy(['name' => 'Vêtements ordinaires']));

        $manager->persist($soldat);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [ItemFixtures::class];
    }
}
