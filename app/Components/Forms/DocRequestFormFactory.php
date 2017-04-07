<?php

namespace App\Components\Forms;

use App\Model\Howdo\HowdoRequestFactory;
use Instante\Bootstrap3Renderer\BootstrapRenderer;
use Nette\Application\UI\Form;

class DocRequestFormFactory
{
    /** @var HowdoRequestFactory */
    private $howdoRequestFactory;

    public function __construct(HowdoRequestFactory $howdoRequestFactory)
    {
        $this->howdoRequestFactory = $howdoRequestFactory;
    }

    public function create(array $values = [])
    {
        $form = new Form();
        $form->setRenderer(new BootstrapRenderer());
        
        $form->addText('title', 'Request title:')
            ->setRequired();

        $form->addTextArea('description', 'Description:')
            ->setRequired();
        
        $form->addSubmit('submit', 'Save');

        $form->onSuccess[] = function (Form $form) {
            $values = $form->getValues();
            
            $this->howdoRequestFactory->create($values->title, $values->description);
        };
        
        if (count($values) > 0) {
            $form->setDefaults([
                'title' => $values['title'],
                'description' => $values['description'],
            ]);
        }

        return $form;
    }
}

