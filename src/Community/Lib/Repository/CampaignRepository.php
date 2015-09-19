<?php
namespace Community\Lib\Repository;

use Doctrine\ORM\EntityRepository;

class CampaignRepository extends EntityRepository
{
    public function getAll()
    {
        return $this->getEntityManager()
                    ->createQuery('SELECT c FROM Community:Campaign c')
                    ->getResult();
    }
}
