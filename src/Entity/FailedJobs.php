<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * FailedJobs
 */
#[ORM\Table(name: 'FAILED_JOBS')]
#[ORM\Entity]
class FailedJobs
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'FAILED_JOBS_ID_seq', allocationSize: 1, initialValue: 1)]
    private $id;

    /**
     * @var string
     */
    #[ORM\Column(name: 'CONNECTION', type: 'text', nullable: false)]
    private $connection;

    /**
     * @var string
     */
    #[ORM\Column(name: 'QUEUE', type: 'text', nullable: false)]
    private $queue;

    /**
     * @var string
     */
    #[ORM\Column(name: 'PAYLOAD', type: 'text', nullable: false)]
    private $payload;

    /**
     * @var string
     */
    #[ORM\Column(name: 'EXCEPTION', type: 'text', nullable: false)]
    private $exception;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'FAILED_AT', type: 'datetime', nullable: false)]
    private $failedAt;

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
    public function getConnection(): string
    {
        return $this->connection;
    }

    /**
     * @param string $connection
     */
    public function setConnection(string $connection): void
    {
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getQueue(): string
    {
        return $this->queue;
    }

    /**
     * @param string $queue
     */
    public function setQueue(string $queue): void
    {
        $this->queue = $queue;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     */
    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getException(): string
    {
        return $this->exception;
    }

    /**
     * @param string $exception
     */
    public function setException(string $exception): void
    {
        $this->exception = $exception;
    }

    /**
     * @return DateTime
     */
    public function getFailedAt(): \DateTime
    {
        return $this->failedAt;
    }

    /**
     * @param DateTime $failedAt
     */
    public function setFailedAt(\DateTime $failedAt): void
    {
        $this->failedAt = $failedAt;
    }


}
