<?php

namespace CoffeeBundle\Models;

use AppBundle\Converters\ModelHelpers;
use AppBundle\Entity\Order;
use CoffeeBundle\ViewModels\CoffeeVM;
use CoffeeBundle\ViewModels\OrderVM;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class CoffeeModel implements ICoffee
{

    use ModelHelpers;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var ICoffee
     */
    private $service;

    /**
     * CoffeeModel constructor.
     * @param EntityManagerInterface $em
     * @param KernelInterface $kernel
     * @param ICoffee $service
     */
    public function __construct(EntityManagerInterface $em, KernelInterface $kernel, ICoffee $service)
    {
        $this->em = $em;
        $this->kernel = $kernel;
        $this->service = $service;
    }


    public function getCoffee()
    {
        try{

            $results = $this->em->getRepository("AppBundle:Coffee")
                ->getAvailableCoffee();

            $coffees = array();

            foreach ($results as $result) {
                $coffees[] = $this->convertModel($result, new CoffeeVM());
            }

            return $coffees;

        }catch (\Exception $ex) {
            error_log($ex->getMessage().PHP_EOL.$ex->getTraceAsString());
            if ($this->kernel->getEnvironment() == 'dev') {
                return $ex->getMessage().PHP_EOL.$ex->getTraceAsString();
            } else {
                return "Sorry, there's been a problem getting the product list";
            }
        }
    }

    public function addOrder(OrderVM $order)
    {
        try{

            $orderEntity = $this->convertModel($order, new Order());

            $coffee = $this->em->getRepository("AppBundle:Coffee")
                ->find($order->getCoffee()->getCoffeeId());

            if(!isset($coffee)) {
                return "Sorry, looks like we've run out of that coffee that you are trying to order";
            }

            $extras = $order->getSugar() > 0 ? $order->getSugar() : "No";
            $extras .= "Sugar and " . $order->getMilk() ? "Milk" : "No Milk";

            $orderEntity->setExtras($extras);

            $rowsAffected = $this->em->getRepository("AppBundle:Coffee")
                ->updateAvailableCoffee($coffee, $coffee->getQtyAvailable()-1);

            if($rowsAffected == 1) {
                $this->em->persist($orderEntity);
                $this->em->flush();
            }

            return $orderEntity->getOrderId();

        }catch (\Exception $ex) {
            error_log($ex->getMessage().PHP_EOL.$ex->getTraceAsString());
            if ($this->kernel->getEnvironment() == 'dev') {
                return $ex->getMessage().PHP_EOL.$ex->getTraceAsString();
            } else {
                return "Sorry, there's been a problem adding the order ";
            }
        }
    }
}