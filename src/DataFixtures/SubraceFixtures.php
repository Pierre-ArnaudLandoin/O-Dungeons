<?php

namespace App\DataFixtures;

use App\Entity\Race;
use App\Entity\Subrace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SubraceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $raceRepo = $manager->getRepository(Race::class);

        $hillDwarf = new Subrace();
        $hillDwarf->setRace($raceRepo->findOneBy(['name' => 'Nain']));
        $hillDwarf->setName('Nain des collines');
        $hillDwarf->setDescription("Nain des collines, vous êtes doté de sens aiguisés, d'une grande sagacité et d'une robustesse remarquable. Les nains d'or des Forgotten Realms sont des nains des collines.");
        $hillDwarf->setImageUrl('');
        $hillDwarf->setStrength(0);
        $hillDwarf->setDexterity(0);
        $hillDwarf->setConstitution(2);
        $hillDwarf->setWisdom(1);
        $hillDwarf->setIntelligence(0);
        $hillDwarf->setCharisma(0);
        $hillDwarf->setTrait("Augmentation de caractéristique. Votre valeur de Constitution augmente de 2. Votre valeur de Sagesse augmente de 1.

Âge. Les nains se développent au même rythme que les humains, mais ils sont considérés comme jeunes jusqu'à l'âge de 50 ans. Ils vivent en moyenne 350 ans.

Taille. Les nains mesurent entre 1,20 m et 1,50 m, pour un poids moyen d'environ 70 kg. Vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 7,50 m. Votre vitesse n'est pas réduite par le port d'une armure lourde.

Vision dans le noir. Habitué à vivre sous terre, vous disposez d'une vision supérieure dans l'obscurité et la pénombre. Dans un rayon de 18 m, vous voyez en conditions de lumière faible comme si la lumière était vive, et dans les ténèbres comme sous une lumière faible. Vous ne discernez pas les couleurs dans les ténèbres, mais percevez des nuances de gris.

Connaissance de la pierre. Chaque fois que vous effectuez un test d'Intelligence (Histoire) lié aux origines d'un travail de maçonnerie, on considère que vous avez la maîtrise de la compétence Histoire et vous appliquez le double de votre bonus de maîtrise au test, au lieu du simple bonus.

Entraînement aux armes naines. Vous avez la maîtrise de la hache d'armes, de la hachette, du marteau léger et du marteau de guerre.

Maîtrise d'outils. Vous recevez la maîtrise des outils d'artisan de votre choix parmi : outils de forgeron, matériel de brasseur, outils de maçon.

Résistance naine. Vous êtes avantagé aux jets de sauvegarde contre le poison et bénéficiez de la résistance aux dégâts de poison (cf. page 39 pour la règle de la résistance).

Langues. Vous parlez, lisez et écrivez le commun et le nain. Le nain est une langue gutturale et percussive, ce qui se retrouve dans l'accent des nains, quel que soit l'idiome parlé.

Ténacité naine. Votre maximum de points de vie augmente de 1, et augmente encore de 1 chaque fois que vous gagnez un niveau.");

        $manager->persist($hillDwarf);

        $mountainDwarf = new Subrace();
        $mountainDwarf->setRace($raceRepo->findOneBy(['name' => 'Nain']));
        $mountainDwarf->setName('Nain des montagnes');
        $mountainDwarf->setDescription("Comme tous les nains des montagnes, vous êtes fort et coriace, habitué à l'existence rude que réservent les reliefs escarpés. Vous êtes plutôt grand pour un nain et votre peau affiche un teint assez clair. Les nains d'écu du nord des Forgotten Realms sont des nains des montagnes.");
        $mountainDwarf->setImageUrl('');
        $mountainDwarf->setStrength(2);
        $mountainDwarf->setDexterity(0);
        $mountainDwarf->setConstitution(2);
        $mountainDwarf->setWisdom(0);
        $mountainDwarf->setIntelligence(0);
        $mountainDwarf->setCharisma(0);
        $mountainDwarf->setTrait("Augmentation de caractéristique. Votre valeur de Constitution augmente de 2. Votre valeur de Force augmente de 2.

Âge. Les nains se développent au même rythme que les humains, mais ils sont considérés comme jeunes jusqu'à l'âge de 50 ans. Ils vivent en moyenne 350 ans.

Taille. Les nains mesurent entre 1,20 m et 1,50 m, pour un poids moyen d'environ 70 kg. Vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 7,50 m. Votre vitesse n'est pas réduite par le port d'une armure lourde.

Vision dans le noir. Habitué à vivre sous terre, vous disposez d'une vision supérieure dans l'obscurité et la pénombre. Dans un rayon de 18 m, vous voyez en conditions de lumière faible comme si la lumière était vive, et dans les ténèbres comme sous une lumière faible. Vous ne discernez pas les couleurs dans les ténèbres, mais percevez des nuances de gris.

Connaissance de la pierre. Chaque fois que vous effectuez un test d'Intelligence (Histoire) lié aux origines d'un travail de maçonnerie, on considère que vous avez la maîtrise de la compétence Histoire et vous appliquez le double de votre bonus de maîtrise au test, au lieu du simple bonus.

Entraînement aux armes naines. Vous avez la maîtrise de la hache d'armes, de la hachette, du marteau léger et du marteau de guerre.

Maîtrise d'outils. Vous recevez la maîtrise des outils d'artisan de votre choix parmi : outils de forgeron, matériel de brasseur, outils de maçon.

Résistance naine. Vous êtes avantagé aux jets de sauvegarde contre le poison et bénéficiez de la résistance aux dégâts de poison (cf. page 39 pour la règle de la résistance).

Langues. Vous parlez, lisez et écrivez le commun et le nain. Le nain est une langue gutturale et percussive, ce qui se retrouve dans l'accent des nains, quel que soit l'idiome parlé.

Port des armures naines. Vous avez la maîtrise des armures légères et intermédiaires.");

        $manager->persist($mountainDwarf);

        $highElf = new Subrace();
        $highElf->setRace($raceRepo->findOneBy(['name' => 'Elfe']));
        $highElf->setName('Haut-elfe');
        $highElf->setDescription("Les hauts-elfes, très vifs d'esprit, connaissent chacun les rudiments de la magie. Au sein de nombreux univers de D&D, on rencontre deux types de hauts-elfes. Ceux qui se montrent hautains et distants, et s'estiment supérieurs à tous, y compris les autres cultures elfiques. C'est le cas des elfes du soleil des Forgotten Realms. L'autre type de hauts-elfes se montre plus cordial, fait preuve de moins de morgue et se rencontre souvent parmi les humains et d'autres races. C'est le cas des elfes de lune des Forgotten Realms.
        
        Les elfes du soleil des Forgotten Realms (également appelés elfes d'or ou elfes de l'aube) présentent une peau de bronze et une chevelure cuivrée, noire ou blonde comme l'or. Leurs yeux sont dorés, argentés ou noirs. Les elfes de lune (également appelés elfes d'argent ou elfes gris) sont bien plus pâles, avec une peau d'albâtre présentant parfois des reflets bleus. Leurs cheveux sont souvent d'un blanc argenté, ou bien noirs ou bleus, mais les diverses nuances de blond, châtain et roux ne sont pas rares. Ils ont les yeux bleus ou verts, pailletés d'or.
        ");
        $highElf->setImageUrl('');
        $highElf->setStrength(0);
        $highElf->setDexterity(2);
        $highElf->setConstitution(0);
        $highElf->setWisdom(0);
        $highElf->setIntelligence(1);
        $highElf->setCharisma(0);
        $highElf->setTrait("Augmentation de caractéristique. Votre valeur de Dextérité augmente de 2. Votre valeur d'Intelligence augmente de 1.

Âge. Bien que les elfes atteignent leur maturité corporelle au même âge que les humains, ils considèrent qu'un adulte n'est pas juste physiquement développé, mais aussi un être d'expérience. Les elfes se déclarent généralement adultes et adoptent leur nom définitif aux alentours de leurs 100 ans. Ils peuvent vivre jusqu'à 750 ans.

Taille. Les elfes mesurent entre 1,50 m et 1,80 m, avec une carrure plutôt fine. Vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 9 m.

Vision dans le noir. Habitué aux forêts vespérales et au ciel nocturne, vous disposez d'une vision supérieure dans l'obscurité et la pénombre. Dans un rayon de 18 m, vous voyez en conditions de lumière faible comme si la lumière était vive, et dans les ténèbres comme sous une lumière faible. Vous ne discernez pas les couleurs dans les ténèbres, mais percevez des nuances de gris.

Ascendance féerique. Vous êtes avantagé aux jets de sauvegarde contre l'état charmé et la magie ne peut pas vous endormir.

Sens aiguisés. Vous avez la maîtrise de la compétence perception.

Transe. Les elfes n'ont pas besoin de dormir. Au lieu de cela, ils méditent profondément dans un état de conscience partielle (que l'on appelle communément « transe »), quatre heures par jour. Cette méditation peut s'accompagner de songes durant lesquels vous pratiquez des exercices mentaux qui sont désormais pour vous une seconde nature. Une fois que vous terminez un tel repos, vous recevez les mêmes bénéfices qu'un humain émergeant de 8 heures de sommeil.

Langues. Vous parlez, lisez et écrivez le commun et l'elfique. Cette langue fluide mêle intonations subtiles et grammaire complexe. La littérature elfique, riche et variée, a produit de nombreux chants et poèmes célèbres chez d'autres cultures.

De nombreux bardes apprennent cette langue pour pouvoir ajouter des ballades elfiques à leur répertoire.

Variante raciale. Des différends ancestraux entre les elfes ont engendré trois ethnies principales : les hauts-elfes, les elfes sylvestres et les elfes noirs, communément appelés drows.

Entraînement aux armes elfiques. Vous avez la maîtrise de l'épée longue, de l'épée courte, de l'arc court et de l'arc long.

Sort mineur. Vous connaissez un sort mineur de la liste de sorts du magicien (au choix). L'Intelligence est la caractéristique
d'incantation correspondante.

Langue supplémentaire. Vous parlez, lisez et écrivez une langue supplémentaire de votre choix.");

        $manager->persist($highElf);

        $woodElf = new Subrace();
        $woodElf->setRace($raceRepo->findOneBy(['name' => 'Elfe']));
        $woodElf->setName('Elfe sylvestre');
        $woodElf->setDescription("Les elfes sylvestres jouissent d'une grande intuition et de sens plus acérés. Leur preste foulée leur permet de parcourir furtivement leurs forêts natales. Dans les Forgotten Realms, les elfes sylvestres (que l'on appelle également elfes sauvages, elfes verts ou elfes desbois) vivent en réclusion et se méfient des espèces non elfiques.
        La peau d'un elfe sylvestre affiche souvent une teinte cuivrée, parfois avec des reflets verts. Leurs cheveux sont souvent bruns ou noirs, mais on croise parfois des individus blonds, ou blond cuivré. Ils ont les yeux verts, marron ou noisette.
        ");
        $woodElf->setImageUrl('');
        $woodElf->setStrength(0);
        $woodElf->setDexterity(2);
        $woodElf->setConstitution(0);
        $woodElf->setWisdom(1);
        $woodElf->setIntelligence(0);
        $woodElf->setCharisma(0);
        $woodElf->setTrait("Augmentation de caractéristique. Votre valeur de Dextérité augmente de 2. Votre valeur de Sagesse augmente de 1.

Âge. Bien que les elfes atteignent leur maturité corporelle au même âge que les humains, ils considèrent qu'un adulte n'est pas juste physiquement développé, mais aussi un être d'expérience. Les elfes se déclarent généralement adultes et adoptent leur nom définitif aux alentours de leurs 100 ans. Ils peuvent vivre jusqu'à 750 ans.

Taille. Les elfes mesurent entre 1,50 m et 1,80 m, avec une carrure plutôt fine. Vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 9 m.

Vision dans le noir. Habitué aux forêts vespérales et au ciel nocturne, vous disposez d'une vision supérieure dans l'obscurité et la pénombre. Dans un rayon de 18 m, vous voyez en conditions de lumière faible comme si la lumière était vive, et dans les ténèbres comme sous une lumière faible. Vous ne discernez pas les couleurs dans les ténèbres, mais percevez des nuances de gris.

Ascendance féerique. Vous êtes avantagé aux jets de sauvegarde contre l'état charmé et la magie ne peut pas vous endormir.

Sens aiguisés. Vous avez la maîtrise de la compétence perception.

Transe. Les elfes n'ont pas besoin de dormir. Au lieu de cela, ils méditent profondément dans un état de conscience partielle (que l'on appelle communément « transe »), quatre heures par jour. Cette méditation peut s'accompagner de songes durant lesquels vous pratiquez des exercices mentaux qui sont désormais pour vous une seconde nature. Une fois que vous terminez un tel repos, vous recevez les mêmes bénéfices qu'un humain émergeant de 8 heures de sommeil.

Langues. Vous parlez, lisez et écrivez le commun et l'elfique. Cette langue fluide mêle intonations subtiles et grammaire complexe. La littérature elfique, riche et variée, a produit de nombreux chants et poèmes célèbres chez d'autres cultures. De nombreux bardes apprennent cette langue pour pouvoir ajouter des ballades elfiques à leur répertoire.

Entraînement aux armes elfiques. Vous avez la maîtrise de l'épée longue, de l'épée courte, de l'arc court et de l'arc long.
        
Foulée légère. Votre vitesse de base au sol est de 10,50 m.
        
Cachette naturelle. Vous pouvez tenter de vous cacher lorsque la visibilité est légèrement réduite par la végétation, une pluie battante, une averse de neige, la brume ou un autre phénomène naturel.");

        $manager->persist($woodElf);

        $lightfoot = new Subrace();
        $lightfoot->setRace($raceRepo->findOneBy(['name' => 'Halfelin']));
        $lightfoot->setName('Pied-léger');
        $lightfoot->setDescription("Comme tout halfelin pied-léger, vous maîtrisez l'art de vous soustraire à l'attention d'autrui et n'hésitez pas à vous cacher derrière plus grand que vous pour ce faire. Vous êtes plutôt affable. Dans les Forgotten Realms, les halfelins pieds-légers sont les plus répandus et constituent la culture halfeline la plus courante.");
        $lightfoot->setImageUrl('');
        $lightfoot->setStrength(0);
        $lightfoot->setDexterity(2);
        $lightfoot->setConstitution(0);
        $lightfoot->setWisdom(0);
        $lightfoot->setIntelligence(0);
        $lightfoot->setCharisma(1);
        $lightfoot->setTrait("Augmentation de caractéristique. Votre valeur de Dextérité augmente de 2. Votre valeur de Charisme augmente de 1.

Âge. Les halfelins atteignent l'Âge adulte à 20 ans et vivent généralement jusqu'à 150 ans.

Taille. Les halfelins mesurent environ 90 em pour un poids d'environ 20 kg. Vous êtes de taille P.

Vitesse. Votre vitesse de base au sol est de 7,50 m.

Agilité halfeline. Vous pouvez vous déplacer à travers l'espace de toute créature dont la catégorie de taille est supérieure à la vôtre.

Brave. Vous êtes avantagé aux jets de sauvegarde contre l'état effrayé.

Chanceux. Lorsque vous obtenez un 1 sur le d20 d'un jet d'attaque, un test de caractéristique ou un jet de sauvegarde, vous pouvez relancer ce dé, auquel cas c'est le second jet qui s'applique.

Discrétion naturelle. Il vous suffit d'être derrière une créature dont la catégorie de taille est au moins d'un cran supérieure à la vôtre pour pouvoir tenter de vous cacher.");

        $manager->persist($lightfoot);

        $stout = new Subrace();
        $stout->setRace($raceRepo->findOneBy(['name' => 'Halfelin']));
        $stout->setName('Robuste');
        $stout->setDescription('Les halfelins robustes sont plus vigoureux et plus résistants au poison. Dans les Forgotten Realms, ces halfelins appelés « cœurs-vaillants » se rencontrent surtout dans le sud.');
        $stout->setImageUrl('');
        $stout->setStrength(0);
        $stout->setDexterity(2);
        $stout->setConstitution(1);
        $stout->setWisdom(0);
        $stout->setIntelligence(0);
        $stout->setCharisma(0);
        $stout->setTrait("Augmentation de caractéristique. Votre valeur de Dextérité augmente de 2. Votre valeur de Constitution augmente de 1.

Âge. Les halfelins atteignent l'Âge adulte à 20 ans et vivent généralement jusqu'à 150 ans.

Taille. Les halfelins mesurent environ 90 em pour un poids d'environ 20 kg. Vous êtes de taille P.

Vitesse. Votre vitesse de base au sol est de 7,50 m.

Agilité halfeline. Vous pouvez vous déplacer à travers l'espace de toute créature dont la catégorie de taille est supérieure à la vôtre.

Brave. Vous êtes avantagé aux jets de sauvegarde contre l'état effrayé.

Chanceux. Lorsque vous obtenez un 1 sur le d20 d'un jet d'attaque, un test de caractéristique ou un jet de sauvegarde, vous pouvez relancer ce dé, auquel cas c'est le second jet qui s'applique.

Résilience des robustes. Vous êtes avantagé aux jets de sauvegarde contre le poison et bénéficiez de la résistance aux dégâts de poison.");

        $manager->persist($stout);

        $human = new Subrace();
        $human->setRace($raceRepo->findOneBy(['name' => 'Humain']));
        $human->setName('Humain');
        $human->setDescription("Dans la plupart des mondes, les humains sont considérés comme la plus jeune des espèces communes et vivent peu de temps comparés aux nains, aux elfes et aux dragons. C'est peut-être cette longévité modeste qui les pousse à accomplir tant de choses dans le temps qui leur est imparti. À moins qu'ils estiment avoir quelque chose à prouver aux espèces plus anciennes, ce qui expliquerait leurs puissants empires. Quelle que soit leur motivation, les humains restent les novateurs, les battants et les pionniers de ces mondes.");
        $human->setImageUrl('');
        $human->setStrength(1);
        $human->setDexterity(1);
        $human->setConstitution(1);
        $human->setWisdom(1);
        $human->setIntelligence(1);
        $human->setCharisma(1);
        $human->setTrait("Augmentation de caractéristique. Chacune de vos valeurs de caractéristique augmente de 1.

Âge. Les humains atteignent l'âge adulte à l'approche de la vingtaine et vivent moins d'un siècle.

Taille. Les humains affichent des mensurations très variées, leur taille allant du mètre cinquante à bien plus d'un mètre quatre-vingts. Où que vous vous situiez dans cet intervalle, vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 9 m.

Langues. Vous parlez, lisez et écrivez le commun et une langue supplémentaire de votre choix. Les humains apprennent généralement la langue des peuples qu'ils côtoient le plus, qui peut être un dialecte obscur. Ils adorent émailler leur discours de mots empruntés à d'autres langues : jurons orcs, termes musicaux elfiques, formules militaires naïnes, etc.");

        $manager->persist($human);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [RaceFixtures::class];
    }
}
