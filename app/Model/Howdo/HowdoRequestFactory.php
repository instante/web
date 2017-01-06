<?php

namespace App\Model\Howdo;

use App\Model\IPersister;

class HowdoRequestFactory
{
    /** @var IPersister */
    private $persister;
    
    public function __construct(IPersister $persister)
    {
        $this->persister = $persister;
    }

    /**
     * @param string $title
     * @param string $description
     * 
     * @return HowdoRequest
     */
    public function create($title, $description)
    {
        $request = new HowdoRequest($title, $description);
        
        $this->persister->save($request);
        
        return $request;
    }


}

