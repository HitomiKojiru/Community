<?php

namespace Community\CampaignBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Community\Lib\Collection\CampaignCollection;

use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\RouteRedirectView;
use FOS\RestBundle\View\View;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CampaignController extends FOSRestController
{
    /**
     * List all campaigns.
     *
     * @Annotations\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing campaigns.")
     * @Annotations\QueryParam(name="limit", requirements="\d+", default="5", description="How many campaigns to return.")
     *
     * @Annotations\View()
     *
     * @param Request               $request      the request object
     * @param ParamFetcherInterface $paramFetcher param fetcher service
     *
     * @return array
     */
    public function getCampaignsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        $offset = $paramFetcher->get('offset');
        $start = null == $offset ? 0 : $offset + 1;
        $limit = $paramFetcher->get('limit');

        $campaignRepository = $this->getDoctrine()->getManager()->getRepository('Community:Campaign');
        $campaigns = $campaignRepository->getAll($offset, $limit);

        return new CampaignCollection($campaigns, $offset, $limit);
    }

    /**
     * Get a single campaign.
     *
     * @Annotations\View(templateVar="campaign")
     *
     * @param Request $request the request object
     * @param int     $id      the note id
     *
     * @return array
     *
     * @throws NotFoundHttpException when note not exist
     */
    public function getCampaignAction(Request $request, $id)
    {
        $campaignRepository = $this->getDoctrine()->getManager()->getRepository('Community:Campaign');
        $campaign = $campaignRepository->find($id);

        if (false === $campaign)
        {
            throw $this->createNotFoundException("Campaign does not exist.");
        }

        $view = new View($campaign);
        $group = $this->container->get('security.context')->isGranted('ROLE_API') ? 'restapi' : 'standard';
        $view->getSerializationContext()->setGroups(array('Default', $group));

        return $view;
    }
}
