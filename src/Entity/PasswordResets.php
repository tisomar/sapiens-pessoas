<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * PasswordResets
 */
#[ORM\Table(name: 'PASSWORD_RESETS')]
#[ORM\Index(name: 'password_resets_email_index', columns: ['EMAIL'])]
#[ORM\Entity]
class PasswordResets
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'EMAIL', type: 'string', length: 255, nullable: false)]
    private $email;

    /**
     * @var string
     */
    #[ORM\Column(name: 'TOKEN', type: 'string', length: 255, nullable: false)]
    private $token;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'CREATED_AT', type: 'datetime', nullable: true)]
    private $createdAt;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'PASSWORD_RESETS_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     */
    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getIdTable(): int
    {
        return $this->idTable;
    }

    /**
     * @param int $idTable
     */
    public function setIdTable(int $idTable): void
    {
        $this->idTable = $idTable;
    }


}
