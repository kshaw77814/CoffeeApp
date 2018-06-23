<?php

namespace AppBundle\Repos;

use AppBundle\Entities\Coffee;
use Doctrine\ORM\EntityRepository;


class CoffeeRepo extends EntityRepository
{
    /**
     * @return Coffee
     */
    public function getProducts()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select("c")
            ->from("AppBundle:Coffee","c")
            ->where("c.qtyAvailable > 0")
            ->getQuery()
            ->execute();
    }
}