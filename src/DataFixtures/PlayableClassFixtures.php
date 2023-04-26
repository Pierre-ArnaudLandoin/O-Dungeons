<?php

namespace App\DataFixtures;

use App\Entity\Ability;
use App\Entity\Armor;
use App\Entity\PlayableClass;
use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlayableClassFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $abilityRepo = $manager->getRepository(Ability::class);
        $armorRepo = $manager->getRepository(Armor::class);
        $weaponRepo = $manager->getRepository(Weapon::class);

        // ? Barde
        $barde = new PlayableClass();
        $barde->setName('Barde');
        $barde->setQuickDescription("Qu'il soit poète, érudit ou simple canaille, le barde tisse la magie par la parole et la musique pour galvaniser ses alliés, démobiliser l'adversaire, manipuler l'esprit et soigner les plaies. Les bardes sont les maîtres des chansons, des discours et de la magie qui les imprègne. Ils racontent que le multivers fut façonné par le verbe divin et que l'écho de ces paroles originelles de la création résonne encore à travers le cosmos. La musique des bardes s'efforce de capturer cette réverbération pour ourdir sorts et divers pouvoirs.");
        $barde->setDescription("Qu'il soit poète, érudit ou simple canaille, le barde tisse la magie par la parole et la musique pour galvaniser ses alliés, démobiliser l'adversaire, manipuler l'esprit et soigner les plaies. Les bardes sont les maîtres des chansons, des discours et de la magie qui les imprègne. Ils racontent que le multivers fut façonné par le verbe divin et que l'écho de ces paroles originelles de la création résonne encore à travers le cosmos. La musique des bardes s'efforce de capturer cette réverbération pour ourdir sorts et divers pouvoirs.

L'INSPIRATION DE L'AVENTURE

Les bardes restent rarement longtemps au même endroit. Cette soif de voyage et de nouveaux récits les porte naturellement vers la carrière d'aventurier. Chaque quête est une occasion d'apprendre, de parfaire ses talents, d'accéder à des cryptes oubliées, de redécouvrir des œuvres magiques, de déchiffrer de vieux manuscrits, de fouler d'étranges contrées ou de croiser des créatures exotiques.
Les bardes aiment voyager aux côtés de héros pour être les témoins directs de leurs exploits. Un barde qui relate avec brio une histoire extraordinaire qu'il a vécue s'assure une grande renommée auprès de ses pairs. D'ailleurs, à force de conter tant de récits épiques, beaucoup finissent par devenir eux-mêmes les acteurs de ces exploits.");
        $barde->setLifeDice('1d8');
        $barde->setImageUrl('asset/barde.png');
        $barde->addArmor($armorRepo->findOneBy(['name' => 'Cuir']));
        $barde->addWeapon($weaponRepo->findOneBy(['name' => 'Rapière']));
        $barde->addWeapon($weaponRepo->findOneBy(['name' => 'Dague']));
        // abilities level 0
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Illusion mineure']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Lumière']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Main du mage']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Moquerie cruelle']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Prestidigitation']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Réparation']));
        // abilities level 1
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Charme-personne']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Compréhension des langues']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Déguisement']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Détection de la magie']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Feuille morte']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Grande foulée']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Identification']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Image silencieuse']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Lueurs féeriques']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Mot de guérison']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Soins']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Sommeil']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Vague tonnante']));
        // abilities level 2
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Déblocage']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Fracassement']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Immobilisation de personne']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Invisibilité']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Restauration partielle']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Silence']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Suggestion']));
        // abilities level 3
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Communication à distance']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Dissipation de la magie']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Image majeure']));
        $barde->addAbility($abilityRepo->findOneBy(['name' => 'Terreur']));

        $manager->persist($barde);

        // ? Clerc
        $clerc = new PlayableClass();
        $clerc->setName('Clerc');
        $clerc->setQuickDescription("Les clercs servent d'intermédiaires entre le monde des mortels et les lointains plans des dieux. Aussi variés que les divinités qu'ils servent, les clercs s'efforcent d'incarner leur œuvre et sont porteurs de magie.");
        $clerc->setDescription("Les clercs servent d'intermédiaires entre le monde des mortels et les lointains plans des dieux. Aussi variés que les divinités qu'ils servent, les clercs s'efforcent d'incarner leur œuvre et sont porteurs de magie.
        
GUÉRISSEURS ET COMBATTANTS

La magie divine, comme le nom le suggère, représente le pouvoir des dieux tel qu'il s'exprime à travers le monde. Les clercs, vecteurs de cette puissance, la manifestent tels des miracles. Le contrôle de cette magie ne passe ni par l'étude ni par un entraînement poussé. Le clerc peut apprendre des prières spécifiques et des rites anciens, mais sa capacité à lancer des sorts dépend essentiellement de sa piété et de son affinité avec les souhaïts de son dieu.
Les clercs combinent la magie d'assistance qui leur permet de soigner et d'inspirer leurs alliés avec des sorts plus offensifs qui blessent ou gênent l'adversaire. Ils peuvent ainsi créer l'émerveillement ou l'effroi, accabler l'ennemi de maux et de poisons, ou invoquer les flammes des cieux pour embraser l'opposition. Et quand un malfaiteur mérite surtout un coup de masse en plein crâne, le clerc compte sur sa formation martiale pour se joindre à la mêlée, porté par la puissance divine.
        
AGENTS DIVINS
        
Les acolytes et ecclésiastiques qui officient dans un temple ou sanctuaire ne sont pas tous clercs. Certains prêtres se contentent de servir au sein d'un lieu de culte et de contribuer à la volonté divine par la prière et le sacrifice, sans jamais recourir à la magie ni aux armes. Dans certaines villes, la prêtrise n'est d'ailleurs qu'une fonction politique qui ne demande aucune communion avec un dieu. Les vrais clercs restent rares.
Lorsqu'un clerc s'engage sur la voie de l'aventure, c'est généralement pour satisfaire la demande d'un dieu. Ce sentier lui demandera souvent de braver des périls hors des murs de la civilisation. Nombreux sont les clercs tenus de protéger les fidèles de leur divinité, ce qui peut impliquer d'affronter des monstres enragés, de négocier des accords de paix entre nations ou de condamner un portail démoniaque ou diabolique.");
        $clerc->setLifeDice('1d8');
        $clerc->setImageUrl('asset/clerc.png');
        $clerc->addArmor($armorRepo->findOneBy(['name' => 'Ecailles']));
        $clerc->addArmor($armorRepo->findOneBy(['name' => 'Bouclier']));
        $clerc->addWeapon($weaponRepo->findOneBy(['name' => "Masse d'armes"]));
        $clerc->addWeapon($weaponRepo->findOneBy(['name' => 'Arbalete légère']));
        // abilities level 0
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Assistance']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Flamme sacrée']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Lumière']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Réparation']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Résistance']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Thaumaturgie']));
        // abilities level 1
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Bénédiction']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Blessure']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Bouclier de la foi']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Détection de la magie']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Injonction']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Mot de guérison']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Rayon traçant']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Sanctuaire']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Soins']));
        // abilities level 2
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Aide']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Arme spirituelle']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Augure']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Immobilisation de personne']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Lien de protection']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Restauration partielle']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Silence']));
        // abilities level 3
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Délivrance des malédictions']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Dissipation de la magie']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Esprits gardiens']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => "Lueur d'espoir"]));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Mot de guérison de groupe']));
        $clerc->addAbility($abilityRepo->findOneBy(['name' => 'Retour à la vie']));

        $manager->persist($clerc);

        // ? Guerrier
        $guerrier = new PlayableClass();
        $guerrier->setName('Guerrier');
        $guerrier->setQuickDescription("Les chevaliers et leurs longues quêtes, les champions redoutables, les soldats d'élite et les mercenaires roués ; tous ces guerriers partagent une expertise des armes et des armures hors pair.
Et la mort les connaît, cette mort qu'ils toisent avec défiance chaque fois qu'ils défendent leurs amis et terrassent leurs adversaires.");
        $guerrier->setDescription("Les chevaliers et leurs longues quêtes, les champions redoutables, les soldats d'élite et les mercenaires roués ; tous ces guerriers partagent une expertise des armes et des armures hors pair.
Et la mort les connaît, cette mort qu'ils toisent avec défiance chaque fois qu'ils défendent leurs amis et terrassent leurs adversaires.

DES SPÉCIALISTES COMPLETS

Tout guerrier qui se respecte peut manier efficacement n'importe quelle arme. De même, il saura se servir d'un bouclier et de tout type d'armure. Outre ces rudiments, chaque guerrier se spécialise dans un style de combat. Certains optent pour l'arc, d'autres préfèrent se battre avec une arme dans chaque main, et d'autres encore apprennent à renforcer leurs talents martiaux de magie. Cette alliance de fondamentaux solides et de discipline de fer en fait des combattants remarquables.");
        $guerrier->setLifeDice('1d10');
        $guerrier->setImageUrl('asset/guerrier.png');
        $guerrier->addArmor($armorRepo->findOneBy(['name' => 'Cotte de mailles']));
        $guerrier->addArmor($armorRepo->findOneBy(['name' => 'Bouclier']));
        $guerrier->addWeapon($weaponRepo->findOneBy(['name' => 'Épée longue']));
        $guerrier->addWeapon($weaponRepo->findOneBy(['name' => 'Arbalete légère']));

        $manager->persist($guerrier);

        // ? Magicien
        $magicien = new PlayableClass();
        $magicien->setName('Magicien');
        $magicien->setQuickDescription("Puisant dans la toile imperceptible de magie qui imprègne le cosmos, le magicien jette des sorts de flammes explosives, d'arcs de foudre, de subtiles tromperies et de contrôle mental implacable.");
        $magicien->setDescription("Puisant dans la toile imperceptible de magie qui imprègne le cosmos, le magicien jette des sorts de flammes explosives, d'arcs de foudre, de subtiles tromperies et de contrôle mental implacable.

ÉRUDITS DES ARCANES

Sauvage et mystérieuse, aussi variée de forme que d'utilisation, la puissance de la magie attire des disciples qui rêvent d'en maîtriser les secrets. Certains voudraient devenir les égaux des dieux en modelant la réalité même. Bien que l'incantation d'un sort classique ne demande que de prononcer quelques paroles étranges, d'esquisser quelques gestes et parfois de saupoudrer le tout de quelque substance exotique, ces composantes superficielles ne doivent pas faire oublier les années d'apprentissage et les innombrables heures d'étude qu'il a fallu pour atteindre cette expertise.
Les magiciens consacrent leur vie à leurs sorts. Tout le reste est secondaire. Ils en apprennent de nouveaux par empirisme et par expérience. Ils peuvent également les trouver auprès d'autres magiciens ou dans des manuscrits et écrits d'un autre âge, ou encore en côtoyant des créatures ancestrales elles-mêmes imprégnées de magie (comme les fées).

L'ATTRAIT DU SAVOIR

La vie d'un magicien est rarement ordinaire. Les moins excentriques d'entre eux travaillent comme sages ou professeurs au sein d'une bibliothèque ou d'une université, où ils enseignent à d'autres les secrets du multivers. Mais l'attrait du savoir et de la puissance finit par être entendu par les moins aventureux des magiciens, qui renoncent alors à la sécurité des rayonnages et des laboratoires pour plonger au cœur de ruines et de cités perdues. La plupart des magiciens sont convaincus que leurs homologues des civilisations antiques maîtrisaient des arcanes que le temps a oblitérés, des secrets dont la redécouverte pourrait ouvrir les portes d'un pouvoir plus immense que ce qu'offrent toutes les magies contemporaines.");
        $magicien->setLifeDice('1d6');
        $magicien->setImageUrl('asset/magicien.png');
        $magicien->addWeapon($weaponRepo->findOneBy(['name' => 'Bâton']));
        // abilities level 0
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Aspersion acide']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Bouffée de poison']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Illusion mineure']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Lumière']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Lumières dansantes']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Main du mage']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Poigne électrique']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Prestidigitation']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Rayon de givre']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Trait de feu']));
        // abilities level 1
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Armure du mage']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Bouclier']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Charme-personne']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Compréhension des langues']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Déguisement']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Détection de la magie']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Feuille morte']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Grande foulée']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Identification']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Image silencieuse']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Mains brûlantes']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Projectile magique']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Sommeil']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Vague tonnante']));
        // abilities level 2
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Arme magique']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Déblocage']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Flou']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Foulée brumeuse']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Fracassement']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Immobilisation de personne']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Invisibilité']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Lévitation']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => "Pattes d'araignée"]));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Sphère de feu']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Suggestion']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Ténèbres']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => "Toile d'araignée"]));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Verrou magique']));
        // abilities level 3
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Boule de feu']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Dissipation de la magie']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Éclair']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Hâte']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Image majeure']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Terreur']));
        $magicien->addAbility($abilityRepo->findOneBy(['name' => 'Vol']));

        $manager->persist($magicien);

        // ? Roublard
        $roublard = new PlayableClass();
        $roublard->setName('Roublard');
        $roublard->setQuickDescription("Les roublards comptent sur leur adresse, leur discrétion et les points faibles de l'adversaire pour prendre le dessus dans toutes les situations. Ils semblent toujours savoir trouver la solution au problème, démontrant par là une débrouillardise et une polyvalence qui forment la pierre angulaire de tout groupe d'aventuriers digne de ce nom.");
        $roublard->setDescription("Les roublards comptent sur leur adresse, leur discrétion et les points faibles de l'adversaire pour prendre le dessus dans toutes les situations. Ils semblent toujours savoir trouver la solution au problème, démontrant par là une débrouillardise et une polyvalence qui forment la pierre angulaire de tout groupe d'aventuriers digne de ce nom.
        
ADRESSE ET PRÉCISION
Les roublards jouissent d'une expertise à laquelle peu d'aventuriers peuvent prétendre. Beaucoup se consacrent à la discrétion et la tromperie, d'autres soignent des talents comme l'escalade, la détection des pièges et leur désarmement, ou le crochetage des serrures. En matière de combat, les roublards misent davantage sur la ruse que la force brute. Ils préfèrent asséner une attaque précise à l'endroit où elle fera le plus mal, plutôt que de terrasser l'adversaire en le rouant de coups.");
        $roublard->setLifeDice('1d8');
        $roublard->setImageUrl('asset/roublard.png');
        $roublard->addWeapon($weaponRepo->findOneBy(['name' => 'Rapière']));
        $roublard->addWeapon($weaponRepo->findOneBy(['name' => 'Arc court']));
        $roublard->addWeapon($weaponRepo->findOneBy(['name' => 'Dague']));
        $roublard->addArmor($armorRepo->findOneBy(['name' => 'Cuir']));

        $manager->persist($roublard);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [AbilityFixtures::class,
            ArmorFixtures::class,
            WeaponFixtures::class];
    }
}
