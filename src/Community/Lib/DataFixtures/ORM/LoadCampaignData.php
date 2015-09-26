<?php
// src/Community/Lib/DataFixtures/ORM/LoadCampaignData.php

namespace Community\Lib\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Community\Lib\Entity\Campaign;

class LoadCampaignData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        for ($i=1; $i <= 10; $i++)
        {
            $campaign = new Campaign();
            $campaign->setName('Campaign'.$i);
            $campaign->setGameSystem($this->getReference('gameSystem-dd5e'));

            $manager->persist($campaign);
        }

        $manager->flush();
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
