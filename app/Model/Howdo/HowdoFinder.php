<?php

namespace App\Model\Howdo;

class HowdoFinder
{
    /** @var HowdoDocumentDao */
    private $howdoDocumentDao;

    /** @var HowdoRequestDao */
    private $howdoRequestDao;

    /** @var RequestUpVoter */
    private $requestUpVoter;

    public function __construct(HowdoDocumentDao $howdoDocumentDao, HowdoRequestDao $howdoRequestDao, RequestUpVoter $requestUpVoter)
    {
        $this->howdoDocumentDao = $howdoDocumentDao;
        $this->howdoRequestDao = $howdoRequestDao;
        $this->requestUpVoter = $requestUpVoter;
    }

    /**
     * Returns array of found documents and requests
     *
     * @param string $keyword
     * @return array
     */
    public function findByKeyword($keyword)
    {
        return [
            'documents' => $this->findDocuments($keyword),
            'requests' => $this->findRequests($keyword),
        ];
    }

    private function findDocuments($keyword)
    {
        $documentEntities = $this->howdoDocumentDao->findByFulltext($keyword);

        return array_map(function (HowdoDocument $item) {
            return [
                'title' => $item->getTitle(),
                'content' => $item->getDocument(),
            ];
        }, $documentEntities);
    }

    private function findRequests($keyword)
    {
        $requestEntities = $this->howdoRequestDao->findByFulltext($keyword);

        return array_map(function (HowdoRequest $item) {
            return [
                'title' => $item->getTitle(),
                'content' => $item->getDescription(),
                'votes' => $item->getVotes(),
                'voted' => $this->requestUpVoter->alreadyVoted($item->getId()),
            ];
        }, $requestEntities);
    }
}

