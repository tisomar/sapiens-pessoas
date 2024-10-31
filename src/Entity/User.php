<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use DateTime;

use AguPessoas\Backend\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
#[ORM\Table(name: 'USERS')]
class User implements EntityInterface,UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $email_verified_at = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Ignore]
    private ?string $password = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $remember_token = null;

    #[ORM\Column(name: 'CREATED_AT')]
    private ?\DateTimeImmutable $dataInclusao = null;

    #[ORM\Column(name: 'UPDATED_AT', nullable: true)]
    private ?\DateTimeImmutable $dataAlteracao = null;

    #[ORM\Column(name: 'TOKEN_SUPER_SAPIENS', type: 'string', nullable: true)]
    protected ?string $tokenSuperSapiens = null;

    public function getTokenSuperSapiens(): ?string
    {
        return $this->tokenSuperSapiens;
    }

    public function setTokenSuperSapiens(?string $tokenSuperSapiens): void
    {
        $this->tokenSuperSapiens = $tokenSuperSapiens;
    }

    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 11, nullable: false)]
    protected ?string $cpf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getEmailVerifiedAt(): ?\DateTimeInterface
    {
        return $this->email_verified_at;
    }

    public function setEmailVerifiedAt(?\DateTimeInterface $email_verified_at): static
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken(?string $remember_token): static
    {
        $this->remember_token = $remember_token;

        return $this;
    }

    public function getDataInclusao(): ?\DateTimeImmutable
    {
        return $this->dataInclusao;
    }

    public function setDataInclusao(\DateTimeImmutable $created_at): static
    {
        $this->dataInclusao = $created_at;

        return $this;
    }

    public function getDataAlteracao(): ?\DateTimeImmutable
    {
        return $this->dataAlteracao;
    }

    public function setDataAlteracao(?\DateTimeImmutable $updated_at): static
    {
        $this->dataAlteracao = $updated_at;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = ['ROLE_USER'];

        return $roles;

    }

    public function eraseCredentials()
    {
        //$this->password = null;
    }

    #[Ignore]
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'dataInclusao' => $this->dataInclusao,
            'dataAlteracao' => $this->dataAlteracao,
            'cpf' => $this->cpf,
        ];
    }
}
