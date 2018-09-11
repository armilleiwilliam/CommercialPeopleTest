<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\League;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiTeamController extends Controller
{
    /**
     * @Route("/getTeams/{league}", name="api_list_league", methods="GET|POST")
     */
    public function getTeams($league, TeamRepository $teamRepository): Response
    {
        $responseContent = array("response" => "League not existing");
        $findLeague = $this->getDoctrine()->getRepository(League::class)->findByTitle($league);

        // check if the leauge exists
        if ($findLeague != null) {

            // if the league is not empty I add the list and its content
            if (!empty($teamRepository->findTeamsByLeagueId($findLeague))) {
                $responseContent = $teamRepository->findTeamsByLeagueId($findLeague);
            } else {
                $responseContent["response"] = "League empty";
            }
        }

        $response = new Response();
        $response->setContent(json_encode(["ListOfTeams" => $responseContent]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * @Route("/newTeam/{title}/{league}/{city}/{web}", name="team_new_add", methods="GET|POST")
     */
    public function newTeam($title, $city = null, $web = null, $league, TeamRepository $teams): Response
    {
        $response = array("response" => "Team not added, check you have put the right data please. 
                        Team and League value can not be empty!");

        if ($title !== "" && $league !== "" && $title != null && $league != null) {
            $em = $this->getDoctrine()->getManager();
            $leagueExistingCheck = $this->getDoctrine()->getRepository(League::class)->findOneByTitle($league);
            $teamExistingCheck = $teams->findOneByTitle($title);

            if ($teamExistingCheck == null) {
                if ($leagueExistingCheck != null) {

                    $team = new Team();
                    $team->setTitle($title);
                    $team->setLeague($leagueExistingCheck);
                    $team->setCity($city);
                    $team->setWeb($web);
                    $em->persist($team);
                    $em->flush();
                    $response["response"] = $title . " added successfully.";
                } else {
                    $response["response"] = $league . " not existing, team not added. Choose an existing league please.";
                }
            } else {
                $response["response"] = "Team already existing, check the name of the team please.";
            }
        }
        return new JsonResponse($response);
    }

    /**
     * @Route("/editTeam/{name}/{league}/{city}/{web}", name="api_team_edit", methods="GET|POST")
     */
    public function editTeam($name, $league, $city = null, $web = null, TeamRepository $teams): Response
    {
        $response = array("response" => "Team not added, check you have put the right data please. 
                        Team and League value can not be empty!");

        // Check if league and team names are given
        if ($league !== "" && $name !== "" && $league != null && $name != null) {
            $em = $this->getDoctrine()->getManager();
            $leagueExistingCheck = $this->getDoctrine()->getRepository(League::class)->findOneByTitle($league);
            $teamExistingCheck = $teams->findOneByTitle($name);

            if ($teamExistingCheck != null) {
                if ($leagueExistingCheck != null) {
                    $teamExistingCheck->setTitle($name);
                    $teamExistingCheck->setLeague($leagueExistingCheck);
                    $teamExistingCheck->setCity($city);
                    $teamExistingCheck->setWeb($web);
                    $em->persist($teamExistingCheck);
                    $em->flush();
                    $response["response"] = $name . " updated successfully";
                } else {
                    $response["response"] = "Please, add an existing league.";
                }
            } else {
                $response["response"] = $name . " not existing.";
            }
        }
        return new JsonResponse($response);
    }

    /**
     * @Route("/teamDelete/{team}", name="api_team_delete_new", methods="GET|POST")
     */
    public function delete($team, TeamRepository $teams): Response
    {
        $response = array("response" => "Team not deleted!");
        $teamEntity = $teams->findOneByTitle($team);

        if ($teamEntity !== null) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($teamEntity);
            $em->flush();
            $response["response"] = $team . " - team deleted successfully";
        } else {
            $response["response"] = "The team " . $team . " does not exist.";
        }
        return new JsonResponse($response);
    }
}
