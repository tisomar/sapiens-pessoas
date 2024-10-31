<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 */
#[ORM\Table(name: 'USERS_')]
#[ORM\UniqueConstraint(name: 'users_email_uk', columns: ['EMAIL'])]
#[ORM\Entity]
class Users
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'USERS_ID_seq', allocationSize: 1, initialValue: 1)]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NAME', type: 'string', length: 255, nullable: false)]
    private $name;

    /**
     * @var string
     */
    #[ORM\Column(name: 'EMAIL', type: 'string', length: 255, nullable: false)]
    private $email;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'EMAIL_VERIFIED_AT', type: 'datetime', nullable: true)]
    private $emailVerifiedAt;

    /**
     * @var string
     */
    #[ORM\Column(name: 'PASSWORD', type: 'string', length: 255, nullable: false)]
    private $password;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'REMEMBER_TOKEN', type: 'string', length: 100, nullable: true)]
    private $rememberToken;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'CREATED_AT', type: 'datetime', nullable: true)]
    private $createdAt;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'UPDATED_AT', type: 'datetime', nullable: true)]
    private $updatedAt;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

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
     * @return DateTime|null
     */
    public function getEmailVerifiedAt(): ?\DateTime
    {
        return $this->emailVerifiedAt;
    }

    /**
     * @param DateTime|null $emailVerifiedAt
     */
    public function setEmailVerifiedAt(?\DateTime $emailVerifiedAt): void
    {
        $this->emailVerifiedAt = $emailVerifiedAt;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getRememberToken(): ?string
    {
        return $this->rememberToken;
    }

    /**
     * @param string|null $rememberToken
     */
    public function setRememberToken(?string $rememberToken): void
    {
        $this->rememberToken = $rememberToken;
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
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


}
