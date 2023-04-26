<?php

namespace App\DataFixtures;

use App\Entity\Armor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArmorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $leather = new Armor();
        $leather->setName('Cuir');
        $leather->setArmorType('Armures légères');
        $leather->setArmorClass('11 + modificateur de Dex');
        $leather->setWeight(5);

        $manager->persist($leather);

        $studdedLeather = new Armor();
        $studdedLeather->setName('Cuir clouté');
        $studdedLeather->setArmorType('Armures légères');
        $studdedLeather->setArmorClass('12 + modificateur de Dex');
        $studdedLeather->setWeight(6.5);

        $manager->persist($studdedLeather);

        $hide = new Armor();
        $hide->setName('Armure de peaux');
        $hide->setArmorType('Armures intermédiaires');
        $hide->setArmorClass('12 + modificateur de Dex (max2)');
        $hide->setWeight(6);

        $manager->persist($hide);

        $chainShirt = new Armor();
        $chainShirt->setName('Chemise de mailles');
        $chainShirt->setArmorType('Armures intermédiaires');
        $chainShirt->setArmorClass('13 + modificateur de Dex (max2)');
        $chainShirt->setWeight(10);

        $manager->persist($chainShirt);

        $scaleMail = new Armor();
        $scaleMail->setName('Ecailles');
        $scaleMail->setArmorType('Armures intermédiaires');
        $scaleMail->setArmorClass('14 + modificateur de Dex (max2)');
        $scaleMail->setDiscretion('Désavantage');
        $scaleMail->setWeight(22.5);

        $manager->persist($scaleMail);

        $breastplate = new Armor();
        $breastplate->setName('Cuirasse');
        $breastplate->setArmorType('Armures intermédiaires');
        $breastplate->setArmorClass('14 + modificateur de Dex (max2)');
        $breastplate->setWeight(10);

        $manager->persist($breastplate);

        $halfPlate = new Armor();
        $halfPlate->setName('Demi-plate');
        $halfPlate->setArmorType('Armures intermédiaires');
        $halfPlate->setArmorClass('15 + modificateur de Dex (max2)');
        $halfPlate->setDiscretion('Désavantage');
        $halfPlate->setWeight(20);

        $manager->persist($halfPlate);

        $ringMail = new Armor();
        $ringMail->setName('Broigne (anneaux)');
        $ringMail->setArmorType('Armures lourdes');
        $ringMail->setArmorClass('14');
        $ringMail->setDiscretion('Désavantage');
        $ringMail->setWeight(20);

        $manager->persist($ringMail);

        $chainMail = new Armor();
        $chainMail->setName('Cotte de mailles');
        $chainMail->setArmorType('Armures lourdes');
        $chainMail->setArmorClass('16');
        $chainMail->setStrength(13);
        $chainMail->setDiscretion('Désavantage');
        $chainMail->setWeight(27.5);

        $manager->persist($chainMail);

        $splint = new Armor();
        $splint->setName('Clibanion (bandes)');
        $splint->setArmorType('Armures lourdes');
        $splint->setArmorClass('17');
        $splint->setStrength(15);
        $splint->setDiscretion('Désavantage');
        $splint->setWeight(30);

        $manager->persist($splint);

        $plate = new Armor();
        $plate->setName('Harnois (plaques)');
        $plate->setArmorType('Armures lourdes');
        $plate->setArmorClass('18');
        $plate->setStrength(15);
        $plate->setDiscretion('Désavantage');
        $plate->setWeight(32.5);

        $manager->persist($plate);

        $shield = new Armor();
        $shield->setName('Bouclier');
        $shield->setArmorType('Boucliers');
        $shield->setArmorClass('+2');
        $shield->setWeight(3);

        $manager->persist($shield);

        $manager->flush();
    }
}
