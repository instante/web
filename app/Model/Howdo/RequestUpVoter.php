<?php

namespace App\Model\Howdo;

use App\Model\IPersister;
use Nette\Http\Session;

class RequestUpVoter
{
    const SESSION_SECTION = 'request_voted';

    /** @var HowdoRequestDao */
    private $howdoRequestDao;

    /** @var Session */
    private $session;

    /** @var IPersister */
    private $persister;

    /**
     * @param HowdoRequestDao $howdoRequestDao
     * @param Session $session
     * @param IPersister $persister
     */
    public function __construct(HowdoRequestDao $howdoRequestDao, Session $session, IPersister $persister)
    {
        $this->howdoRequestDao = $howdoRequestDao;
        $this->session = $session;
        $this->persister = $persister;
    }

    /**
     * @param int $requestId
     *
     * @return bool
     */
    public function upVote($requestId)
    {
        if (!$this->alreadyVoted($requestId)) {
            $howdoRequest = $this->howdoRequestDao->findById($requestId);
            $howdoRequest->addVote();

            $this->persister->flush();

            $this->setVoted($requestId);
            return true;
        }

        return false;
    }

    public function alreadyVoted($requestId)
    {
        return $this->getSessionSection()->offsetExists($requestId);
    }

    private function setVoted($requestId)
    {
        $this->getSessionSection()->offsetSet($requestId, true);
    }

    private function getSessionSection()
    {
        return $this->session->getSection(self::SESSION_SECTION);
    }
}

