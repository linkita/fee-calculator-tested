<?php

namespace Linkita\ApiBundle\Controller;
use Linkita\App\Aplication\CalculateFee;
use Linkita\App\Aplication\CalculateFeeRequest;
use Linkita\ApiBundle\Exception\ApiException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ApiController extends Controller
{
    /**
     * @Route("/ping")
     * @Method("GET")
     * @ApiDoc(
     *     description="Check if the service is alive",
     *     section="Is it alive"
     * )
     * @return Response
     */
    public function pingAction()
    {
        return new Response('pong' , Response::HTTP_OK, [
            'Content-Type' => 'application/json'
        ]);
    }


    public function feeAction(Request $request)
    {

        try {

            /** @var CalculateFee $calculateFee */
            $calculateFee = $this->container->get(CalculateFee::class);
            $calculateFee->execute($request);

        } catch (Exception $exception) {
            throw ApiException::fromException($exception);
        }


        return new Response('OK' , Response::HTTP_OK, [
            'Content-Type' => 'application/json'
        ]);
    }

}