<?php

namespace App\DataFixtures;

use App\Entity\PlayableClass;
use App\Entity\Subclass;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SubclassFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $classRepo = $manager->getRepository(PlayableClass::class);

        $collegeVaillance = new Subclass();
        $collegeVaillance->setName('Collège de la Vaillance');
        $collegeVaillance->setDescription("Les récits contés par les bardes du Collège de la Vaillance perpétuent les exploits des grands héros d'antan pour inspirer les nouvelles générations. Ils arpentent également le monde pour assister personnellement aux événements et s'assurer que cet héritage ne se perde pas.");
        $collegeVaillance->setPlayableClass($classRepo->findOneBy(['name' => 'Barde']));
        $manager->persist($collegeVaillance);

        $collegeSavoir = new Subclass();
        $collegeSavoir->setName('Collège du Savoir');
        $collegeSavoir->setDescription("Les connaissances des bardes du Collège du Savoir portent sur presque tous les sujets, les bribes de savoir qu'il détiennent allant des manuscrits les plus savants aux contes ruraux. Qu'ils entonnent une ballade populaire dans une taverne ou interprètent une composition complexe à la cour d'un roi, ces bardes usent de leurs talents pour captiver l'auditoire.");
        $collegeSavoir->setPlayableClass($classRepo->findOneBy(['name' => 'Barde']));
        $manager->persist($collegeSavoir);

        $domaineGuerre = new Subclass();
        $domaineGuerre->setName('Domaine de la Guerre');
        $domaineGuerre->setDescription("La guerre se manifeste sous bien des formes. Elle peut muer les gens ordinaires en héros. Elle peut se montrer absurde et horrible.
Dans un cas comme dans l'autre, les dieux de la guerre poussent les combattants à se dépasser. Les clercs de ces divinités excellent eux-mêmes au combat. Parmi les dieux de ce domaine, on compte les champions de l'honneur et de la chevalerie (tels que Torm, Héronéus ou Kiri-Jolith), mais aussi des symboles de destruction (comme Erythnul, la Fureur, Gruumsh ou Arès), et des emblèmes de domination (comme Baine, Hextor ou Maglubiyet). D'autres dieux martiaux (Tempus, Niké et Nuada par exemple) adoptent une position plus neutre.");
        $domaineGuerre->setPlayableClass($classRepo->findOneBy(['name' => 'Clerc']));
        $manager->persist($domaineGuerre);

        $domaineVie = new Subclass();
        $domaineVie->setName('Domaine de la Vie');
        $domaineVie->setDescription("Les dieux de la Vie favorisent la vitalité en soignant les malades et les blessés, en veillant sur les indigents et en détruisant les forces de la non-vie. La grande majorité des divinités non mauvaises exercent une influence sur ce domaine, notamment les dieux et déesses agricoles (comme Chauntéa, Arawai et Déméter), les dieux du soleil (comme Lathandre, Pélor et Ré-Horakhty), les dieux de la guérison et de l'endurance (comme Ilmater, Mishakal, Apollon et Diancecht) et les dieux du foyer et de la communauté (comme Hestia, Hathor et Boldrei).");
        $domaineVie->setPlayableClass($classRepo->findOneBy(['name' => 'Clerc']));
        $manager->persist($domaineVie);

        $champion = new Subclass();
        $champion->setName('Champion');
        $champion->setDescription("Le Champion affûte ses qualités de combattant ultime au service de l'efficacité meurtrière.");
        $champion->setPlayableClass($classRepo->findOneBy(['name' => 'Guerrier']));
        $manager->persist($champion);

        $chevalierOcculte = new Subclass();
        $chevalierOcculte->setName('Chevalier Occulte');
        $chevalierOcculte->setDescription("Le chevalier occulte emblématique conjugue les talents martiaux des guerriers à l'étude de la magie. Ces combattants se concentrent sur deux des huit écoles de magie : l'abjuration et l'évocation. Ces chevaliers n'apprennent qu'un arsenal réduit de sorts, qu'ils gravent dans leur esprit plutôt que de les recopier dans un grimoire.");
        $chevalierOcculte->setPlayableClass($classRepo->findOneBy(['name' => 'Guerrier']));
        $manager->persist($chevalierOcculte);

        $ecoleEvocation = new Subclass();
        $ecoleEvocation->setName('Ecole de l\'Evocation');
        $ecoleEvocation->setDescription("Vos études magiques ont essentiellement porté sur les effets élémentaires les plus intenses, comme le gel le plus froid, les flammes les plus torrides, le tonnerre rugissant, les crépitements de la foudre et les corrosions de l'acide. Certains évocateurs œuvrent au service d'armées comme artilleurs spécialisés. D'autres protègent l'opprimé ou surmontent l'adversité en misant sur leurs pouvoirs spectaculaires.");
        $ecoleEvocation->setPlayableClass($classRepo->findOneBy(['name' => 'Magicien']));
        $manager->persist($ecoleEvocation);

        $ecoleTransmutation = new Subclass();
        $ecoleTransmutation->setName('Ecole de la Transmutation');
        $ecoleTransmutation->setDescription("Vous étudiez les sorts qui altèrent les énergies et la matière. À vos yeux, le monde n'est pas figé, mais en mutation perpétuelle, et vous vous félicitez de contribuer à ces changements.");
        $ecoleTransmutation->setPlayableClass($classRepo->findOneBy(['name' => 'Magicien']));
        $manager->persist($ecoleTransmutation);

        $arnaqueurArcanique = new Subclass();
        $arnaqueurArcanique->setName('Arnaqueur Arcanique');
        $arnaqueurArcanique->setDescription("Certains roublards agrémentent de magie leurs talents de discrétion et d'adresse, notamment de tours d'illusion et d'enchantement. On retrouve dans cette catégorie des voleurs à la tire et des cambrioleurs, mais également divers farceurs et fauteurs de troubles.");
        $arnaqueurArcanique->setPlayableClass($classRepo->findOneBy(['name' => 'Roublard']));
        $manager->persist($arnaqueurArcanique);

        $voleur = new Subclass();
        $voleur->setName('Voleur');
        $voleur->setDescription("Votre savoir-faire s'oriente en premier lieu vers le larcin. Cambrioleurs, bandits, voleurs à la tire et autres criminels optent généralement pour cet archétype, ainsi que les roublards qui se voient plutôt comme des chasseurs de trésor professionnels, des explorateurs ou des enquêteurs.
        ");
        $voleur->setPlayableClass($classRepo->findOneBy(['name' => 'Roublard']));
        $manager->persist($voleur);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [PlayableClassFixtures::class];
    }
}
