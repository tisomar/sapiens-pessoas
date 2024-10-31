<?php

namespace AguPessoas\Backend\Api\V1;

use Symfony\Component\Form\FormInterface;

class FormErrorValidation
{
    public function getErros(FormInterface $form): array
    {
        $erros = [];

        foreach ($form->getErrors() as $error){
            $erros[] = $error->getMessage();
        }

        foreach ($form->all() as $childForm){
            if($childForm instanceof FormInterface){
                if($e = $this->getErros($childForm)){
                    $erros[$childForm->getName()] = $e;
                }
            }
        }

        return $erros;
    }
}