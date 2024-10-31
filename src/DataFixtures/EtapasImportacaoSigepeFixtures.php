<?php

namespace AguPessoas\Backend\DataFixtures;

use AguPessoas\Backend\Entity\SPEtapaImportacaoSigepe;
use AguPessoas\Backend\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EtapasImportacaoSigepeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $etapa1 = new SPEtapaImportacaoSigepe();
        $etapa1->setNome('Dados Pessoais');
        $etapa1->setCodigo('DP');

        $etapa2 = new SPEtapaImportacaoSigepe();
        $etapa2->setNome('Dados Escolares');
        $etapa2->setCodigo('DE');

        $etapa3 = new SPEtapaImportacaoSigepe();
        $etapa3->setNome('Endereço e Telefone');
        $etapa3->setCodigo('END_TEL');

        $etapa4 = new SPEtapaImportacaoSigepe();
        $etapa4->setNome('Documentação');
        $etapa4->setCodigo('DOC');

        $etapa5 = new SPEtapaImportacaoSigepe();
        $etapa5->setNome('Dados Bancários');
        $etapa5->setCodigo('DBA');

        $etapa6 = new SPEtapaImportacaoSigepe();
        $etapa6->setNome('Dependentes');
        $etapa6->setCodigo('DEP');

        $etapa7 = new SPEtapaImportacaoSigepe();
        $etapa7->setNome('Férias');
        $etapa7->setCodigo('FER');

        $etapa8 = new SPEtapaImportacaoSigepe();
        $etapa8->setNome('Dados Funcionais');
        $etapa8->setCodigo('DF');

        $manager->persist($etapa1);
        $manager->persist($etapa2);
        $manager->persist($etapa3);
        $manager->persist($etapa4);
        $manager->persist($etapa5);
        $manager->persist($etapa6);
        $manager->persist($etapa7);
        $manager->persist($etapa8);

        $manager->flush();
    }
}
