<?php

namespace Community\CampaignBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        $campaignRepository = $this->getDoctrine()->getManager()->getRepository('Community:Campaign');
        $campaigns = $campaignRepository->getAll();


        return array('campaigns' => $campaigns);
    }
}
