<?php

namespace App\Presenters;

use App\Model\Howdo\HowdoFinder;
use App\Model\Howdo\RequestUpVoter;
use Nette\Application\Responses\JsonResponse;

class DocumentPresenter extends BasePresenter
{
    /** @var HowdoFinder @inject */
    public $howdoFinder;

    /** @var RequestUpVoter @inject */
    public $requestUpVoter;

    public function handleFindKeyword($keyword)
    {
        $result = $this->howdoFinder->findByKeyword($keyword);

        $this->sendResponse(new JsonResponse($result));
    }

    public function handleUpVoteRequest($requestId)
    {
        $voted = $this->requestUpVoter->upVote($requestId);

        $this->sendResponse(new JsonResponse([
            'success' => $voted,
        ]));
    }
}
