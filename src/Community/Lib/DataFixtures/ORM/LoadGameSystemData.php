<?php
// src/Community/Lib/DataFixtures/ORM/LoadCampaignData.php

namespace Community\Lib\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Community\Lib\Entity\GameSystem;

class LoadGameSystemData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        $dd5e = new GameSystem();
        $dd5e->setName('Dungeons & Dragons - 5th Edition');
        $manager->persist($dd5e);



        $manager->flush();

        $this->addReference('gameSystem-dd5e', $dd5e);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
