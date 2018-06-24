<?php

namespace AppBundle\Repos;

use AppBundle\Entity\Coffee;
use Doctrine\ORM\EntityRepository;

class CoffeeRepo extends EntityRepository
{

    /**
     * @param mixed $id
     * @param null $lockMode
     * @param null $lockVersion
     * @return null|Coffee
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select("c")
            ->from("AppBundle:Coffee","c")
            ->where("c.qtyAvailable > 0")
            ->andWhere("c.archived = 0")
            ->andWhere("c.coffeeId = :coffeeId")
            ->setParameter("coffeeId", $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return Coffee[]
     */
    public function findAll()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select("c")
            ->from("AppBundle:Coffee","c")
            ->where("c.qtyAvailable > 0")
            ->andWhere("c.archived = 0")
            ->getQuery()
            ->execute();
    }

    /**
     * @return Coffee[]
     */
    public function getAvailableCoffee()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select("c")
            ->from("AppBundle:Coffee","c")
            ->where("c.qtyAvailable > 0")
            ->andWhere("c.archived = 0")
            ->getQuery()
            ->execute();
    }

    public function updateAvailableCoffee(Coffee $coffee, int $newQty)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->update("AppBundle:Coffee", "c")
            ->set("c.availableQty", $newQty)
            ->where("c.CoffeeId = :coffee")
            ->setParameter("coffee", $coffee)
            ->getQuery()
            ->execute();
    }
}