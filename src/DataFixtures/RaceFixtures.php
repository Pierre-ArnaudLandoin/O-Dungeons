<?php

namespace App\DataFixtures;

use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dwarf = new Race();
        $dwarf->setName('Nain');
        $dwarf->setQuickDescription("Des royaumes dont la noblesse n'a d'égale que l'ancienneté, des demeures creusées dans les racines des montagnes, l'écho des pioches et des marteaux s'élevant des mines profondes et des forges flamboyantes, le dévouement envers le clan et la tradition, tels sont les liens qui unissent tous les nains.");
        $dwarf->setFullDescription("Des royaumes dont la noblesse n'a d'égale que l'ancienneté, des demeures creusées dans les racines des montagnes, l'écho des pioches et des marteaux s'élevant des mines profondes et des forges flamboyantes, le dévouement envers le clan et la tradition, tels sont les liens qui unissent tous les nains.

À MÉMOIRE LONGUE, RANCUNES TENACES

Les nains peuvent vivre jusqu'à plus de 400 ans. Ils respectent les traditions de leur clan et font remonter leur lignage jusqu'à la fondation de leurs premières forteresses quand le monde était encore jeune ; ils ne renoncent pas à leurs coutumes sur un coup de tête. Parmi ces traditions, la vénération des dieux occupe une place importante, ces divinités représentant les idéaux nains du travail appliqué, du talent martial et de la forge.

CLANS ET ROYAUMES

Les royaumes nains s'étendent dans les entrailles des montagnes où ce peuple extrait gemmes et minerais précieux, et forge ses merveilles. Les nains prisent la splendeur des métaux rares et les beaux bijoux, maïs cette passion peut chez certains dégénérer en cupidité. Les richesses que leurs montagnes ne leur procurent pas leur restent accessibles par le commerce.

La cellule principale de la société naïne reste le clan. Tous les nains chérissent cette affiliation, y compris ceux qui vivent loin de leur royaume. Ils se reconnaissent entre cousins et invoquent leurs aïeux dans le moindre serment, le moindre juron. Rien n'est pire pour un nain que de se retrouver sans clan.

Les nains des autres terres sont généralement artisans et fabriquent notamment des armes, des armures et des joyaux. Certains deviennent mercenaires ou gardes du corps, très recherchés pour leur vaillance et leur loyauté.

LES DIEUX, L'OR ET LE CLAN

Les naïns qui s'engagent sur la voie de l'aventure sont parfois motivés par le goût de l'or. D'autres tirent leur inspiration d'une divinité, par vocation profonde ou simplement pour contribuer à la gloire de l'un des dieux nains. Le clan et les ancêtres jouent un rôle tout aussi essentiel. Un nain cherchera parfois à restaurer l'honneur des siens, à venger une vieille injustice subie par son clan où à retrouver une place dans cette famille après en avoir été exilé. Ou bien, il sera sur les traces de la hache que maniaït jadis un ancêtre illustre.
        
TRAITS DES NAINS

Votre personnage nain possède les traits suivants.

Augmentation de caractéristique. Votre valeur de Constitution augmente de 2.

Âge. Les nains se développent au même rythme que les humains, mais ils sont considérés comme jeunes jusqu'à l'âge de 50 ans. Ils vivent en moyenne 350 ans.

Taille. Les nains mesurent entre 1,20 m et 1,50 m, pour un poids moyen d'environ 70 kg. Vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 7,50 m. Votre vitesse n'est pas réduite par le port d'une armure lourde.

Vision dans le noir. Habitué à vivre sous terre, vous disposez d'une vision supérieure dans l'obscurité et la pénombre. Dans un rayon de 18 m, vous voyez en conditions de lumière faible comme si la lumière était vive, et dans les ténèbres comme sous une lumière faible. Vous ne discernez pas les couleurs dans les ténèbres, mais percevez des nuances de gris.

Connaissance de la pierre. Chaque fois que vous effectuez un test d'Intelligence (Histoire) lié aux origines d'un travail de maçonnerie, on considère que vous avez la maîtrise de la compétence Histoire et vous appliquez le double de votre bonus de maîtrise au test, au lieu du simple bonus.

Entraînement aux armes naines. Vous avez la maîtrise de la hache d'armes, de la hachette, du marteau léger et du marteau de guerre.

Maîtrise d'outils. Vous recevez la maîtrise des outils d'artisan de votre choix parmi : outils de forgeron, matériel de brasseur, outils de maçon.

Résistance naine. Vous êtes avantagé aux jets de sauvegarde contre le poison et bénéficiez de la résistance aux dégâts de poison (cf. page 39 pour la règle de la résistance).

Langues. Vous parlez, lisez et écrivez le commun et le nain. Le nain est une langue gutturale et percussive, ce qui se retrouve dans l'accent des nains, quel que soit l'idiome parlé.

Variante raciale. Il existe deux variantes raciales principales chez les nains des mondes de D&D : les naïns des collines et les nains des montagnes. Optez pour l'une de ces variantes et ajoutez les traits associés à vos autres traits raciaux.");
        $dwarf->setImageUrl('asset/nain.png');

        $manager->persist($dwarf);

        $elf = new Race();
        $elf->setName('Elfe');
        $elf->setQuickDescription("Peuple à la grâce surnaturelle, les elfes vivent en des lieux à la beauté éthérée, au cœur de forêts ancestrales ou dans des tours effilées étincelant d'éclats féeriques, bercés de douces mélodies et où la brise exhale des fragrances exquises. Les elfes qu'on croise hors de leurs domaines sont souvent ménestrels ambulants, artistes ou itinérants. Les nobles humains se disputent les services des professeurs elfes pour enseigner le maniement de l'épée ou la magie à leur progéniture.");
        $elf->setFullDescription("Peuple à la grâce surnaturelle, les elfes vivent en des lieux à la beauté éthérée, au cœur de forêts ancestrales ou dans des tours effilées étincelant d'éclats féeriques, bercés de douces mélodies et où la brise exhale des fragrances exquises. Les elfes qu'on croise hors de leurs domaines sont souvent ménestrels ambulants, artistes ou itinérants. Les nobles humains se disputent les services des professeurs elfes pour enseigner le maniement de l'épée ou la magie à leur progéniture.

HORS DU TEMPS

La longévité des elfes excède facilement les 700 ans. Ils se montrent plus souvent amusés qu'excités, intrigués qu'avides. Ils restent plutôt froids et distants, et ne s'émeuvent pas à la moindre occasion. Lorsqu'ils ont un objectif, en revanche, qu'il s'agisse d'une mission d'exploration ou d'apprendre un nouveau talent, les elfes œuvrent sans relâche. Leur amitié s'acquiert de longue haleine de même que leur hostilité, et ils n'oublient ni l'une ni l'autre facilement. Aux insultes mesquines, ils répondent par le mépris, aux graves affronts par une vengeance implacable. Comme les branches d'un arbrisseau, les elfes s'avèrent d'une grande souplesse face au danger. Ils préfèrent résoudre les différends par la diplomatie et le compromis, avant de recourir à la violence. Quand des intrus empiètent sur leurs demeures sylvestres, ils se contentent parfois de se retrancher en attendant que l'envahisseur se lasse et reparte. Mais quand l'heure est grave, les elfes montrent leur dur visage martial et un talent certain pour l'épée, l'arc et la stratégie.

EXPLORATION ET AVENTURE

Certains elfes partent à l'aventure par soif de voyage. Leur longévité leur ouvre des siècles d'exploration et de découverte. Ils aiment aussi parfaire leurs prouesses martiales ou accroître leur puissance magique, ce que leur permet la vie d'aventurier.

NOMS ELFIQUES

Chaque elfe est considéré comme un enfant tant qu'il ne s'est pas lui-même déclaré adulte, généralement dans la foulée de son premier siècle. Avant cela, il ne porte qu'un nom juvénile. Quel que soit l'âge de celles et ceux qui les portent, les noms elfiques sont peu genrés. Un elfe qui se proclame adulte choisit son nouveau nom, même si ses amis et parents continuent parfois à l'appeler par son nom d'enfant. Chaque elfe porte de plus un nom de famille combinant généralement des termes elfiques. Certains, lorsqu'ils voyagent parmi les humains, traduisent ce nom en commun, mais d'autres s'en tiennent à la version elfique.

TRAITS DES ELFES

Votre personnage elfe possède les traits suivants.

Augmentation de caractéristique. Votre valeur de Dextérité augmente de 2.

Âge. Bien que les elfes atteignent leur maturité corporelle au même âge que les humains, ils considèrent qu'un adulte n'est pas juste physiquement développé, mais aussi un être d'expérience. Les elfes se déclarent généralement adultes et adoptent leur nom définitif aux alentours de leurs 100 ans. Ils peuvent vivre jusqu'à 750 ans.

Taille. Les elfes mesurent entre 1,50 m et 1,80 m, avec une carrure plutôt fine. Vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 9 m.

Vision dans le noir. Habitué aux forêts vespérales et au ciel nocturne, vous disposez d'une vision supérieure dans l'obscurité et la pénombre. Dans un rayon de 18 m, vous voyez en conditions de lumière faible comme si la lumière était vive, et dans les ténèbres comme sous une lumière faible. Vous ne discernez pas les couleurs dans les ténèbres, mais percevez des nuances de gris.

Ascendance féerique. Vous êtes avantagé aux jets de sauvegarde contre l'état charmé et la magie ne peut pas vous endormir.

Sens aiguisés. Vous avez la maîtrise de la compétence perception.

Transe. Les elfes n'ont pas besoin de dormir. Au lieu de cela, ils méditent profondément dans un état de conscience partielle (que l'on appelle communément « transe »), quatre heures par jour. Cette méditation peut s'accompagner de songes durant lesquels vous pratiquez des exercices mentaux qui sont désormais pour vous une seconde nature. Une fois que vous terminez un tel repos, vous recevez les mêmes bénéfices qu'un humain émergeant de 8 heures de sommeil.

Langues. Vous parlez, lisez et écrivez le commun et l'elfique. Cette langue fluide mêle intonations subtiles et grammaire complexe. La littérature elfique, riche et variée, a produit de nombreux chants et poèmes célèbres chez d'autres cultures.

De nombreux bardes apprennent cette langue pour pouvoir ajouter des ballades elfiques à leur répertoire.

Variante raciale. Des différends ancestraux entre les elfes ont engendré trois ethnies principales : les hauts-elfes, les elfes sylvestres et les elfes noirs, communément appelés drows.");
        $elf->setImageUrl('asset/elfe.png');

        $manager->persist($elf);

        $halfelin = new Race();
        $halfelin->setName('Halfelin');
        $halfelin->setQuickDescription("Le confort du foyer constitue l'ambition majeure de la plupart des halfelins : de quoi se poser dans la paix et la quiétude, loin des monstres en maraude et du fracas des armées ; un âtre bien alimenté et un repas copieux, une bonne chope et une conversation entre amis. Certains halfelins coulent leurs jours au sein d'une communauté agricole reculée, d'autres forment des troupes nomades qui voyagent à longueur de temps au gré de la route sans fin et des vastes horizons qui promettent de nouvelles contrées merveilleuses, de nouvelles cultures.");
        $halfelin->setFullDescription("Le confort du foyer constitue l'ambition majeure de la plupart des halfelins : de quoi se poser dans la paix et la quiétude, loin des monstres en maraude et du fracas des armées ; un âtre bien alimenté et un repas copieux, une bonne chope et une conversation entre amis. Certains halfelins coulent leurs jours au sein d'une communauté agricole reculée, d'autres forment des troupes nomades qui voyagent à longueur de temps au gré de la route sans fin et des vastes horizons qui promettent de nouvelles contrées merveilleuses, de nouvelles cultures.

PETITS MAIS PRAGMATIQUES

Les menus halfelins survivent en ce monde de créatures plus grandes qu'eux en évitant de se faire remarquer ou, quand ils ne passent pas inaperçus, en évitant les coups. Hauts de moins d'un mètre, ils paraissent bien inoffensifs et ont su traverser les siècles dans l'ombre des empires, toujours en marge des grands conflits. Les halfelins affectionnent les vêtements pratiques aux couleurs vives, mais ce pragmatisme ne se limite pas à leurs frusques. Ils prisent les besoins essentiels et les plaisirs simples, toute affectation leur paraissant vaine. Même les plus riches verrouillent leur trésor dans la cave plutôt que de l'étaler à la vue de tous. Ils ont le don de trouver les solutions les plus simples aux problèmes et n'aiment pas tergiverser.

CHARITABLES ET CURIEUX

Les halfelins sont des gens affables et gais. Les liens familiaux et l'amitié leur sont chers, de même que la chaleur du foyer. Et même leurs aventuriers ne partent explorer que par amitié, par esprit de groupe, par curiosité ou par soif de voyage. Ils adorent les découvertes, même les plus simples comme un mets exotique ou un nouveau style vestimentaire.

Les halfelins sont enclins à la miséricorde et supportent mal de voir souffrir des êtres vivants. Généreux, ils partagent leurs biens de bon gré, même quand les temps sont durs.

TRAITS DES HALFELINS

Votre personnage halfelin possède les traits suivants.

Augmentation de caractéristique. Votre valeur de Dextérité augmente de 2.

Âge. Les halfelins atteignent l'Âge adulte à 20 ans et vivent généralement jusqu'à 150 ans.

Taille. Les halfelins mesurent environ 90 em pour un poids d'environ 20 kg. Vous êtes de taille P.

Vitesse. Votre vitesse de base au sol est de 7,50 m.

Agilité halfeline. Vous pouvez vous déplacer à travers l'espace de toute créature dont la catégorie de taille est supérieure à la vôtre.

Brave. Vous êtes avantagé aux jets de sauvegarde contre l'état effrayé.

Chanceux. Lorsque vous obtenez un 1 sur le d20 d'un jet d'attaque, un test de caractéristique ou un jet de sauvegarde, vous pouvez relancer ce dé, auquel cas c'est le second jet qui s'applique. 

Langues. Vous parlez, lisez et écrivez le commun et le halfelin. Cette langue n'a rien de secret, mais les halfelins n'aiment guère la partager. Leur littérature est plutôt pauvre, car ils écrivent finalement très peu. Leur tradition orale s'avère en revanche très riche. Tous les halfelins ou presque recourent au commun pour converser avec la population des contrées qu'ils habitent ou qu'ils traversent.

Variante raciale. Les deux branches principales de halfelins, les pieds-légers et les robustes tiennent plus de proches cousins que d'ethnies distinctes. Optez pour l'une de ces variantes et ajoutez les traits associés à vos autres traits raciaux.");
        $halfelin->setImageUrl('asset/halfelin.png');

        $manager->persist($halfelin);

        $human = new Race();
        $human->setName('Humain');
        $human->setQuickDescription("Dans la plupart des mondes, les humains sont considérés comme la plus jeune des espèces communes et vivent peu de temps comparés aux nains, aux elfes et aux dragons. C'est peut-être cette longévité modeste qui les pousse à accomplir tant de choses dans le temps qui leur est imparti. À moins qu'ils estiment avoir quelque chose à prouver aux espèces plus anciennes, ce qui expliquerait leurs puissants empires. Quelle que soit leur motivation, les humains restent les novateurs, les battants et les pionniers de ces mondes.");
        $human->setFullDescription("Dans la plupart des mondes, les humains sont considérés comme la plus jeune des espèces communes et vivent peu de temps comparés aux nains, aux elfes et aux dragons. C'est peut-être cette longévité modeste qui les pousse à accomplir tant de choses dans le temps qui leur est imparti. À moins qu'ils estiment avoir quelque chose à prouver aux espèces plus anciennes, ce qui expliquerait leurs puissants empires. Quelle que soit leur motivation, les humains restent les novateurs, les battants et les pionniers de ces mondes.

UNE VARIÉTÉ UNIVERSELLE

De toutes les espèces communes, les humains s'imposent comme celle dont l'ambition et la capacité d'adaptation sont les plus grandes. Leurs goûts, leurs moralités et leurs coutumes varient extraordinairement d'une contrée colonisée à l'autre. Quand ils s'installent quelque part, toutefois, ils y restent : leurs cités sont faites pour résister aux assauts du temps. En tant qu'individus, les humains vivent peu de temps, mais leurs nations et sociétés perpétuent les traditions et les institutions comme les temples, les systèmes politiques, les bibliothèques et les lois dont les origines remontent bien plus loin que la mémoire de n'importe quel humain. Ils vivent le moment présent comme personne, ce qui les destine à l'aventure, mais savent aussi planifier l'avenir et cherchent à marquer la postérité. Pris individuellement ou en tant que peuple,les humains demeurent des opportunistes polyvalents, capables de s'adapter à tous les changements politiques et sociaux.

Votre personnage humain possède les traits suivants.

Augmentation de caractéristique. Chacune de vos valeurs de caractéristique augmente de 1.

Âge. Les humains atteignent l'âge adulte à l'approche de la vingtaine et vivent moins d'un siècle.

Taille. Les humains affichent des mensurations très variées, leur taille allant du mètre cinquante à bien plus d'un mètre quatre-vingts. Où que vous vous situiez dans cet intervalle, vous êtes de taille M.

Vitesse. Votre vitesse de base au sol est de 9 m.

Langues. Vous parlez, lisez et écrivez le commun et une langue supplémentaire de votre choix. Les humains apprennent généralement la langue des peuples qu'ils côtoient le plus, qui peut être un dialecte obscur. Ils adorent émailler leur discours de mots empruntés à d'autres langues : jurons orcs, termes musicaux elfiques, formules militaires naïnes, etc.");
        $human->setImageUrl('asset/humain.png');

        $manager->persist($human);

        $manager->flush();
    }
}
