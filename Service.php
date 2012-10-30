<?php

namespace AW\Bundle\GooglePlusBundle;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;

class Service
{
    private $entityManager;
    private $session;

    public function __construct(EntityManager $entityManager, Session $session)
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
    }

    /**
     * @return AW\Bundle\GooglePlusBundle\Entity\User or null
     */
    public function getUserFromSession()
    {
        $idInSession = $this->session->get('google_plus_id');
        if (!$idInSession) {
            return null;
        }

        return $this->entityManager
            ->getRepository('AWGooglePlusBundle:User')
            ->find($idInSession);
    }
}
