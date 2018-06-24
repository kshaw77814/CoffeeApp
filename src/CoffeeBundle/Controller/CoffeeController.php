<?php

namespace CoffeeBundle\Controller;

use AppBundle\Converters\ModelHelpers;
use CoffeeBundle\Services\ICoffee;
use CoffeeBundle\ViewModels\OrderVM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CoffeeController extends Controller
{

    use ModelHelpers;

    /**
     * @var ICoffee
     */
    private $service;

    /**
     * @var Request
     */
    private $request;

    /**
     * CoffeeController constructor.
     * @param ICoffee $service
     * @param RequestStack $request
     */
    public function __construct(ICoffee $service, RequestStack $request)
    {
        $this->service = $service;
        $this->request = $request->getCurrentRequest();
    }


    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        $errorMessage = "";
        $model = new OrderVM();

        if ($this->request->getMethod() == "POST") {

            $data = $this->request->request->all();

            $order = $this->convertArrayToModel($data, new OrderVM());

            /* The validateModel method is part of our custom form builder and validator not included in this project*/
            $result = $this->validateModel($order);

            if (is_string($result)) {
                $errorMessage = $result;
            } else {
                $result = $this->service->addOrder($order);

                if (is_string($result)) {
                    $errorMessage = $result;
                } else {
                    //order added - redirect to summary route
                    return $this->redirectToRoute("order_summary");
                }
            }
        }

        /* Here we would build the form from the order model and any other functionality needed for a GET request or invalid POST*/

        return $this->render('@Coffee/CoffeeSelection.html.twig', array(
            "model" => $model,
            "errorMessage" => $errorMessage
        ));
    }

    /**
     * @Route("/success", name="order_summary")
     */
    public function summaryAction()
    {
        return $this->render('@Coffee/OrderSummary.html.twig',array());
    }
}
