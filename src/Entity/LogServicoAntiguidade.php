<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogServicoAntiguidade
 */
#[ORM\Table(name: 'LOG_SERVICO_ANTIGUIDADE')]
#[ORM\Entity]
class LogServicoAntiguidade
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_LOG_SERVICO_ANTIGUIDADE', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial da tabela LOG_SERVICO_ANTIGUIDADE. Identifica unicamente um registro na tabela LOG_SERVICO_ANTIGUIDADE.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOG_SERVICO_ANTIGUIDADE_ID_LOG', allocationSize: 1, initialValue: 1)]
    private $idLogServicoAntiguidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_XML_CLIENTE', type: 'text', nullable: true, options: ['comment' => 'Especifica a descrição do resultado da antiguidade (apresentado ao cliente).'])]
    private $dsXmlCliente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_XML_SERVICO', type: 'text', nullable: true, options: ['comment' => 'Especifica os dados brutos que deram origem ao resultado.'])]
    private $dsXmlServico;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INCLUSAO', type: 'date', nullable: false, options: ['comment' => 'Especifica a data de inclusão do registro, ou seja, a data da operação.'])]
    private $dtInclusao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_LOG_SERVICO_ANTIGUIDADE', type: 'string', length: 200, nullable: true, options: ['comment' => 'Especificação descritiva do resultado da antiguidade para cada relatório gerado.'])]
    private $dsLogServicoAntiguidade;

    /**
     * @return int
     */
    public function getIdLogServicoAntiguidade(): int
    {
        return $this->idLogServicoAntiguidade;
    }

    /**
     * @param int $idLogServicoAntiguidade
     */
    public function setIdLogServicoAntiguidade(int $idLogServicoAntiguidade): void
    {
        $this->idLogServicoAntiguidade = $idLogServicoAntiguidade;
    }

    /**
     * @return string|null
     */
    public function getDsXmlCliente(): ?string
    {
        return $this->dsXmlCliente;
    }

    /**
     * @param string|null $dsXmlCliente
     */
    public function setDsXmlCliente(?string $dsXmlCliente): void
    {
        $this->dsXmlCliente = $dsXmlCliente;
    }

    /**
     * @return string|null
     */
    public function getDsXmlServico(): ?string
    {
        return $this->dsXmlServico;
    }

    /**
     * @param string|null $dsXmlServico
     */
    public function setDsXmlServico(?string $dsXmlServico): void
    {
        $this->dsXmlServico = $dsXmlServico;
    }

    /**
     * @return DateTime
     */
    public function getDtInclusao(): \DateTime
    {
        return $this->dtInclusao;
    }

    /**
     * @param DateTime $dtInclusao
     */
    public function setDtInclusao(\DateTime $dtInclusao): void
    {
        $this->dtInclusao = $dtInclusao;
    }

    /**
     * @return string|null
     */
    public function getDsLogServicoAntiguidade(): ?string
    {
        return $this->dsLogServicoAntiguidade;
    }

    /**
     * @param string|null $dsLogServicoAntiguidade
     */
    public function setDsLogServicoAntiguidade(?string $dsLogServicoAntiguidade): void
    {
        $this->dsLogServicoAntiguidade = $dsLogServicoAntiguidade;
    }


}
