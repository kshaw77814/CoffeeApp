<?php

namespace CoffeeBundle\Models;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class CoffeeModel implements ICoffee
{

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


    public function getProducts()
    {
        try{


        }catch (\Exception $ex) {
            error_log($ex->getMessage().PHP_EOL.$ex->getTraceAsString());
            if ($this->kernel->getEnvironment() == 'dev') {
                return $ex->getMessage().PHP_EOL.$ex->getTraceAsString();
            } else {
                return "Sorry, there's been a problem getting the product list";
            }
        }
    }

    public function addOrder()
    {
        // TODO: Implement addOrder() method.
    }

}