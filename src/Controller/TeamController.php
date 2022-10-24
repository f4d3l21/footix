<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;


class TeamController extends AbstractController
{
    #[Route('/teams', name: 'teams.getAll', methods: ['GET'])]
    public function getAllteam (
        TeamRepository $repository,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        Request $request
    ): JsonResponse {

    // Pagination
    $page = $request->get('page', 1);
    $limit = $request->get('limit', 5);
    $limit = $limit > 20 ? 20 : $limit;
    $teams = $repository -> findwithPagination($page, $limit);
    $teamsJson = $serializer->serialize($teams, 'json');

    return new JsonResponse($teamsJson);
        // $teams = $repository->findAll();
        // $teamsJson = $serializer->serialize($teams, 'json', ['groups' => 'getTeams']);
        // $errors = $validator->validate($teams);
        // if($errors->count() > 0) {
        //     $errorsJson = $serializer->serialize($errors, 'json');
        //     return new JsonResponse($errorsJson, Response::HTTP_BAD_REQUEST, [], true);
        // }
        // return new JsonResponse($teamsJson, Response::HTTP_OK, [], true);
    }

}