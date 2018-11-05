<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * @Route("/")
 */
class ExpressionLanguageController extends Controller
{
    /**
     * @Route("/expressionLanguages", name="Expression_languages", methods="GET|POST")
     */
    public function expressionLanguage(): JsonResponse
    {
        $expressionLanguage = new ExpressionLanguage();

        // list of random expressions
        $expLangOneResult = $expressionLanguage->evaluate('1 == 1');

        $expLangTwoResult = $expressionLanguage->evaluate('18 + 12');

        $expLangThreeResult = $expressionLanguage->evaluate('test == 1', array('test' => 1));

        $expLangFourResult = $expressionLanguage->evaluate('test * test1', array('test' => 4, 'test1' => 7));

        $expLangFiveResult = $expressionLanguage->evaluate('test1 == 2', array('test1' => 5));

        return new JsonResponse(
            array(
                "firstResult" => $expLangOneResult,
                "secondResult" => $expLangTwoResult,
                "thirdResult" => $expLangThreeResult,
                "fourthResult" => $expLangFourResult,
                "fifthResult" => $expLangFiveResult
            )
        );
    }
}
