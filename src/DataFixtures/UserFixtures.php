<?php

namespace App\DataFixtures;

use App\Entity\Avatar;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $avatarRepo = $manager->getRepository(Avatar::class);
        $avatars = $avatarRepo->findAll();

        // ? USER
        $user = new User();
        $user->setEmail('user@user.com');

        $plaintextPassword = 'user';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setFirstName('User');
        $user->setLastName('User');
        $user->setRoles(['ROLE_USER']);
        $user->setAvatar($avatars[random_int(0, count($avatars) - 1)]);

        $manager->persist($user);

        // ? MANAGER
        $user = new User();
        $user->setEmail('manager@user.com');
        $plaintextPassword = 'manager';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setFirstName('Manager');
        $user->setLastName('Manager');
        $user->setRoles(['ROLE_MANAGER']);
        $user->setAvatar($avatars[random_int(0, count($avatars) - 1)]);

        $manager->persist($user);

        // ? ADMIN
        $user = new User();
        $user->setEmail('admin@user.com');

        $plaintextPassword = 'admin';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setFirstName('Admin');
        $user->setLastName('Admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setAvatar($avatars[random_int(0, count($avatars) - 1)]);

        $manager->persist($user);

        $manager->flush();

        // ? SUPER ADMIN
        $user = new User();
        $user->setEmail('superadmin@user.com');

        $plaintextPassword = 'superadmin';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setFirstName('SuperAdmin');
        $user->setLastName('SuperAdmin');
        $user->setRoles(['ROLE_SUPERADMIN']);
        $user->setAvatar($avatars[random_int(0, count($avatars) - 1)]);

        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [AvatarFixtures::class];
    }
}
