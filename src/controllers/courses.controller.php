<?php

class CoursesController
{
   private readonly CoursesService $coursesService;

   public function __construct(CoursesService $service)
   {
      $this->coursesService = $service;
   }

   public function create($req)
   {
      $body = json_decode($req["BODY"]);
      $response = $this->coursesService->create($body);

      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }

   public function findAll()
   {
      $response = $this->coursesService->findAll();

      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }
}
