<?php

namespace App\Controller;

use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ScoreController extends AbstractController
{
    #[Route('/score/team', name: 'score.getAll', methods: ['GET'])]
    public function getAllscores (
        ScoreRepository $repository,
        SerializerInterface $serializer,
        ValidatorInterface $errors
    ): JsonResponse {
        $scores = $repository->findAll();
        $scoresJson = $serializer->serialize($scores, 'json', ['groups' => 'getScores']);

        return new JsonResponse($scoresJson, Response::HTTP_OK, [], true);
    }

    #[Route('/score/team', name: 'score.getAll', methods: ['POST'])]
    public function createScore (
        ScoreRepository $repository,
        SerializerInterface $serializer
    ): JsonResponse {
        $scores = $repository->findAll();
        $scoresJson = $serializer->serialize($scores, 'json', ['groups' => 'getScores']);


        return new JsonResponse($scoresJson, Response::HTTP_OK, [], true);
    }
}
