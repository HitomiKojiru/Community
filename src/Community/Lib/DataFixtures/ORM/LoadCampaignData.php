<?php
// src/Community/Lib/DataFixtures/ORM/LoadCampaignData.php

namespace Community\Lib\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Community\Lib\Entity\Campaign;

class LoadCampaignData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        for ($i=1; $i <= 200; $i++)
        {
            $campaign = new Campaign();
            $campaign->setName('Campaign'.$i);

            $manager->persist($campaign);
        }

        $manager->flush();
    }
}
