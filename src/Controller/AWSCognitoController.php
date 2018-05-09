<?php declare(strict_types=1);

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AWSCognitoController extends Controller
{

    /**
     * @Route("/login", name="cognito_login_redirect")
     * @Method({"GET"})
     */
    public function loginAction()
    {
        $cognitoBaseUrl = 'https://davidweichert.auth.eu-central-1.amazoncognito.com';
        $loginEndpoint = '/login';
        $clientId = '6b6hohnk0onerq1cndj6bottt0';
        $bongustaBaseUrl = 'https://kochrezepte.davidweichert.de';
        $bongustaCallbackEndpoint = '/callback';
        $responseType = 'token';
        $responseType = 'code';
        $scope = 'openid';
        $scope = 'aws.cognito.signin.user.admin';

        $url = $cognitoBaseUrl . $loginEndpoint . '?response_type=' . $responseType . '&client_id=' . $clientId . '&redirect_uri=' . $bongustaBaseUrl . $bongustaCallbackEndpoint . '&scope=' . $scope;

        return new RedirectResponse($url);
    }

    /**
     * @Route("/callback", name="cognito_login_callback")
     * @Method({"GET"})
     */
    public function callbackAction(Request $request)
    {
        $code = $request->get('code');
        $scope = $request->get('scope');
        $url = $request->getContent();
        $content = '<p>'.$code.'</p>';
        $content .= '<p>'.$scope.'</p>';
        $content .= '<p>'.$url.'</p>';

        return new Response($content);
    }
}
