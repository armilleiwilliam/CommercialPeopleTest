<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Services\JWTcreator;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends AbstractController
{
    /**
     * @Route("/login/login_check", name="league_list_check_ver", methods="GET|POST")
     */
    public function loginCheck(Request $request, UserPasswordEncoderInterface $encoder, JWTcreator $jwtCreator): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();

        $username = $request->query->get('_username');
        $password = $request->query->get('_password');
        $user = $em->getRepository(User::class)->findOneByUsername($username);

        if ($user) {
            if ($encoder->isPasswordValid($user, $password)) {
                return new JsonResponse(["Token" => $jwtCreator->encodeJWT($username)]);
            }
        }
        return new JsonResponse(["Token" => "The credentials are not correct or missing"]);
    }
}
