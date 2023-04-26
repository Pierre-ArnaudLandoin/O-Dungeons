<?php

namespace App\DataFixtures;

use App\Entity\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $baton = new Weapon();
        $baton->setName('Bâton');
        $baton->setType('Armes courantes de corps à corps');
        $baton->setDamageDice('1d6');
        $baton->setDamageType('contondants');
        $baton->setWeight(2);
        $baton->setProperty('Polyvalente (1d8)');

        $manager->persist($baton);

        $dague = new Weapon();
        $dague->setName('Dague');
        $dague->setType('Armes courantes de corps à corps');
        $dague->setDamageDice('1d4');
        $dague->setDamageType('perforants');
        $dague->setWeight(0.5);
        $dague->setProperty('Finesse, lancer (portée 6/18), légère');

        $manager->persist($dague);

        $gourdin = new Weapon();
        $gourdin->setName('Gourdin');
        $gourdin->setType('Armes courantes de corps à corps');
        $gourdin->setDamageDice('1d4');
        $gourdin->setDamageType('contondants');
        $gourdin->setWeight(1);
        $gourdin->setProperty('Légère');

        $manager->persist($gourdin);

        $hachette = new Weapon();
        $hachette->setName('Hachette');
        $hachette->setType('Armes courantes de corps à corps');
        $hachette->setDamageDice('1d6');
        $hachette->setDamageType('tranchants');
        $hachette->setWeight(1);
        $hachette->setProperty('Lancer (portée 6/18), légère');

        $manager->persist($hachette);

        $javeline = new Weapon();
        $javeline->setName('Javeline');
        $javeline->setType('Armes courantes de corps à corps');
        $javeline->setDamageDice('1d6');
        $javeline->setDamageType('perforants');
        $javeline->setWeight(1);
        $javeline->setProperty('Lancer (portée 9/36)');

        $manager->persist($javeline);

        $lance = new Weapon();
        $lance->setName('Lance');
        $lance->setType('Armes courantes de corps à corps');
        $lance->setDamageDice('1d6');
        $lance->setDamageType('perforants');
        $lance->setWeight(1.5);
        $lance->setProperty('Lancer (portée 6/18), polyvalente (1d8)');

        $manager->persist($lance);

        $marteau = new Weapon();
        $marteau->setName('Marteau léger');
        $marteau->setType('Armes courantes de corps à corps');
        $marteau->setDamageDice('1d4');
        $marteau->setDamageType('contondants');
        $marteau->setWeight(1);
        $marteau->setProperty('Lancer (portée 6/18), légère');

        $manager->persist($marteau);

        $masse = new Weapon();
        $masse->setName("Masse d'armes");
        $masse->setType('Armes courantes de corps à corps');
        $masse->setDamageDice('1d6');
        $masse->setDamageType('contondants');
        $masse->setWeight(2);

        $manager->persist($masse);

        $massue = new Weapon();
        $massue->setName('Massue');
        $massue->setType('Armes courantes de corps à corps');
        $massue->setDamageDice('1d8');
        $massue->setDamageType('contondants');
        $massue->setWeight(5);
        $massue->setProperty('Deux mains');

        $manager->persist($massue);

        $arbalete = new Weapon();
        $arbalete->setName('Arbalete légère');
        $arbalete->setType('Armes courantes à distance');
        $arbalete->setDamageDice('1d8');
        $arbalete->setDamageType('perforants');
        $arbalete->setWeight(2.5);
        $arbalete->setProperty('Chargement, deux mains, munitions (portée 24/96');

        $manager->persist($arbalete);

        $arc = new Weapon();
        $arc->setName('Arc court');
        $arc->setType('Armes courantes à distance');
        $arc->setDamageDice('1d6');
        $arc->setDamageType('perforants');
        $arc->setWeight(1);
        $arc->setProperty('Deux mains, munitions (portée 24/96');

        $manager->persist($arc);

        $flechette = new Weapon();
        $flechette->setName('Fléchette');
        $flechette->setType('Armes courantes à distance');
        $flechette->setDamageDice('1d4');
        $flechette->setDamageType('perforants');
        $flechette->setWeight(0.125);
        $flechette->setProperty('Finesse, lancer (portée 6/18');

        $manager->persist($flechette);

        $fronde = new Weapon();
        $fronde->setName('Fronde');
        $fronde->setType('Armes courantes à distance');
        $fronde->setDamageDice('1d4');
        $fronde->setDamageType('contondants');
        $fronde->setWeight(0);
        $fronde->setProperty('Munitions (portée 9/36');

        $manager->persist($fronde);

        $cimeterre = new Weapon();
        $cimeterre->setName('Cimeterre');
        $cimeterre->setType('Armes de guerre de corps à corps');
        $cimeterre->setDamageDice('1d6');
        $cimeterre->setDamageType('tranchants');
        $cimeterre->setWeight(1.5);
        $cimeterre->setProperty('Finesse, légère');

        $manager->persist($cimeterre);

        $epeeDeuxMains = new Weapon();
        $epeeDeuxMains->setName('Épée à deux mains');
        $epeeDeuxMains->setType('Armes de guerre de corps à corps');
        $epeeDeuxMains->setDamageDice('2d6');
        $epeeDeuxMains->setDamageType('tranchants');
        $epeeDeuxMains->setWeight(3);
        $epeeDeuxMains->setProperty('Deux mains, lourde');

        $manager->persist($epeeDeuxMains);

        $epeeCourte = new Weapon();
        $epeeCourte->setName('Épée courte');
        $epeeCourte->setType('Armes de guerre de corps à corps');
        $epeeCourte->setDamageDice('1d6');
        $epeeCourte->setDamageType('perforants');
        $epeeCourte->setWeight(1);
        $epeeCourte->setProperty('Finesse, légère');

        $manager->persist($epeeCourte);

        $epeeLongue = new Weapon();
        $epeeLongue->setName('Épée longue');
        $epeeLongue->setType('Armes de guerre de corps à corps');
        $epeeLongue->setDamageDice('1d8');
        $epeeLongue->setDamageType('tranchants');
        $epeeLongue->setWeight(1.5);
        $epeeLongue->setProperty('Polyvalente (1d10)');

        $manager->persist($epeeLongue);

        $fleau = new Weapon();
        $fleau->setName('Fléau');
        $fleau->setType('Armes de guerre de corps à corps');
        $fleau->setDamageDice('1d8');
        $fleau->setDamageType('contandants');
        $fleau->setWeight(1);

        $manager->persist($fleau);

        $hacheDeuxMains = new Weapon();
        $hacheDeuxMains->setName('Hache à deux mains');
        $hacheDeuxMains->setType('Armes de guerre de corps à corps');
        $hacheDeuxMains->setDamageDice('1d12');
        $hacheDeuxMains->setDamageType('tranchants');
        $hacheDeuxMains->setWeight(3.5);
        $hacheDeuxMains->setProperty('Deux mains, lourde');

        $manager->persist($hacheDeuxMains);

        $hacheArme = new Weapon();
        $hacheArme->setName("Hache d'armes");
        $hacheArme->setType('Armes de guerre de corps à corps');
        $hacheArme->setDamageDice('1d8');
        $hacheArme->setDamageType('tranchants');
        $hacheArme->setWeight(2);
        $hacheArme->setProperty('Polyvalente (1d10)');

        $manager->persist($hacheArme);

        $hallebarde = new Weapon();
        $hallebarde->setName('Hallebarde');
        $hallebarde->setType('Armes de guerre de corps à corps');
        $hallebarde->setDamageDice('1d10');
        $hallebarde->setDamageType('tranchants');
        $hallebarde->setWeight(3);
        $hallebarde->setProperty('Allonge, deux mains, lourde');

        $manager->persist($hallebarde);

        $maillet = new Weapon();
        $maillet->setName("Maillet d'armes");
        $maillet->setType('Armes de guerre de corps à corps');
        $maillet->setDamageDice('2d6');
        $maillet->setDamageType('contandants');
        $maillet->setWeight(5);
        $maillet->setProperty('Deux mains, lourde');

        $manager->persist($maillet);

        $marteauDeGuerre = new Weapon();
        $marteauDeGuerre->setName('Marteau de guerre');
        $marteauDeGuerre->setType('Armes de guerre de corps à corps');
        $marteauDeGuerre->setDamageDice('1d8');
        $marteauDeGuerre->setDamageType('contandants');
        $marteauDeGuerre->setWeight(5);
        $marteauDeGuerre->setProperty('Polyvalente (1d10)');

        $manager->persist($marteauDeGuerre);

        $morgenstern = new Weapon();
        $morgenstern->setName('Morgenstern');
        $morgenstern->setType('Armes de guerre de corps à corps');
        $morgenstern->setDamageDice('1d8');
        $morgenstern->setDamageType('perforants');
        $morgenstern->setWeight(2);

        $manager->persist($morgenstern);

        $rapiere = new Weapon();
        $rapiere->setName('Rapière');
        $rapiere->setType('Armes de guerre de corps à corps');
        $rapiere->setDamageDice('1d8');
        $rapiere->setDamageType('perforants');
        $rapiere->setWeight(1);
        $rapiere->setProperty('Finesse');

        $manager->persist($rapiere);

        $trident = new Weapon();
        $trident->setName('Trident');
        $trident->setType('Armes de guerre de corps à corps');
        $trident->setDamageDice('1d6');
        $trident->setDamageType('perforants');
        $trident->setWeight(2);
        $trident->setProperty('Lancer (portée 6/18), polyvalente (1d8)');

        $manager->persist($trident);

        $arbaletePoing = new Weapon();
        $arbaletePoing->setName('Arbalete de poing');
        $arbaletePoing->setType('Armes de guerre à distance');
        $arbaletePoing->setDamageDice('1d6');
        $arbaletePoing->setDamageType('perforants');
        $arbaletePoing->setWeight(1.5);
        $arbaletePoing->setProperty('Chargement, légère, munitions (portée 9/36)');

        $manager->persist($arbaletePoing);

        $arbaleteLourde = new Weapon();
        $arbaleteLourde->setName('Arbalete de poing');
        $arbaleteLourde->setType('Armes de guerre à distance');
        $arbaleteLourde->setDamageDice('1d10');
        $arbaleteLourde->setDamageType('perforants');
        $arbaleteLourde->setWeight(9);
        $arbaleteLourde->setProperty('Chargement, deux mains, lourde, munitions (portée 30/120)');

        $manager->persist($arbaleteLourde);

        $arcLong = new Weapon();
        $arcLong->setName('Arc long');
        $arcLong->setType('Armes de guerre à distance');
        $arcLong->setDamageDice('1d8');
        $arcLong->setDamageType('perforants');
        $arcLong->setWeight(1);
        $arcLong->setProperty('Deux mains, lourde, munitions (portée 45/180)');

        $manager->persist($arcLong);

        $manager->flush();
    }
}
