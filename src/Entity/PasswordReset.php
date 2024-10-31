<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

/**
 * Class PasswordReset.
 *
 * @author Advocacia-Geral da União <agupessoas@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[ORM\Table(name: 'password_reset')]
class PasswordReset
{

}