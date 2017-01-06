<?php

namespace App\Presenters;

use App\Components\Forms\DocRequestFormFactory;

class NewDocRequestPresenter extends BasePresenter
{
    /** @var DocRequestFormFactory @inject */
    public $docRequestFormFactory;
    
    protected function createComponentNewRequestForm()
    {
        $form = $this->docRequestFormFactory->create();
        
        $form->onSuccess[] = function () {
            $this->flashSuccess('Document request successfully created');
            $this->redirect('this');
        };
        
        return $form;
    }
}
