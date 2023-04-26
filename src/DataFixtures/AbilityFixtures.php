<?php

namespace App\DataFixtures;

use App\Entity\Ability;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AbilityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $aide = new Ability();
        $aide->setName('Aide');
        $aide->setQuickDescription('Abjuration du 2ème niveau');
        $aide->setDescription("Abjuration du 2ème niveau
Votre sort raffermit la robustesse et la détermination de vos alliés. Choisissez jusqu'à trois créatures à portée. Le maximum de points de vie de chaque cible et ses points de vie augmentent de 5 pour toute la durée.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 3° niveau ou supérieur, les points de vie de la cible augmentent de 5 de plus par niveau d'emplacement au-delà du 2°.");
        $aide->setIncantationTime('1 action');
        $aide->setAbilityRange('9m');
        $aide->setComponent('V, S, M (une bandelette de tissu blanc)');
        $aide->setDuration('8 heures');

        $manager->persist($aide);

        $armeMagique = new Ability();
        $armeMagique->setName('Arme magique');
        $armeMagique->setQuickDescription('Transmutation du 2ème niveau');
        $armeMagique->setDescription("Transmutation du 2ème niveau
Vous touchez une arme non magique. Jusqu'à la fin du sort, l'arme devient magique, dotée d'un bonus de +1 aux jets d'attaque et aux jets de dégâts.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° ou 5° niveau, le bonus passe à +2. Avec un emplacement du 6° niveau ou supérieur, le bonus passe à +3.");
        $armeMagique->setIncantationTime('1 action bonus');
        $armeMagique->setAbilityRange('contact');
        $armeMagique->setComponent('V, S');
        $armeMagique->setDuration("concentration, jusqu'à 1 heure");

        $manager->persist($armeMagique);

        $armeSpirituelle = new Ability();
        $armeSpirituelle->setName('Arme spirituelle');
        $armeSpirituelle->setQuickDescription('Évocation du 2ème niveau');
        $armeSpirituelle->setDescription("Évocation du 2ème niveau
Vous créez une arme spectrale et flottante à portée, qui persiste pour toute la durée ou jusqu'à ce que vous relanciez ce sort.
À l'incantation, vous pouvez effectuer une attaque de sort au corps à corps contre une créature située dans un rayon de 1,50 m de l'arme. Si l'attaque touche, la cible subit des dégâts de force égaux à 1d8 + votre modificateur de caractéristique d'incantation.
Par une action bonus à votre tour, vous pouvez déplacer l'arme d'un maximum de 6 m et répéter l'attaque contre une cible située dans un rayon de 1,50 m de l'arme.
L'arme prend la forme de votre choix. Les clercs de divinités associées à une arme donnée (saint Cuthbert est par exemple connu pour sa masse d'armes et Thor pour son marteau) donnent l'aspect de cet objet à leur arme spirituelle.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 3° niveau ou supérieur, les dégâts augmentent de 1d8 par tranche de deux niveaux d'emplacement au-delà du 2°.");
        $armeSpirituelle->setIncantationTime('1 action bonus');
        $armeSpirituelle->setAbilityRange('18m');
        $armeSpirituelle->setComponent('V, S');
        $armeSpirituelle->setDuration('1 minute');

        $manager->persist($armeSpirituelle);

        $armureMage = new Ability();
        $armureMage->setName('Armure du mage');
        $armureMage->setQuickDescription('Abjuration du 1er niveau');
        $armureMage->setDescription("Abjuration du 1er niveau
Vous touchez une créature consentante qui ne porte pas d'armure et une force magique protectrice l'enveloppe jusqu'à la fin du sort. La CA de base de la cible devient 13 + son modificateurde Dextérité. Le sort prend fin si la cible enfile une armureou si vous le révoquez au prix d'une action.");
        $armureMage->setIncantationTime('1 action');
        $armureMage->setAbilityRange('contact');
        $armureMage->setComponent('V, S, M (un morceau de cuir traité)');
        $armureMage->setDuration('8 heures');

        $manager->persist($armureMage);

        $aspersionAcide = new Ability();
        $aspersionAcide->setName('Aspersion acide');
        $aspersionAcide->setQuickDescription("Sort mineur d'invocation");
        $aspersionAcide->setDescription("Sort mineur d'invocation
Vous projetez une bulle d'acide. Choisissez une ou deux créatures que vous voyez à portée. Si vous en choisissez deux, elles doivent être dans un rayon de 1,50 m l'une de l'autre. Chaque cible doit réussir un jet de sauvegarde de Dextérité sous peine de subir 1d6 dégâts d'acide.
Les dégâts du sort augmentent de 1d6 lorsque vous atteignez le niveau 5 (2d6), le niveau 11 (3d6) et le niveau 17 (4d6).");
        $aspersionAcide->setIncantationTime('1 action');
        $aspersionAcide->setAbilityRange('18m');
        $aspersionAcide->setComponent('V, S');
        $aspersionAcide->setDuration('instantanée');

        $manager->persist($aspersionAcide);

        $assistance = new Ability();
        $assistance->setName('Assistance');
        $assistance->setQuickDescription('Sort mineur de divination');
        $assistance->setDescription('Sort mineur de divination
Vous touchez une créature consentante. Une fois avant la fin du sort, la cible peut lancer un d4 et en ajouter le résultat au test de caractéristique de son choix. Elle peut lancer ce dé avant ou après avoir effectué le test de caractéristique. Le sort prend alors fin.');
        $assistance->setIncantationTime('1 action');
        $assistance->setAbilityRange('contact');
        $assistance->setComponent('V, S');
        $assistance->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($assistance);

        $augure = new Ability();
        $augure->setName('Augure');
        $augure->setQuickDescription('Divination du 2éme niveau (rituel)');
        $augure->setDescription("Divination du 2éme niveau (rituel)
Vous lancez des bâtonnets sertis de gemmes, des osselets de dragon ou des cartes ouvragées, ou bien vous recourez à un autre instrument divinatoire, et recevez un présage d'une entité urnaturelle vous renseignant sur l'issue d'une opération que vous comptez mener dans les 30 minutes. Le MD choisit l'un des présages suivants :
Fortune, pour une issue favorable
Misère, pour une issue défavorable
Fortune et misère, pour une issue à la fois favorable et défavorable
Rien, pour une issue qui n'est ni vraiment favorable ni défavorable
Le sort ne tient pas compte des conjonctures qui pourraient peser dans la balance, comme l'incantation de nouveaux sorts, la perte d'un compagnon ou l'arrivée de renfort.
Si vous lancez le sort plusieurs fois avant de terminer votre prochain repos long, vous courez dès la deuxième incantation 25 % de risques cumulatifs qu'il vous livre une information aléatoire. Le MD effectue ce jet en secret.");
        $augure->setIncantationTime('1 minute');
        $augure->setAbilityRange('personnelle');
        $augure->setComponent("V, S, M (25 po d'os ou de bâtonnets gravés spécialement, ou d'objets symboliques similaires)");
        $augure->setDuration('instantanée');

        $manager->persist($augure);

        $auraDuCroise = new Ability();
        $auraDuCroise->setName('Aura du croisé');
        $auraDuCroise->setQuickDescription('Évocation du 3ème niveau');
        $auraDuCroise->setDescription("Évocation du 3ème niveau
La puissance sainte émane de vous dans un rayon de 9 m, réveillant l'audace des créatures amicales. Jusqu'à la fin du sort, l'aura se déplace avec vous, en vous prenant pour centre. Tant qu'elle est comprise dans l'aura, toute créature non hostile inflige 1d4 dégâts radiants supplémentaires lorsqu'elle touche avec une attaque d'arme. Vous profitez aussi de cet effet.");
        $auraDuCroise->setIncantationTime('1 action');
        $auraDuCroise->setAbilityRange('personnelle');
        $auraDuCroise->setComponent('V');
        $auraDuCroise->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($auraDuCroise);

        $benediction = new Ability();
        $benediction->setName('Bénédiction');
        $benediction->setQuickDescription('Enchantemant du 1er niveau');
        $benediction->setDescription("Enchantemant du 1er niveau
Vous bénissez jusqu'à trois créatures de votre choix à portée. Chaque fois qu'une cible effectue un jet d'attaque ou un jet de sauvegarde avant la fin du sort, elle peut lancer un d4 et en ajouter le résultat au jet d'attaque ou jet de sauvegarde.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, vous pouvez cibler une créature de plus par niveau d'emplacement au-delà du 1%.");
        $benediction->setIncantationTime('1 action');
        $benediction->setAbilityRange('9m');
        $benediction->setComponent("V, S, M (un peu d'eau bénite aspergée)");
        $benediction->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($benediction);

        $blessure = new Ability();
        $blessure->setName('Blessure');
        $blessure->setQuickDescription('Nécromancie du 1er niveau');
        $blessure->setDescription("Nécromancie du 1er niveau
Effectuez une attaque de sort au corps à corps contre une créature à portée d'allonge. Si l'attaque touche, la cible subit 3410 dégâts nécrotiques.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, les dégâts augmentent de 1d10 par niveau d'emplacement au-delà du 1%.");
        $blessure->setIncantationTime('1 action');
        $blessure->setAbilityRange('contact');
        $blessure->setComponent('V, S');
        $blessure->setDuration('instantanée');

        $manager->persist($blessure);

        $bouclier = new Ability();
        $bouclier->setName('Bouclier');
        $bouclier->setQuickDescription('Abjuration du 1er niveau');
        $bouclier->setDescription("Abjuration du 1er niveau
Une barrière invisible de force magique se forme pour vous protéger. Jusqu'au début de votre tour suivant, vous recevez un bonus de +5 à la CA, y compris contre l'attaque qui a déclenché le sort, et vous ne subissez aucun dégât de projectile magique.");
        $bouclier->setIncantationTime('1 réaction, que vous jouez lorsque vous êtes touché par une attaque ou ciblé par le sort projectile magique.');
        $bouclier->setAbilityRange('personnelle');
        $bouclier->setComponent('V, S');
        $bouclier->setDuration('1 round');

        $manager->persist($bouclier);

        $bouclierDeLaFoi = new Ability();
        $bouclierDeLaFoi->setName('Bouclier de la foi');
        $bouclierDeLaFoi->setQuickDescription('Abjuration du 1er niveau');
        $bouclierDeLaFoi->setDescription("Abjuration du 1er niveau
Un champ scintillant apparaît autour d'une créature de votre choix à portée et lui confère un bonus de +2 à la CA pour toute la durée.");
        $bouclierDeLaFoi->setIncantationTime('1 action bonus');
        $bouclierDeLaFoi->setAbilityRange('18m');
        $bouclierDeLaFoi->setComponent("V, S, M (un petit parchemin sur lequel apparaît un extrait d'écritures saintes)");
        $bouclierDeLaFoi->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($bouclierDeLaFoi);

        $bouffeeDePoison = new Ability();
        $bouffeeDePoison->setName('Bouffée de poison');
        $bouffeeDePoison->setQuickDescription("Sort mineur d'invocation");
        $bouffeeDePoison->setDescription("Sort mineur d'invocation
Vous tendez la main vers une créature que vous voyez à portée et votre paume projette un petit nuage de gaz toxique. La créature doit réussir un jet de sauvegarde de Constitution sous peine de subir 1412 dégâts de poison.
Les dégâts du sort augmentent de 1412 lorsque vous atteignez le niveau 5 (2d12), le niveau 11 (3412) et le niveau 17 (4d12).");
        $bouffeeDePoison->setIncantationTime('1 action');
        $bouffeeDePoison->setAbilityRange('3m');
        $bouffeeDePoison->setComponent('V, S');
        $bouffeeDePoison->setDuration('instantanée');

        $manager->persist($bouffeeDePoison);

        $bouleDeFeu = new Ability();
        $bouleDeFeu->setName('Boule de feu');
        $bouleDeFeu->setQuickDescription('Évocation du 3ème niveau');
        $bouleDeFeu->setDescription("Évocation du 3ème niveau
Une zébrure éblouissante part de votre doigt tendu jusqu'au point que vous choisissez à portée, produisant une déflagration au grondement sourd. Toute créature prise dans une sphère de 6 m de rayon centrée sur ce point doit effectuer un jet de sauvegarde de Dextérité. Elle subit 8d6 dégâts de feu en cas d'échec, la moitié en cas de réussite.
Les flammes contournent les coins. Elles embrasent les objets inflammables de la zone qui ne sont portés par personne.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° niveau ou supérieur, les dégâts augmentent de 1d6 par niveau d'emplacement au-delà du 3°.");
        $bouleDeFeu->setIncantationTime('1 action');
        $bouleDeFeu->setAbilityRange('45m');
        $bouleDeFeu->setComponent('V, S, M (une boulette de guano de chauve-souris et de soufre)');
        $bouleDeFeu->setDuration('instantanée');

        $manager->persist($bouleDeFeu);

        $charmePersonne = new Ability();
        $charmePersonne->setName('Charme-personne');
        $charmePersonne->setQuickDescription('Enchantement du 1er niveau');
        $charmePersonne->setDescription("Enchantement du 1er niveau
Vous tentez de charmer un humanoïde que vous voyez à portée. Il doit effectuer un jet de sauvegarde de Sagesse, avec avantage si vous ou l'un de vos compagnons êtes en plein combat contre lui. Si elle rate le jet de sauvegarde, la créature est charmée par vous jusqu'à la fin du sort ou jusqu'à ce que vous ou l'un de vos compagnons lui nuisiez directement. La créature charmée vous considère comme une relation de confiance. Lorsque le sort prend fin, la créature sait que vous l'avez charmée.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, vous pouvez cibler une créature de plus par niveau d'emplacement au-delà du 1°. Les créatures ainsi ciblées doivent toutes se trouver dans un rayon de 9 m les unes des autres.");
        $charmePersonne->setIncantationTime('1 action');
        $charmePersonne->setAbilityRange('9m');
        $charmePersonne->setComponent('V, S');
        $charmePersonne->setDuration('1 heure');

        $manager->persist($charmePersonne);

        $communicationDistance = new Ability();
        $communicationDistance->setName('Communication à distance');
        $communicationDistance->setQuickDescription('Évocation du 3ème niveau');
        $communicationDistance->setDescription("Évocation du 3ème niveau
Vous envoyez un bref message n'excédant pas vingt-cinq mots à une créature qui vous est familière. L'esprit de la créature perçoit le message, celle-ci vous identifie comme expéditeur si elle vous connaît et peut vous répondre aussitôt dans le même mode. Ce sort permet aux créatures dont la valeur d'Intelligence est d'au moins 1 de comprendre le sens de votre message.
La distance qui vous sépare du destinataire n'a pas d'importance et vous pouvez même atteindre d'autres plans d'existence, mais si la cible se trouve sur un plan différent, il y a 5 % de chance pour que le message n'aboutisse pas.");
        $communicationDistance->setIncantationTime('1 action');
        $communicationDistance->setAbilityRange('illimitée');
        $communicationDistance->setComponent('V, S, M (un bout de fil de cuivre)');
        $communicationDistance->setDuration('1 round');

        $manager->persist($communicationDistance);

        $comprehensionLangues = new Ability();
        $comprehensionLangues->setName('Compréhension des langues');
        $comprehensionLangues->setQuickDescription('Divination du 1er niveau (rituel)');
        $comprehensionLangues->setDescription("Divination du 1er niveau (rituel)
Pour toute la durée, vous comprenez le sens littéral de toute langue parlée que vous entendez. Vous comprenez également tout écrit que vous voyez, à condition de toucher la surface sur laquelle il est rédigé. Il vous faut environ 1 minute pour lire une page.
Ce sort ne décrypte pas les messages secrets ni les glyphes, tels que les symboles arcaniques, s'ils ne correspondent pas à une langue écrite.");
        $comprehensionLangues->setIncantationTime('1 action');
        $comprehensionLangues->setAbilityRange('personnelle');
        $comprehensionLangues->setComponent('V, S, M (une pincée de suie et de sel)');
        $comprehensionLangues->setDuration('1 heure');

        $manager->persist($comprehensionLangues);

        $deblocage = new Ability();
        $deblocage->setName('Déblocage');
        $deblocage->setQuickDescription('Transmutation du 2ème niveau');
        $deblocage->setDescription("Transmutation du 2ème niveau
Choisissez un objet que vous voyez à portée. Il peut s'agir d'une porte, d'une boîte, d'un coffre, de menottes, d'un cadenas ou autre objet muni d'un système de fermeture, magique ou non.
Une cible verrouillée par une serrure ordinaire, barrée ou coincée est aussitôt déverrouillée, débloquée ou décoincée. Si l'objet présente plusieurs verrous, un seul d'entre eux est débloqué.
Si la cible est fermée par verrou magique, celui-ci est réprimé pendant 10 minutes, durant lesquelles vous pouvez ouvrir et fermer normalement l'objet.
L'incantation du sort produit sur l'objet cible un cognement sonore, audible jusqu'à 90 m.");
        $deblocage->setIncantationTime('1 action');
        $deblocage->setAbilityRange('18m');
        $deblocage->setComponent('V');
        $deblocage->setDuration('instantanée');

        $manager->persist($deblocage);

        $deguisement = new Ability();
        $deguisement->setName('Déguisement');
        $deguisement->setQuickDescription('Illusion du 1er niveau');
        $deguisement->setDescription("Illusion du 1er niveau
Vous vous donnez un aspect différent jusqu'à la fin du sort ou jusqu'à ce que vous le révoquiez en y consacrant votre action. Vous pouvez ainsi altérer l'apparence de vos vêtements, de votre armure, de vos armes et autres biens portés. Vous pouvez paraître jusqu'à 30 em plus grand ou plus petit, sembler plus maigre ou plus dodu. Vous ne pouvez pas changer d'anatomie, si bien que la forme choisie doit conserver votre répartition de membres. Pour le reste, les détails de l'illusion vous appartiennent.
Les changements apportés par le sort ne résistent pas à un examen physique. Exemple : si le sort ajoute un chapeau à votre accoutrement, ce couvre-chef n'est pas tangible, si bien que quiconque cherche à le toucher ne sentira sous ses doigts que de l'air, votre crâne ou vos cheveux. Si le sort vous fait paraître plus mince que la réalité, quelqu'un qui tend la main pour vous toucher vous heurtera plus tôt que prévu.
Pour comprendre que vous êtes déguisé, une créature peut consacrer son action à vous examiner et doit réussir un test d'Intelligence (Investigation) assorti de votre DD de sauvegarde des sorts.");
        $deguisement->setIncantationTime('1 action');
        $deguisement->setAbilityRange('personnelle');
        $deguisement->setComponent('V, S');
        $deguisement->setDuration('1 heure');

        $manager->persist($deguisement);

        $delivranceMaledictions = new Ability();
        $delivranceMaledictions->setName('Délivrance des malédictions');
        $delivranceMaledictions->setQuickDescription('Abjuration du 3ème niveau');
        $delivranceMaledictions->setDescription("Abjuration du 3ème niveau
À votre contact, toutes les malédictions qui affectent une créature ou un objet prennent fin. Si la cible est un objet maudit, la malédiction reste en place, mais le sort rompt l'harmonisation du propriétaire avec l'objet, si bien qu'il peut s'en défaire ou s'en débarrasser.");
        $delivranceMaledictions->setIncantationTime('1 action');
        $delivranceMaledictions->setAbilityRange('contact');
        $delivranceMaledictions->setComponent('V, S');
        $delivranceMaledictions->setDuration('instantanée');

        $manager->persist($delivranceMaledictions);

        $detectionMagie = new Ability();
        $detectionMagie->setName('Détection de la magie');
        $detectionMagie->setQuickDescription('Divination du 1er niveau (rituel)');
        $detectionMagie->setDescription('Divination du 1er niveau (rituel)
Pour toute la durée, vous percevez la présence de la magie dans un rayon de 9 m de vous. Si vous percevez de la magie par ce biais, vous pouvez consacrer votre action à discerner une faible aura entourant les objets et créatures visibles et porteurs de magie de la zone. Vous en apprenez également les écoles de magie associées, le cas échéant.
Le sort perce la plupart des obstacles, mais 30 cm de pierre, 90 cm de bois ou de terre, ou 2,5 em de métal (ou une simple feuille dans le cas du plomb) suffisent à le bloquer.');
        $detectionMagie->setIncantationTime('1 action');
        $detectionMagie->setAbilityRange('personnelle');
        $detectionMagie->setComponent('V, S');
        $detectionMagie->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($detectionMagie);

        $dissipationMagie = new Ability();
        $dissipationMagie->setName('Dissipation de la magie');
        $dissipationMagie->setQuickDescription('Abjuration du 3ème niveau');
        $dissipationMagie->setDescription("Abjuration du 3ème niveau
Choisissez une créature, un objet ou un effet magique à portée. Tout sort du 3° niveau ou inférieur qui affecte la cible prend fin. Pour chaque sort du 4° niveau ou supérieur affectant la cible, effectuez un test de caractéristique d'incantation. Le DD est égal à 10 + le niveau du sort. En cas de réussite, le sort prend fin.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° niveau ou supérieur, vous mettez automatiquement un terme aux sorts qui affectent la cible et sont d'un niveau qui ne dépasse pas celui de votre emplacement.");
        $dissipationMagie->setIncantationTime('1 action');
        $dissipationMagie->setAbilityRange('36m');
        $dissipationMagie->setComponent('V, S');
        $dissipationMagie->setDuration('instantanée');

        $manager->persist($dissipationMagie);

        $eclair = new Ability();
        $eclair->setName('Éclair');
        $eclair->setQuickDescription('Évocation du 3ème niveau');
        $eclair->setDescription("Évocation du 3ème niveau
Un éclair foudroyant jaillit de vous sous la forme d'une ligne de 30 m de long et 1,50 m de large, dans la direction de votre choix. Chaque créature prise dans la ligne doit effectuer un jet de sauvegarde de Dextérité. Elle subit 8d6 dégâts de foudre en cas d'échec, la moitié en cas de réussite.
La foudre embrase les objets inflammables de la zone qui ne sont portés par personne.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° niveau ou supérieur, les dégâts augmentent de 1d6 par niveau d'emplacement au-delà du 3°.");
        $eclair->setIncantationTime('1 action');
        $eclair->setAbilityRange('personnelle (ligne de 30m)');
        $eclair->setComponent("V, S, M (un peu de fourrure et une tige d'ambre, de cristal ou de verre)");
        $eclair->setDuration('instantanée');

        $manager->persist($eclair);

        $espritGardiens = new Ability();
        $espritGardiens->setName('Esprits gardiens');
        $espritGardiens->setQuickDescription('Invocation du 3ème niveau');
        $espritGardiens->setDescription("Invocation du 3ème niveau
Vous invoquez la protection d'esprits qui viennent voleter dans un rayon de 4,50 m de vous pour toute la durée. Si vous êtes bon ou neutre, ces formes spectrales paraissent angéliques ou féeriques (à votre convenance). Si vous êtes mauvais, elles paraissent démoniaques ou diaboliques.
À l'incantation, vous désignez autant de créatures que vous le souhaitez parmi celles que vous voyez ; elles ne seront pas sujettes aux esprits. Toutes les autres créatures voient leur vitesse réduite de moitié dans la zone ; de plus, lorsqu'une telle créature entre dans la zone d'effet pour la première fois d'un tour ou y commence son propre tour, elle doit effectuer un jet de sauvegarde de Sagesse. En cas d'échec, elle subit 3d8 dégâts radiants (si vous êtes bon ou neutre) ou 3d8 dégâts nécrotiques (si vous êtes mauvais). En cas de réussite, la créature subit la moitié de ces dégâts.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° niveau ou supérieur, les dégâts augmentent de 1d8 par niveau d'emplacement au-delà du 3°.");
        $espritGardiens->setIncantationTime('1 action');
        $espritGardiens->setAbilityRange('personnelle (ligne de 4,50m)');
        $espritGardiens->setComponent('V, S, M (un symbole sacré)');
        $espritGardiens->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($espritGardiens);

        $faveurDivine = new Ability();
        $faveurDivine->setName('Faveur divine');
        $faveurDivine->setQuickDescription('Évocation du 1er niveau');
        $faveurDivine->setDescription("Évocation du 1er niveau
Vos prières vous nimbent de radiance divine. Jusqu'à la fin du sort, vos attaques d'arme infligent 1d4 radiants supplémentaires quand elles touchent.");
        $faveurDivine->setIncantationTime('1 action bonus');
        $faveurDivine->setAbilityRange('personnelle');
        $faveurDivine->setComponent('V, S');
        $faveurDivine->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($faveurDivine);

        $feuilleMorte = new Ability();
        $feuilleMorte->setName('Feuille morte');
        $feuilleMorte->setQuickDescription('Transmutation du 1er niveau');
        $feuilleMorte->setDescription("Transmutation du 1er niveau
Choisissez jusqu'à cinq créatures qui chutent à portée. La vitesse de chute de chacune passe à 18 m par round jusqu'à la fin du sort. Si la créature atterrit avant la fin du sort, elle ne subit aucun dégât de chute et termine sur ses pieds, et le sort prend fin en ce qui la concerne.");
        $feuilleMorte->setIncantationTime('1 réaction, que vous jouez quand vous
        ou une créature dans un rayon de 18 m chutez');
        $feuilleMorte->setAbilityRange('18m');
        $feuilleMorte->setComponent('V, M (une petite plume ou un peu de duvet)');
        $feuilleMorte->setDuration('1 minute');

        $manager->persist($feuilleMorte);

        $flammeSacree = new Ability();
        $flammeSacree->setName('Flamme sacrée');
        $flammeSacree->setQuickDescription("Sort mineur d'évocation");
        $flammeSacree->setDescription("Sort mineur d'évocation
Une radiance embrasée s'abat sur une créature que vous voyez à portée. La cible doit réussir un jet de sauvegarde de Dextérité sous peine de subir 1d8 dégâts radiants. Les abris ne confèrent aucun avantage dans le cadre de ce jet de sauvegarde.
Les dégâts du sort augmentent de 1d8 lorsque vous atteignez le niveau 5 (2d8), le niveau 11 (3d8) et le niveau 17 (4d8).");
        $flammeSacree->setIncantationTime('1 action');
        $flammeSacree->setAbilityRange('18m');
        $flammeSacree->setComponent('V, S');
        $flammeSacree->setDuration('instantanée');

        $manager->persist($flammeSacree);

        $manager->flush();

        $flou = new Ability();
        $flou->setName('Flou');
        $flou->setQuickDescription('Illusion du 2ème niveau');
        $flou->setDescription("Illusion du 2ème niveau
Votre corps devient flou, indistinct et vacillant pour tous ceux qui vous voient. Pour toute la durée, toutes les créatures sont désavantagées aux jets d'attaque contre vous. Un assaillant est immunisé contre cet effet s'il se passe du sens de la vue (s'il est doté de vision aveugle, par exemple) ou s'il perce automatiquement les illusions (ce que permet vision parfaite).");
        $flou->setIncantationTime('1 action');
        $flou->setAbilityRange('personnelle');
        $flou->setComponent('V');
        $flou->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($flou);

        $fouleeBrumeuse = new Ability();
        $fouleeBrumeuse->setName('Foulée brumeuse');
        $fouleeBrumeuse->setQuickDescription('Invocation du 2ème niveau');
        $fouleeBrumeuse->setDescription("Invocation du 2ème niveau
Brièvement enveloppé d'une brume argentée, vous vous téléportez d'un maximum de 9 m vers un espace inoccupé que vous voyez.");
        $fouleeBrumeuse->setIncantationTime('1 action bonus');
        $fouleeBrumeuse->setAbilityRange('personnelle');
        $fouleeBrumeuse->setComponent('V');
        $fouleeBrumeuse->setDuration('instantanée');

        $manager->persist($fouleeBrumeuse);

        $fracassement = new Ability();
        $fracassement->setName('Fracassement');
        $fracassement->setQuickDescription('Évocation du 2ème niveau');
        $fracassement->setDescription("Évocation du 2ème niveau
Un vacarme aussi soudain que pénible se produit en un point que vous choisissez à portée. Chaque créature prise dans une sphère de 3 m de rayon centrée sur ce point doit effectuer un jet de sauvegarde de Constitution. Elle subit 3d8 dégâts de tonnerre en cas d'échec, la moitié en cas de réussite. Une créature faite de matière non organique (pierre, cristal, métal ou autre) est désavantagée à ce JS.
Un objet non magique qui n'est porté par personne subit aussi les dégâts s'il est dans la zone d'effet du sort.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 3° niveau ou supérieur, les dégâts augmentent de 1d8 par niveau d'emplacement au-delà du 2°.");
        $fracassement->setIncantationTime('1 action');
        $fracassement->setAbilityRange('18m');
        $fracassement->setComponent('V, S, M (un fragment de mica)');
        $fracassement->setDuration('instantanée');

        $manager->persist($fracassement);

        $grandeFoulee = new Ability();
        $grandeFoulee->setName('Grande foulée');
        $grandeFoulee->setQuickDescription('Transmutation du 1er niveau');
        $grandeFoulee->setDescription("Transmutation du 1er niveau
Vous touchez une créature. La vitesse de la cible augmente de 3 m jusqu'à la fin du sort.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, vous pouvez cibler une créature de plus par niveau d'emplacement au-delà du 1%.");
        $grandeFoulee->setIncantationTime('1 action');
        $grandeFoulee->setAbilityRange('contact');
        $grandeFoulee->setComponent('V, S, M (une pincée de terre)');
        $grandeFoulee->setDuration('1 heure');

        $manager->persist($grandeFoulee);

        $hate = new Ability();
        $hate->setName('Hâte');
        $hate->setQuickDescription('Transmutation du 3ème niveau');
        $hate->setDescription("Transmutation du 3ème niveau
Choisissez une créature consentante que vous voyez à portée. Jusqu'à la fin du sort, la cible voit sa vitesse doubler, sa CA reçoit un bonus de +2, elle est avantagée aux jets de sauvegarde de Dextérité et bénéficie d'une action supplémentaire à chacun de ses tours. Cette action ne peut servir qu'à entreprendre l'action Attaquer (une seule attaque d'arme), Foncer, Se cacher, Se désengager ou Utiliser un objet.
Lorsque le sort prend fin, jusqu'à la fin de son tour suivant, la cible en proie à une vague de léthargie ne peut se déplacer ni entreprendre d'action.");
        $hate->setIncantationTime('1 action');
        $hate->setAbilityRange('9m');
        $hate->setComponent('V, S, M (un copeau de racine de réglisse)');
        $hate->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($hate);

        $identification = new Ability();
        $identification->setName('Identification');
        $identification->setQuickDescription('Divination du 1er niveau (rituel)');
        $identification->setDescription("Divination du 1er niveau (rituel)
Vous choisissez un objet au contact duquel vous devez rester pendant toute l'incantation. S'il s'agit d'un objet magique ou imprégné de magie, vous en apprenez les propriétés et savez les utiliser ; vous savez également si l'harmonisation est requise et de combien de charges l'objet dispose, le cas échéant. Vous apprenez aussi quels sorts éventuels affectent l'objet. Si l'objet a été créé par un sort, vous apprenez lequel.
Si au lieu d'un objet, vous touchez une créature pendant toute l'incantation, vous apprenez quels sorts éventuels l'affectent.");
        $identification->setIncantationTime('1 minute');
        $identification->setAbilityRange('contact');
        $identification->setComponent("V, S, M (une perle d'une valeur mimimale de 100 po et une plume de hibou)");
        $identification->setDuration('instantanée');

        $manager->persist($identification);

        $illusionMineur = new Ability();
        $illusionMineur->setName('Illusion mineure');
        $illusionMineur->setQuickDescription("Sort mineur d'illusion");
        $illusionMineur->setDescription("Sort mineur d'illusion
Vous créez à portée un son ou l'image d'un objet qui persiste pour toute la durée. Cette illusion prend également fin si vous la révoquez au prix d'une action ou relancez ce sort.
Si vous créez un son, son volume peut aller du murmure au cri. Il peut prendre votre voix, celle de quelqu'un d'autre, imiter le rugissement du lion, un tambour qui bat ou une autre forme de votre choix. Le son se prolonge sans discontinuer pour toute la durée, à moins que vous préfériez ne le faire intervenir quede temps à autre jusqu'à la fin du sort.
Si vous créez l'image d'un objet, comme une chaise, des empreintes boueuses ou un petit coffre, sa taille ne doit pas dépasser celle d'un cube de 1,50 m d'arête. L'image ne peut créer nison, ni lumière, ni odeur, ni autre effet sensoriel. Toute interaction physique avec l'image percera l'illusion, car elle n'est pas tangible.
Une créature qui consacre son action à examiner le son ou l'image peut comprendre qu'il s'agit d'une illusion en réussissant un test d'Intelligence (Investigation) assorti de votre DD de sauvegarde des sorts. Une créature qui perce l'illusion continue de la percevoir, quoique amoindrie.");
        $illusionMineur->setIncantationTime('1 action');
        $illusionMineur->setAbilityRange('9m');
        $illusionMineur->setComponent('S, M (un peu de laine brute)');
        $illusionMineur->setDuration('1 minute');

        $manager->persist($illusionMineur);

        $imageMajeure = new Ability();
        $imageMajeure->setName('Image majeure');
        $imageMajeure->setQuickDescription('Illusion du 3ème niveau');
        $imageMajeure->setDescription("Illusion du 3ème niveau
Vous créez l'image d'un objet, d'une créature ou autre phénomène visible dont la taille ne dépasse pas celle d'un cube de 6 m d'arête. L'image apparaît en un endroit que vous voyez à portée et persiste pour toute la durée. Elle semble parfaitement réelle, avec les sons, les odeurs et la température attendus. Vous ne pouvez pas créer de températures capables d'infliger des dégâts ou de bruits si forts qu'ils infligent des dégâts de tonnerre ou peuvent assourdir, pas plus qu'une odeur à donner la nausée (comme la puanteur des troglodytes).
Tant que vous restez à portée de l'illusion, vous pouvez consacrer votre action à déplacer l'image vers un autre point à portée du sort. Lors de ce déplacement, vous pouvez modifier l'aspect de l'image pour que ses mouvements paraissent naturels. Exemple : si vous créez l'image d'une créature que vous faites déplacer, vous pouvez faire en sorte qu'elle donne l'impression de marcher. De même, vous pouvez lui faire produire des sons à votre guise et même la faire participer à une conversation.
Toute interaction physique avec l'image percera l'illusion, car elle n'est pas tangible. Une créature qui consacre son action à examiner l'image peut comprendre qu'il s'agit d'une illusion en réussissant un test d'Intelligence (Investigation) assorti de votre DD de sauvegarde des sorts. Une créature qui perce l'illusion voit au travers et ne perçoit que de manière amoindrie les propriétés sensorielles produites par l'image.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 6° niveau ou supérieur, le sort persiste jusqu'à dissipation, sans requérir votre concentration.");
        $imageMajeure->setIncantationTime('1 action');
        $imageMajeure->setAbilityRange('36m');
        $imageMajeure->setComponent('V, S, M (un peu de laine brute)');
        $imageMajeure->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($imageMajeure);

        $imageSilencieuse = new Ability();
        $imageSilencieuse->setName('Image silencieuse');
        $imageSilencieuse->setQuickDescription('Illusion du 1er niveau');
        $imageSilencieuse->setDescription("Illusion du 1er niveau
Vous créez l'image d'un objet, d'une créature ou autre phénomène visible dont la taille ne dépasse pas celle d'un cube de 4,50 m d'arête. L'image apparaît en un endroit à portée et persiste pour toute la durée. Elle est purement visuelle, dépourvue de son, odeur ou tout autre effet sensoriel.
Vous pouvez consacrer votre action à déplacer l'image vers un autre endroit à portée. Lors de ce déplacement, vous pouvez modifier l'aspect de l'image pour que ses mouvements paraissent naturels. Exemple : si vous créez l'image d'une créature que vous faites déplacer, vous pouvez faire en sorte qu'elle donne l'impression de marcher.
Toute interaction physique avec l'image percera l'illusion, car elle n'est pas tangible. Une créature qui consacre son action à examiner l'image peut comprendre qu'il s'agit d'une illusion en réussissant un test d'Intelligence (Investigation) assorti de votre DD de sauvegarde des sorts. Une créature qui perce l'illusion voit à travers l'image.");
        $imageSilencieuse->setIncantationTime('1 action');
        $imageSilencieuse->setAbilityRange('18m');
        $imageSilencieuse->setComponent('V, S, M (un peu de laine brute)');
        $imageSilencieuse->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($imageSilencieuse);

        $immobilisationPersonne = new Ability();
        $immobilisationPersonne->setName('Immobilisation de personne');
        $immobilisationPersonne->setQuickDescription('Enchantement du 2ème niveau');
        $immobilisationPersonne->setDescription("Enchantement du 2ème niveau
Choisissez un humanoïde que vous voyez à portée. La cible doit réussir un jet de sauvegarde de Sagesse sous peine d'être paralysée pour toute la durée. À la fin de chacun de ses tours, la cible peut réitérer le jet de sauvegarde de Sagesse. En cas de réussite, le sort prend fin sur elle.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 3° niveau ou supérieur, vous pouvez cibler un humanoïde de plus par niveau d'emplacement au-delà du 2°. Les humanoïdes ainsi ciblés doivent tous se trouver dans un rayon de 9 m les uns des autres.");
        $immobilisationPersonne->setIncantationTime('1 action');
        $immobilisationPersonne->setAbilityRange('18m');
        $immobilisationPersonne->setComponent('V, S, M (un brin de fer)');
        $immobilisationPersonne->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($immobilisationPersonne);

        $injonction = new Ability();
        $injonction->setName('Injonction');
        $injonction->setQuickDescription('Enchantement du 1er niveau');
        $injonction->setDescription("Enchantement du 1er niveau
Vous adressez un simple mot de commande à une créature que vous voyez à portée. La cible doit réussir un jet de sauvegarde de Sagesse sous peine de devoir s'y soumettre à son tour suivant. Le sort est sans effet sur un mort-vivant et sur toute créature ne comprenant pas votre langue, ainsi que si votre ordre est directement nuisible à la créature.
Ci-après, une liste de mots de commande classiques, avec leurs effets associés, mais vous n'êtes pas limité à ces suggestions. Le MD déterminera comment réagit la cible, si vous en inventez d'autres. Si la cible ne peut se soumettre à votre ordre, le sort prend fin.
Approche. La cible se déplace dans votre direction par le chemin le plus court et direct, et termine son tour si elle se retrouve dans un rayon de 1,50 m de vous.
Fuis. La cible consacre son tour à s'éloigner de vous par le moyen le plus rapide.
Halte. La cible ne se déplace pas et n'entreprend aucune action. Une créature volante peut rester dans les airs à condition d'en avoir la capacité. Si elle doit se déplacer pour ne pas tomber, elle parcourt la distance minimale pour ce faire.
Lâche. La cible lâche ce qu'elle tient et termine son tour.
Rampe. La cible tombe à terre et termine son tour.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, vous pouvez cibler une créature de plus par niveau d'emplacement au-delà du 1°. Les créatures ainsi ciblées doivent toutes se trouver dans un rayon de 9 m les unes des autres.");
        $injonction->setIncantationTime('1 action');
        $injonction->setAbilityRange('18m');
        $injonction->setComponent('V');
        $injonction->setDuration('1 round');

        $manager->persist($injonction);

        $invisibilite = new Ability();
        $invisibilite->setName('Invisibilité');
        $invisibilite->setQuickDescription('Illusion du 2ème niveau');
        $invisibilite->setDescription("Illusion du 2ème niveau
Une créature que vous touchez devient invisible jusqu'à la fin du sort. Tout ce que la cible porte est également invisible tant qu'elle continue à le porter. Le sort prend fin pour une cible qui attaque ou lance un sort.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 3° niveau ou supérieur, vous pouvez cibler une créature de plus par niveau d'emplacement au-delà du 2°.");
        $invisibilite->setIncantationTime('1 action');
        $invisibilite->setAbilityRange('contact');
        $invisibilite->setComponent('V, S, M (un cil incrusté dans de la sève)');
        $invisibilite->setDuration("concentration, jusqu'à 1 heure");

        $manager->persist($invisibilite);

        $levitation = new Ability();
        $levitation->setName('Lévitation');
        $levitation->setQuickDescription('Transmutation du 2ème niveau');
        $levitation->setDescription("Transmutation du 2ème niveau
Une créature ou un objet de votre choix que vous voyez à portée monte verticalement jusqu'à un maximum de 6 met et y reste, en suspension, pour toute la durée. Le sort peut faire léviter une cible dont le poids n'excède pas 250 kg. Une créature non consentante qui réussit un jet de sauvegarde de Constitution n'est pas affectée.
La cible ne peut se déplacer qu'en prenant appui sur des objets et surfaces fixes à portée (murs, plafonds, etc.), comme si elle escaladait. À votre tour, vous pouvez modifier l'altitude de la cible d'un maximum de 6 m vers le haut ou vers le bas. Si vous êtes la cible, vous pouvez vous déplacer ainsi dans le cadre de votre déplacement. Sans cela, vous devez consacrer votre action à déplacer la cible, qui doit rester à portée du sort. Lorsque le sort prend fin, la cible redescend en flottant vers le sol si elle est toujours dans les airs.");
        $levitation->setIncantationTime('1 action');
        $levitation->setAbilityRange('18m');
        $levitation->setComponent('V, S, M (une boucle de cuir ou un fil doré en forme de coupe avec une longue anse)');
        $levitation->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($levitation);

        $lienProtection = new Ability();
        $lienProtection->setName('Lien de protection');
        $lienProtection->setQuickDescription('Abjuration du 2ème niveau');
        $lienProtection->setDescription("Abjuration du 2ème niveau
Ce sort protège une créature consentante que vous touchez et crée un lien magique entre elle et vous jusqu'à la fin du sort. Tant que la cible se trouve dans un rayon de 18 m de vous, elle reçoit un bonus de +1 à la CA et aux jets de sauvegarde, et elle est résistante à tous les dégâts. Par ailleurs, chaque fois qu'elle subit des dégâts, vous en subissez autant.
Le sort prend fin si vous tombez à 0 point de vie ou si la cible et vous vous retrouvez distants de plus de 18 m. Il prend également fin s'il est relancé sur l'une des deux créatures ainsi liées. Vous pouvez révoquer le sort au prix d'une action.");
        $lienProtection->setIncantationTime('1 action');
        $lienProtection->setAbilityRange('contact');
        $lienProtection->setComponent("V, S, M (deux bagues de platine d'une valeur de 50 po chacune, que la cible et vous devez portez pour toute la durée)");
        $lienProtection->setDuration('1 heure');

        $manager->persist($lienProtection);

        $lueurEspoir = new Ability();
        $lueurEspoir->setName("Lueur d'espoir");
        $lueurEspoir->setQuickDescription('Abjuration du 3ème niveau');
        $lueurEspoir->setDescription("Abjuration du 3ème niveau
Ce sort est pofteur d'espoir et de vitalité. Choisissez autant de créatures que vous le souhaitez à portée. Pour toute la durée, chaque cible est avantagée aux jets de sauvegarde de Sagesse et contre la mort, et récupère le maximum possible de points de vie chaque fois qu'on la soigne.");
        $lueurEspoir->setIncantationTime('1 action');
        $lueurEspoir->setAbilityRange('9m');
        $lueurEspoir->setComponent('V, S');
        $lueurEspoir->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($lueurEspoir);

        $lueursFeeriques = new Ability();
        $lueursFeeriques->setName('Lueurs féeriques');
        $lueursFeeriques->setQuickDescription('Évocation du 1er niveau');
        $lueursFeeriques->setDescription("Évocation du 1er niveau
Le contour de tous les objets compris dans un cube de 6 m d'arête à portée luit de bleu, de vert ou de violet, à votre convenance. Toute réature prise dans la zone à l'incantation du sort est aussi nimbée de lueur si elle rate un jet de sauvegarde de Dextérité. Pour toute la durée, les objets et les créatures affectées produisent une lueur faible dans un rayon de 3 m.
Tout jet d'attaque contre les créatures affectées et les objets de la zone est avantagé si l'assaillant voit sa cible. En outre les créatures et objets affectés ne peuvent profiter de l'état invisible.");
        $lueursFeeriques->setIncantationTime('1 action');
        $lueursFeeriques->setAbilityRange('18m');
        $lueursFeeriques->setComponent('V');
        $lueursFeeriques->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($lueursFeeriques);

        $lumiere = new Ability();
        $lumiere->setName('Lumière');
        $lumiere->setQuickDescription("Sort mineur d'évocation");
        $lumiere->setDescription("Sort mineur d'évocation
Vous touchez un objet dont aucune dimension ne dépasse 3 m. Jusqu'à la fin du sort, l'objet produit une lumière vive sur un rayon de 6 m et une lumière faible sur 6 m de plus. La lumière peut présenter les teintes de votre choix. Recouvrir intégralement l'objet d'une surface opaque bloque la lumière. Le sort prend fin si vous le relancez ou le révoquez au prix d'une action.
Si vous ciblez un objet porté par une créature hostile, celle-ci doit réussir un jet de sauvegarde de Dextérité pour éviter le sort.");
        $lumiere->setIncantationTime('1 action');
        $lumiere->setAbilityRange('contact');
        $lumiere->setComponent('V, M (une luciole ou de la mousse phosphorescente)');
        $lumiere->setDuration('1 heure');

        $manager->persist($lumiere);

        $lumieresDanstes = new Ability();
        $lumieresDanstes->setName('Lumières dansantes');
        $lumieresDanstes->setQuickDescription("Sort mineur d'évocation");
        $lumieresDanstes->setDescription("Sort mineur d'évocation
Vous créez jusqu'à quatre lumières de taille de torches, à portée ; pour toute la durée, elles ont l'aspect de torches, de lanternes ou de globes luisants qui flottent dans les airs. Vous pouvez également fusionner les quatre lueurs pour former une silhouette vaguement humanoïde de taille M. Quelle que soit la forme choisie, chaque lueur émet une lumière faible dans un rayon de 3 m.
Par une action bonus à votre tour, vous pouvez déplacer les lueurs d'un maximum de 18 m vers un nouvel endroit à portée. Chaque lueur du sort, à sa création, doit se situer dans un rayon de 6 m d'une autre, et s'évanouit si jamais elle quitte la portée du sort.");
        $lumieresDanstes->setIncantationTime('1 action');
        $lumieresDanstes->setAbilityRange('36m');
        $lumieresDanstes->setComponent("V, S, M (un peu de phosphore ou d'orme blanc ou un ver luisant)");
        $lumieresDanstes->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($lumieresDanstes);

        $mainMage = new Ability();
        $mainMage->setName('Main du mage');
        $mainMage->setQuickDescription("Sort mineur d'invocation");
        $mainMage->setDescription("Sort mineur d'invocation
Une main spectrale et flottante apparaît en un point que vous choisissez à portée. La main persiste pour toute la durée ou jusqu'à ce que vous la révoquiez au prix d'une action. Elle disparaît si jamais elle se retrouve à plus de 9 m de vous ou si vous relancez ce sort.
Vous pouvez consacrer votre action à contrôler la main. Celle-ci peut servir à manipuler un objet, à ouvrir une porte ou un conteneur verrouillés, à ranger ou récupérer un objet dans un conteneur ouvert ou à déverser le contenu d'une fiole. Vous pouvez déplacer la main d'un maximum de 9 m chaque fois que vous l'utilisez.
La main ne peut ni attaquer, ni utiliser d'objet magique, ni porter plus de 5 kg.");
        $mainMage->setIncantationTime('1 action');
        $mainMage->setAbilityRange('9m');
        $mainMage->setComponent('V, S');
        $mainMage->setDuration('1 minute');

        $manager->persist($mainMage);

        $mainsBrulantes = new Ability();
        $mainsBrulantes->setName('Mains brûlantes');
        $mainsBrulantes->setQuickDescription('Évocation du 1er niveau');
        $mainsBrulantes->setDescription("Évocation du 1er niveau
Alors que vous tendez les mains, pouces en contact et doigts écartés, une fine nappe de flammes jaillit du bout de vos ongles. Chaque créature prise dans un cône de 4,50 m doit effectuer un jet de sauvegarde de Dextérité. Une créature subit 3d6 dégâts de feu en cas d'échec, la moitié en cas de réussite.
Les flammes embrasent tous les objets inflammables de la zone qui ne sont pas portés.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, les dégâts augmentent de 1d6 par niveau d'emplacement au-delà du 1°.");
        $mainsBrulantes->setIncantationTime('1 action');
        $mainsBrulantes->setAbilityRange('personnelle (cône de 4,50 m)');
        $mainsBrulantes->setComponent('V, S');
        $mainsBrulantes->setDuration('instantanée');

        $manager->persist($mainsBrulantes);

        $moquerieCruelle = new Ability();
        $moquerieCruelle->setName('Moquerie cruelle');
        $moquerieCruelle->setQuickDescription("Sort mineur d'enchantement");
        $moquerieCruelle->setDescription("Sort mineur d'enchantement
Vous adressez un chapelet d'insultes assaisonnées de subtils enchantements à une créature que vous voyez à portée. Si la cible vous entend (même sans vous comprendre), elle doit réussir un jet de sauvegarde de Sagesse sous peine de subir 1d4 dégâts psychiques et d'être désavantagée au prochain jet d'attaque qu'elle effectue avant la fin de son tour suivant.
Les dégâts du sort augmentent de 1d4 lorsque vous atteignez le niveau 5 (2d4), le niveau 11 (344) et le niveau 17 (4d4).");
        $moquerieCruelle->setIncantationTime('1 action');
        $moquerieCruelle->setAbilityRange('18m');
        $moquerieCruelle->setComponent('V');
        $moquerieCruelle->setDuration('instantanée');

        $manager->persist($moquerieCruelle);

        $motGuerison = new Ability();
        $motGuerison->setName('Mot de guérison');
        $motGuerison->setQuickDescription('Évocation du 1er niveau');
        $motGuerison->setDescription("Évocation du 1er niveau
Une créature de votre choix que vous voyez à portée récupère autant de points de vie que 1d4 + votre modificateur de caractéristique d'incantation. Ce sort est sans effet sur les morts-vivants et les créatures artificielles.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2ème niveau ou supérieur, il soigne 1d4 supplémentaires par niveau d'emplacement au-delà du 1er.");
        $motGuerison->setIncantationTime('1 action bonus');
        $motGuerison->setAbilityRange('18m');
        $motGuerison->setComponent('V');
        $motGuerison->setDuration('instantanée');

        $manager->persist($motGuerison);

        $motGuerisonGroupe = new Ability();
        $motGuerisonGroupe->setName('Mot de guérison de groupe');
        $motGuerisonGroupe->setQuickDescription('Évocation du 3ème niveau');
        $motGuerisonGroupe->setDescription("Évocation du 3ème niveau
Alors que vous proférez des paroles de regain, jusqu'à six créatures de votre choix que vous voyez à portée récupèrent autant de points de vie que 1d4 + votre modificateur de caractéristique d'incantation. Ce sort est sans effet sur les morts-vivants et les créatures artificielles.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° niveau ou supérieur, il soigne 1d4 par niveau d'emplacement au-delà du 3°.");
        $motGuerisonGroupe->setIncantationTime('1 action bonus');
        $motGuerisonGroupe->setAbilityRange('18m');
        $motGuerisonGroupe->setComponent('V');
        $motGuerisonGroupe->setDuration('instantanée');

        $manager->persist($motGuerisonGroupe);

        $pattesAraignée = new Ability();
        $pattesAraignée->setName("Pattes d'araignée");
        $pattesAraignée->setQuickDescription('Transmutation du 2ème niveau');
        $pattesAraignée->setDescription("Transmutation du 2ème niveau
Jusqu'à la fin du sort, une créature consentante que vous touchez reçoit la capacité de se déplacer dans toutes les directions le long des surfaces verticales, ainsi que sur les plafonds (la tête en bas), tout en gardant les mains libres. La cible acquiert en outre une vitesse d'escalade égale à sa vitesse au sol.");
        $pattesAraignée->setIncantationTime('1 action');
        $pattesAraignée->setAbilityRange('contact');
        $pattesAraignée->setComponent('V, S, M (une goutte de bitume et une araignée)');
        $pattesAraignée->setDuration("concentration, jusqu'à 1 heure");

        $manager->persist($pattesAraignée);

        $poigneElectrique = new Ability();
        $poigneElectrique->setName('Poigne électrique');
        $poigneElectrique->setQuickDescription("Sort mineur d'évocation");
        $poigneElectrique->setDescription("Sort mineur d'évocation
Votre main se met à crépiter d'énergies qu'elle s'apprête à décharger sur la créature que vous tentez de toucher. Effectuez une attaque de sort au corps à corps contre la cible. Vous êtes avantagé au jet d'attaque si la cible porte une armure en métal. Si l'attaque touche, la cible subit 1d8 dégâts de foudre et ne peut pas jouer de réaction jusqu'au début de son tour suivant.
Les dégâts du sort augmentent de 1d8 lorsque vous atteignez le niveau 5 (2d8), le niveau 11 (3d8) et le niveau 17 (4d8).");
        $poigneElectrique->setIncantationTime('1 action');
        $poigneElectrique->setAbilityRange('contact');
        $poigneElectrique->setComponent('V, S');
        $poigneElectrique->setDuration('instantanée');

        $manager->persist($poigneElectrique);

        $prestidigitation = new Ability();
        $prestidigitation->setName('Prestidigitation');
        $prestidigitation->setQuickDescription('Sort mineur de transmutation');
        $prestidigitation->setDescription("Sort mineur de transmutation
Ce tour de passe-passe sert d'entraînement aux lanceurs de sorts débutants. Vous créez l'un des effets magiques suivants à portée :
. Vous produisez un effet sensoriel instantané et inoffensif, comme une pluie d'étincelles, une petite rafale, quelques notes de musique ou une odeur étrange.
. Vous allumez ou éteignez une bougie, une torche ou un petit feu de camp, en un instant.
. Vous nettoyez ou souillez en un instant un objet dont le volume ne dépasse pas 30 litres (ou 0,03 m°).
. Vous refroidissez, réchauffez ou parfumez de la matière inerte pendant 1 heure, à condition que son volume ne dépasse pas 30 litres (ou 0,03 m°).
. Vous faites apparaître pendant 1 heure, sur un objet ou une surface, une couleur, une petite marque ou un symbole.
. Vous faites apparaître jusqu'à la fin de votre tour suivant une babiole non magique ou une image illusoire tenant dans votre main.
Si vous lancez ce sort plusieurs fois, vous pouvez faire coexister jusqu'à trois de ces effets non instantanés, sachant que vous pouvez révoquer un tel effet au prix d'une action.");
        $prestidigitation->setIncantationTime('1 action');
        $prestidigitation->setAbilityRange('3m');
        $prestidigitation->setComponent('V, S');
        $prestidigitation->setDuration("jusqu'à 1 heure");

        $manager->persist($prestidigitation);

        $projectileMagique = new Ability();
        $projectileMagique->setName('Projectile magique');
        $projectileMagique->setQuickDescription('Évocation du 1er niveau');
        $projectileMagique->setDescription("Évocation du 1er niveau
Vous créez trois traits de force magique et scintillante. Chaque projectile touche une créature de votre choix que vous voyez à portée et lui inflige 1d4 + 1 dégâts de force. Les traits frappent tous simultanément, sachant que vous pouvez viser une seule créature ou plusieurs.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, le sort crée un projectile supplémentaire par niveau d'emplacement au-delà du 1%.");
        $projectileMagique->setIncantationTime('1 action');
        $projectileMagique->setAbilityRange('36m');
        $projectileMagique->setComponent('V, S');
        $projectileMagique->setDuration('instantannée');

        $manager->persist($projectileMagique);

        $rayonGivre = new Ability();
        $rayonGivre->setName('Rayon de givre');
        $rayonGivre->setQuickDescription("Sort mineur d'évocation");
        $rayonGivre->setDescription("Sort mineur d'évocation
Un rayon de lueur zébrée bleuâtre et glaciale file vers une créature à portée. Effectuez une attaque de sort à distance contre la cible. Si l'attaque touche, la cible subit 1d8 dégâts de froid et sa vitesse est réduite de 3 m jusqu'au début de votre tour suivant.
Les dégâts du sort augmentent de 1d8 lorsque vous atteignez le niveau 5 (2d8), le niveau 11 (348) et le niveau 17 (4d8).");
        $rayonGivre->setIncantationTime('1 action');
        $rayonGivre->setAbilityRange('18m');
        $rayonGivre->setComponent('V, S');
        $rayonGivre->setDuration('instantannée');

        $manager->persist($rayonGivre);

        $rayonTracant = new Ability();
        $rayonTracant->setName('Rayon traçant');
        $rayonTracant->setQuickDescription('Évocation du 1er niveau');
        $rayonTracant->setDescription("Évocation du 1er niveau
Un trait de lumière jaillit vers une créature de votre choix à portée. Effectuez une attaque de sort à distance contre la cible. Si l'attaque touche, la cible subit 4d6 dégâts radiants et le prochain jet d'attaque qui la vise avant la fin de votre tour suivant est avantagé, grâce à la lumière faible et scintillante qui émane d'elle.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, les dégâts augmentent de 1d6 par niveau d'emplacement au-delà du 1°.");
        $rayonTracant->setIncantationTime('1 action');
        $rayonTracant->setAbilityRange('36m');
        $rayonTracant->setComponent('V, S');
        $rayonTracant->setDuration('1 round');

        $manager->persist($rayonTracant);

        $reparation = new Ability();
        $reparation->setName('Réparation');
        $reparation->setQuickDescription('Sort mineur de transmutation');
        $reparation->setDescription("Sort mineur de transmutation
Ce sort répare une dégradation (déchirure ou bris) sur l'objet que vous touchez, comme un maillon de chaîne brisé, une clef en deux morceaux, une cape déchirée ou une outre percée. Tant que la dégradation ne dépasse pas 30 cm dans quelque dimension que ce soit, vous la réparez et il n'en reste nulle trace.
Ce sort peut réparer la structure physique d'un objet magique ou d'une créature artificielle, mais il ne rendra pas sa magie à un tel objet.");
        $reparation->setIncantationTime('1 minute');
        $reparation->setAbilityRange('contact');
        $reparation->setComponent('V, S, M (deux magnétites)');
        $reparation->setDuration('instantanée');

        $manager->persist($reparation);

        $resistance = new Ability();
        $resistance->setName('Résistance');
        $resistance->setQuickDescription("Sort mineur d'abjuration");
        $resistance->setDescription("Sort mineur d'abjuration
Vous touchez une créature consentante. Une fois avant la fin du sort, la cible peut lancer un d4 et en ajouter le résultat au jet de sauvegarde de son choix. Elle peut lancer ce dé avant ou après avoir effectué le jet de sauvegarde. Le sort prend alors fin.");
        $resistance->setIncantationTime('1 action');
        $resistance->setAbilityRange('contact');
        $resistance->setComponent('V, S, M (une cape miniature)');
        $resistance->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($resistance);

        $restaurationPartielle = new Ability();
        $restaurationPartielle->setName('Restauration partielle');
        $restaurationPartielle->setQuickDescription('Abjuration du 2ème niveau');
        $restaurationPartielle->setDescription("Abjuration du 2ème niveau
Vous touchez une créature et mettez un terme à une maladie ou un état qui l'affecte. L'état peut être assourdi, aveuglé, empoisonné ou paralysé.");
        $restaurationPartielle->setIncantationTime('1 action');
        $restaurationPartielle->setAbilityRange('contact');
        $restaurationPartielle->setComponent('V, S');
        $restaurationPartielle->setDuration('instantanée');

        $manager->persist($restaurationPartielle);

        $retourVie = new Ability();
        $retourVie->setName('Retour à la vie');
        $retourVie->setQuickDescription('Nécromancie du 3ème niveau');
        $retourVie->setDescription("Nécromancie du 3ème niveau
Vous touchez une créature morte dans la minute qui vient de s'écouler. La créature est ramenée à la vie avec 1 point de vie. Ce sort ne peut pas ramener à la vie une créature morte de vieillesse, pas plus qu'il ne restaure l'anatomie manquante.");
        $retourVie->setIncantationTime('1 action');
        $retourVie->setAbilityRange('contact');
        $retourVie->setComponent('V, S, M (300 po de diamants, que le sort détruit)');
        $retourVie->setDuration('instantanée');

        $manager->persist($retourVie);

        $sanctuaire = new Ability();
        $sanctuaire->setName('Sanctuaire');
        $sanctuaire->setQuickDescription('Abjuration du 1er niveau');
        $sanctuaire->setDescription("Abjuration du 1er niveau
Vous protégez une créature à portée contre les attaques. Jusqu'à la fin du sort, toute créature qui cible la créature protégée avec une attaque ou un sort nuisible doit d'abord effectuer un jet de sauvegarde de Sagesse. En cas d'échec, la créature doit changer de cible sous peine de perdre son attaque ou son sort. Le sort ne protège pas la cible des effets de zone, comme l'explosion d'une boule de feu.
Si la créature protégée effectue une attaque, lance un sort qui affecte l'ennemi ou inflige des dégâts à une autre créature, le sort prend fin.");
        $sanctuaire->setIncantationTime('1 action bonus');
        $sanctuaire->setAbilityRange('9m');
        $sanctuaire->setComponent('V, S, M (un petit miroir en argent)');
        $sanctuaire->setDuration('1 minute');

        $manager->persist($sanctuaire);

        $silence = new Ability();
        $silence->setName('Silence');
        $silence->setQuickDescription('Illusion du 2ème niveau (rituel)');
        $silence->setDescription("Illusion du 2ème niveau (rituel)
Pour toute la durée, nul son ne peut être produit dans une sphère de 6 m de rayon centrée sur un point que vous choisissez à portée. Aucun son ne peut non plus traverser cette zone. Tout objet ou créature entièrement compris dans la sphère est immunisé contre les dégâts de tonnerre ; les créatures sont de plus assourdies. Il est impossible de lancer un sort doté d'une composante verbale de l'intérieur de cette sphère.");
        $silence->setIncantationTime('1 action');
        $silence->setAbilityRange('36m');
        $silence->setComponent('V, S');
        $silence->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($silence);

        $soins = new Ability();
        $soins->setName('Soins');
        $soins->setQuickDescription('Évocation du 1er niveau');
        $soins->setDescription("Évocation du 1er niveau
La créature que vous touchez récupère un nombre de points de vie égal à 1d8 + votre modificateur de caractéristique d'incantation. Ce sort est sans effet sur les morts-vivants et les créatures artificielles.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, il soigne 1d8 supplémentaires par niveau d'emplacement au-delà du 1%.");
        $soins->setIncantationTime('1 action');
        $soins->setAbilityRange('contact');
        $soins->setComponent('V, S');
        $soins->setDuration('instantanée');

        $manager->persist($soins);

        $sommeil = new Ability();
        $sommeil->setName('Sommeil');
        $sommeil->setQuickDescription('Enchantement du 1er niveau');
        $sommeil->setDescription("Enchantement du 1er niveau
Ce sort plonge les créatures dans un sommeil magique. Lancez 5d8 ; le total représente la somme des points de vie de créatures que le sort peut affecter. Les créatures situées dans un rayon de 6 m d'un point que vous choisissez à portée sont affectées par ordre croissant de leurs points de vie actuels (sans tenir compte des créatures inconscientes).
À commencer par la créature dotée des points de vie actuels les plus faibles, chaque créature affectée par ce sort tombe inconsciente et le reste jusqu'à la fin du sort, jusqu'à ce qu'elle subisse des dégâts ou que quelqu'un consacre une action à la réveiller énergiquement. Soustrayez les points de vie de chaque créature ainsi endormie du total avant de passer à la suivante dans l'ordre croissant des points de vie. Une créature ne peut être affectée que si ses points de vie ne dépassent pas le total restant.
Les morts-vivants et les créatures immunisées contre l'état charmé ne sont pas affectés par ce sort.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 2° niveau ou supérieur, lancez 2d8 supplémentaires par niveau d'emplacement au-delà du 1°.");
        $sommeil->setIncantationTime('1 action');
        $sommeil->setAbilityRange('27m');
        $sommeil->setComponent('V, S, M (une pincée de sable fin, des pétales de rose ou un grillon)');
        $sommeil->setDuration('1 minute');

        $manager->persist($sommeil);

        $sphereFeu = new Ability();
        $sphereFeu->setName('Sphère de feu');
        $sphereFeu->setQuickDescription('Invocation du 2ème niveau');
        $sphereFeu->setDescription("Invocation du 2ème niveau
Une sphère de flammes de 1,50 m de diamètre apparaît dans un espace inoccupé de votre choix à portée et persiste pour toute la durée. Toute créature qui termine son tour dans un rayon de 1,50 m de la sphère doit effectuer un jet de sauvegarde de Dextérité. Elle subit 2d6 dégâts de feu en cas d'échec, la moitié en cas de réussite.
Par une action bonus, vous pouvez déplacer la sphère d'un maximum de 9 m. Si vous lui faites heurter une créature de plein fouet, celle-ci doit effectuer un jet de sauvegarde contre les dégâts de la sphère, puis la sphère cesse de se déplacer pour ce tour.
Lorsque vous déplacez la sphère, vous pouvez lui faire franchir des obstacles dont la hauteur ne dépasse pas 1,50 m et des fosses d'une largeur maximale de 3 m. La sphère embrase les objets inflammables qui ne sont portés par personne, produit une lumière vive sur un rayon de 6 m et une lumière faible sur 6 m de plus.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 3° niveau ou supérieur, les dégâts augmentent de 1d6 par niveau d'emplacement au-delà du 2°.");
        $sphereFeu->setIncantationTime('1 action');
        $sphereFeu->setAbilityRange('18m');
        $sphereFeu->setComponent('V, S, M (un peu de suif et de poudre de fer, une pincée de soufre)');
        $sphereFeu->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($sphereFeu);

        $suggestion = new Ability();
        $suggestion->setName('Suggestion');
        $suggestion->setQuickDescription('Enchantement du 2ème niveau');
        $suggestion->setDescription("Enchantement du 2ème niveau
Vous suggérez une ligne de conduite (par une phrase ou deux) pour influencer magiquement une créature que vous voyez à portée et qui vous entend et vous comprend. Les créatures qu'on ne peut charmer sont immunisées contre cet effet. La suggestion doit être formulée de manière à paraître raisonnable. Demander à une créature de se poignarder, de se jeter sur un pieu, de s'immoler par les flammes ou d'exécuter quelque acte indubitablement dangereux pour elle met un terme au sort.
La cible doit effectuer un jet de sauvegarde de Sagesse. En cas d'échec, elle se conforme de son mieux à la ligne de conduite énoncée. L'activité en question peut se prolonger pour toute la durée. S'il est possible de l'accomplir plus rapidement, le sort prend fin dès que le sujet a terminé ce qu'on lui a demandé.
Vous pouvez également spécifier les conditions qui déclencheront l'activité avant la fin du sort. Exemple : vous pouvez suggérer à une chevalière de faire don de son destrier au premier mendiant qu'elle croisera. Si la situation ne se présente pas avant la fin du sort, l'activité n'est pas exécutée.
Si vous ou l'un de vos compagnons infligez des dégâts à la cible, le sort prend fin.");
        $suggestion->setIncantationTime('1 action');
        $suggestion->setAbilityRange('9m');
        $suggestion->setComponent("V, M (une langue de serpent, et un rayon de miel ou une goutte d'huile douce)");
        $suggestion->setDuration("concentration, jusqu'à 8 heures");

        $manager->persist($suggestion);

        $tenebres = new Ability();
        $tenebres->setName('Ténèbres');
        $tenebres->setQuickDescription('Évocation du 2ème niveau');
        $tenebres->setDescription("Évocation du 2ème niveau
Pour toute la durée, des ténèbres magiques se répandent depuis un point que vous choisissez à portée, remplissant une sphère de 4,50 m de raÿon.Ces ténèbres contournent les coins. La vision dans le noir ne perce pas ces ténèbres, tandis qu'une lumière non magique ne peut en illuminer la zone.
Si le point que vous choisissez est sur un objet que vous tenez ou qui n'est porté par personne d'autre, les ténèbres émanent de l'objet et se déplacent avec lui. Recouvrir intégralement la source des ténèbres avec un objet opaque, comme un heaume ou une casserole, bloque l'effet.
Si tout ou partie de ce sort chevauche la zone d'effet d'une lueur créée par un sort du 2° niveau ou inférieur, l'effet qui produit cette lueur est dissipé.");
        $tenebres->setIncantationTime('1 action');
        $tenebres->setAbilityRange('18m');
        $tenebres->setComponent('V, M (fourrure de chauve-souris et une goutte de goudron ou un morceau de charbon)');
        $tenebres->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($tenebres);

        $terreur = new Ability();
        $terreur->setName('Terreur');
        $terreur->setQuickDescription('Illusion du 3ème niveau');
        $terreur->setDescription("Illusion du 3ème niveau
Vous projetez une image fantasmatique des pires craintes de ceux qui vous font face. Chaque créature prise dans un cône de 9 m doit réussir un jet de sauvegarde de Sagesse sous peine de lâcher ce qu'elle tient et d'être effrayée pour toute la durée.
Ainsi effrayée, la créature doit à chacun de ses tours entreprendre l'action Foncer et s'éloigner de vous par le chemin le plus sûr, sauf si elle n'a nulle part où aller. Quand une telle créature termine son tour à un endroit où elle ne vous a pas en ligne de mire, elle peut effectuer un jet de sauvegarde de Sagesse. En cas de réussite, le sort prend fin en ce qui la concerne.");
        $terreur->setIncantationTime('1 action');
        $terreur->setAbilityRange('personnelle (cône de 4,50 m)');
        $terreur->setComponent('V, S, M (une plume blanche ou un cœur de poule)');
        $terreur->setDuration("concentration, jusqu'à 1 minute");

        $manager->persist($terreur);

        $thaumaturgie = new Ability();
        $thaumaturgie->setName('Thaumaturgie');
        $thaumaturgie->setQuickDescription('Sort mineur de transmutation');
        $thaumaturgie->setDescription("Sort mineur de transmutation
Vous engendrez une manifestation surnaturelle mineure, à portée. Vous créez l'un des effets magiques suivants à portée :
. Votre voix retentit jusqu'à trois fois plus fort que la normale pendant 1 minute.
. Vous manipulez des flammes pendant 1 minute : elles vacillent, s'intensifient, s'atténuent ou changent de couleur.
. Vous provoquez un léger tremblement de terre inoffensif pendant 1 minute.
. Vous faites émaner un son bref d'un point que vous choisissez à portée, comme un grondement de tonnerre, un croassement ou des murmures inquiétants.
. Vous provoquez l'ouverture soudaine d'une porte ou fenêtre non verrouillée ou la faites claquer.
. Vous altérez l'aspect de vos yeux pendant 1 minute.
Si vous lancez ce sort plusieurs fois, vous pouvez faire coexister jusqu'à trois des effets d'une minute, sachant que vous pouvez révoquer un tel effet au prix d'une action.");
        $thaumaturgie->setIncantationTime('1 action');
        $thaumaturgie->setAbilityRange('9m');
        $thaumaturgie->setComponent('V');
        $thaumaturgie->setDuration("jusqu'à 1 minute");

        $manager->persist($thaumaturgie);

        $toileAraignee = new Ability();
        $toileAraignee->setName("Toile d'araignée");
        $toileAraignee->setQuickDescription('Invocation du 2ème niveau');
        $toileAraignee->setDescription("Invocation du 2ème niveau
Vous invoquez une masse d'épais fils d'araignée entremêlés en un point que vous choisissez à portée. Pour toute la durée, cette toile remplit un cube de 6 m d'arête émanant du point choisi. Elle constitue un terrain difficile et la visibilité est réduite dans la zone.
Si les fils ne peuvent pas se fixer à deux volumes solides (comme des murs ou des arbres) et ne sont pas disposés en travers d'un sol, d'un mur ou d'un plafond, la toile s'effondre et le sort prend fin au début de votre tour suivant. Invoquée sur une surface plane, la toile présente une épaisseur de 1,50 m.
Chaque créature qui commence son tour dans la toile ou qui y pénètre à son tour de jeu doit effectuer un jet de sauvegarde de Dextérité. En cas d'échec, la créature est entravée tant qu'elle reste dans la toile et qu'elle ne s'en est pas libérée.
Une créature ainsi entravée peut consacrer son action à effectuer un test de Force assorti de votre DD de sauvegarde des sorts. En cas de réussite, elle n'est plus entravée.
La toile est inflammable. Tout cube de toile de 1,50 m d'arête exposé aux flammes brûle en 1 round et inflige 2d4 dégâts de feu à toute créature qui commence son tour dans les flammes.");
        $toileAraignee->setIncantationTime('1 action');
        $toileAraignee->setAbilityRange('18m');
        $toileAraignee->setComponent("V, S, M (quelques filandres de toile d'araignée)");
        $toileAraignee->setDuration("concentration, jusqu'à 1 heure");

        $manager->persist($toileAraignee);

        $traitFeu = new Ability();
        $traitFeu->setName('Trait de feu');
        $traitFeu->setQuickDescription("Sort mineur d'évocation");
        $traitFeu->setDescription("Sort mineur d'évocation
Vous projetez un grain enflammé vers une créature ou un objet à portée. Effectuez une attaque de sort à distance contre la cible. Si l'attaque touche, la cible subit 1410 dégâts de feu. Un objet inflammable touché par ce sort s'embrase s'il n'est porté par personne.
Les dégâts du sort augmentent de 1410 lorsque vous atteignez le niveau 5 (2410), le niveau 11 (3410) et le niveau 17 (4d10).");
        $traitFeu->setIncantationTime('1 action');
        $traitFeu->setAbilityRange('36m');
        $traitFeu->setComponent('V, S');
        $traitFeu->setDuration('instantanée');

        $manager->persist($traitFeu);

        $vagueTonnante = new Ability();
        $vagueTonnante->setName('Vague tonnante');
        $vagueTonnante->setQuickDescription('Évocation du 1er niveau');
        $vagueTonnante->setDescription("Évocation du 1er niveau
Une vague de force tonitruante déferle depuis vous. Chaque créature prise dans un cube de 4,50 m d'arête émanant de vous doit effectuer un jet de sauvegarde de Constitution. En cas d'échec, la créature subit 2d8 dégâts de tonnerre et le choc l'éloigne de 3m de vous. En cas de réussite, la créature subit la moitié de ces dégâts et n'est pas repoussée.
En outre, les objets non fixés entièrement compris dans la zone d'effet sont automatiquement repoussés de 3 m de vous par le sort, dont le fracas s'entend à une distance de 90 m.
À plus haut niveau. Lorsque vous lancez ce sort-par un emplacement du 2° niveau ou supérieur, les dégâts augmentent de 1d8 par niveau d'emplacement au-delà du 1°.");
        $vagueTonnante->setIncantationTime('1 action');
        $vagueTonnante->setAbilityRange("personnelle (cube de 4,50 m d'arête)");
        $vagueTonnante->setComponent('V, S');
        $vagueTonnante->setDuration('instantanée');

        $manager->persist($vagueTonnante);

        $verrouMagique = new Ability();
        $verrouMagique->setName('Verrou magique');
        $verrouMagique->setQuickDescription('Abjuration du 2éme niveau');
        $verrouMagique->setDescription("Abjuration du 2éme niveau
Vous touchez un accès fermé : porte, fenêtre, portail, coffre ou autre issue. L'accès est alors verrouillé pour toute la durée. Vous et toutes les créatures que vous désignez à l'incantation du sort peuvent ouvrir normalement l'accès. Vous pouvez également décider d'un mot de passe qui réprime le sort pendant 1 minute s'il est prononcé dans un rayon de 1,50 m de l'objet. Sans cela, on ne peut outrepasser ce verrou, sauf à le briser ou à dissiper ou réprimer le.sort. Lancer déblocage sur l'objet réprime verrou magique pendant 10 minutes.
Tant que l'objet est affecté par ce sort, il est plus difficile à briser ou forcer ; le DD des tentatives visant à le fracturer ou le crocheter augmente de 10.");
        $verrouMagique->setIncantationTime('1 action');
        $verrouMagique->setAbilityRange('contact');
        $verrouMagique->setComponent("V, S, M (25 po de poudre d'or, que le sort détruit)");
        $verrouMagique->setDuration("jusqu'à dissipation");

        $manager->persist($verrouMagique);

        $vol = new Ability();
        $vol->setName('Vol');
        $vol->setQuickDescription('Transmutation du 3ème niveau');
        $vol->setDescription("Transmutation du 3ème niveau
Vous touchez une créature consentante. La cible acquiert une vitesse en vol de 18 m pour toute la durée. Lorsque le sort prend fin, la cible tombe si elle est toujours dans les airs, à moins de pouvoir arrêter sa chute.
À plus haut niveau. Lorsque vous lancez ce sort par un emplacement du 4° niveau ou supérieur, vous pouvez cibler une créature de plus par niveau d'emplacement au-delà du 3°.");
        $vol->setIncantationTime('1 action');
        $vol->setAbilityRange('contact');
        $vol->setComponent("V, S, M (une plume d'oiseau quelconque)");
        $vol->setDuration("concentration, jusqu'à 10 minutes");

        $manager->persist($vol);

        $manager->flush();
    }
}
