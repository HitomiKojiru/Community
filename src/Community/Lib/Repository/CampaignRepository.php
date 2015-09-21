<?php
namespace Community\Lib\Repository;

use Doctrine\ORM\EntityRepository;

class CampaignRepository extends EntityRepository
{
    public function getAll($offset = 0, $limit = 10)
    {
        return $this->getEntityManager()
                    ->createQuery('SELECT c FROM Community:Campaign c')
                    ->setMaxResults($limit)
                    ->setFirstResult($offset)
                    ->getResult();
    }
}
