<?php

namespace AW\Bundle\GooglePlusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AW\Bundle\GooglePlusBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * HTTP param: continue: where to redirect to after authenticating.
     */
    public function authAction(Request $request)
    {
        $this->requireContinueParam($request);
        // @todo
    }

    public function callbackAction(Request $request)
    {
        // @todo
    }

    private function requireContinueParam(Request $request)
    {
        if (!$request->get('continue')) {
            throw new \AW\Bundle\GooglePlusBundle\Exception('No continue parameter in the request query string');
        }
    }
}
