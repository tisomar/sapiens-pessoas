<?php

namespace AguPessoas\Backend\DataFixtures;

use AguPessoas\Backend\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $encoder)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('Admin');
        $user->setEmail('admin@email.com');
        $user->setCpf('02695548878');
        $user->setPassword($this->encoder->hashPassword($user, '123456'));

        $manager->persist($user);
        $manager->flush();
    }
}
