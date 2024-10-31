<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrations
 */
#[ORM\Table(name: 'MIGRATIONS')]
#[ORM\Entity]
class Migrations
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MIGRATIONS_ID_seq', allocationSize: 1, initialValue: 1)]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'MIGRATION', type: 'string', length: 255, nullable: false)]
    private $migration;

    /**
     * @var int
     */
    #[ORM\Column(name: 'BATCH', type: 'integer', nullable: false)]
    private $batch;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getMigration(): string
    {
        return $this->migration;
    }

    /**
     * @param string $migration
     */
    public function setMigration(string $migration): void
    {
        $this->migration = $migration;
    }

    /**
     * @return int
     */
    public function getBatch(): int
    {
        return $this->batch;
    }

    /**
     * @param int $batch
     */
    public function setBatch(int $batch): void
    {
        $this->batch = $batch;
    }


}
