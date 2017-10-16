<?php

namespace Linkita\ApiBundle\Controller;

use InvalidArgumentException;
use Linkita\ApiBundle\Exception\ApiBadRequestException;
use Linkita\App\Application\CalculateFee;
use Linkita\App\Application\CalculateFeeRequest;
use Linkita\ApiBundle\Exception\ApiException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Throwable;

class ApiController extends Controller
{
    /**
     * @Route("/ping")
     * @Method("GET")
     * @ApiDoc(
     *     description="Check if the service is alivess",
     *     section="Is it alive"
     * )
     * @return JsonResponse
     */
    public function pingAction()
    {
        return new JsonResponse('pong', Response::HTTP_OK, [
            'Content-Type' => 'application/json'
        ]);
    }

    /**
     * @Route("/fee/product/{productId}/payment_mode/{paymentMode}/consumption/{consumption}/power/{power}")
     * @Method("GET")
     * @ApiDoc(
     *     description="Calculate an estimated fee for the given product, payment mode and consumption",
     *     section="Calculate Fee",
     *     requirements={
     *          {"name"="productId",   "dataType"="string", "description"="'H' or 'DH'"},
     *          {"name"="paymentMode", "dataType"="string", "description"="'Prepayment' or 'Postpayment'"},
     *          {"name"="consumption", "dataType"="string", "description"="'flat, 'house' or 'castle'"},
     *          {"name"="power",       "dataType"="float", "description"="3.4"},
     *     },
     * )
     * @param Request $request
     * @return JsonResponse
     * @throws ApiBadRequestException|ApiException
     */
    public function feeAction(Request $request)
    {

        try {

            $calculatePriceRequest = new CalculateFeeRequest(
                $request->get('productId'),
                $request->get('paymentMode'),
                $request->get('consumption'),
                $request->get('float')
            );

            /** @var CalculateFee $calculateFee */
            $calculateFee = $this->container->get(CalculateFee::class);

            $fee = $calculateFee->execute($calculatePriceRequest);

            return new JsonResponse($fee, Response::HTTP_OK, [
                'Content-Type' => 'application/json'
            ]);

        } catch (InvalidArgumentException $exception) {
            throw ApiBadRequestException::fromException($exception);
        } catch (Throwable $throwable) {
            throw ApiException::fromException($throwable);
        }
    }
}
