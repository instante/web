<?php

namespace App\Presenters;

use App\Components\HowDoI\HowDoIControlFactory;

class HomepagePresenter extends BasePresenter
{
    /** @var HowDoIControlFactory @inject */
    public $howDoIControlFactory;

    public function actionDefault()
    {

    }

    public function createComponentHowDoI() {
        return $this->howDoIControlFactory->create();
    }
}
