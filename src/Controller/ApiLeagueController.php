<?php

namespace App\Controller;

use App\Repository\LeagueRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/api")
 */
class ApiLeagueController extends Controller
{
    /**
     * @Route("/leaguesList", name="league_list", methods="GET|POST")
     */
    public function leagusList(LeagueRepository $leagueRepository): Response
    {
        $response = new Response();
        $response->setContent(json_encode(["Leagues" => $leagueRepository->findAllListLeagues()]));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/delete/{league}", name="league_delete", methods="GET|POST")
     */
    public function delete(Request $request, $league, LeagueRepository $leagues, TeamRepository $teams): Response
    {
        $response = array("response" => "League not deleted!");
        $leagueEntity = $leagues->findOneBy(['title' => $league]);
        $teamEntity = $teams->findBy(['league' => $leagueEntity]);

        if ($leagueEntity != null) {
            if ($teamEntity == null) {
                $em = $this->getDoctrine()->getManager();
                $em->remove($leagueEntity);
                $em->flush();
                $response["response"] = $league . " - league deleted successfully";
            } else {
                $response["response"] = "It seems there is at least " . count($teamEntity) . " team"
                    . ((count($teamEntity) > 1) ? "s " : "") . " assigned to this league. Reassign
                    all the teams in this league to another league and try again.";
            }
        } else {
            $response["response"] = "The league " . $league . " does not exist.";
        }
        return new JsonResponse($response);
    }
}
