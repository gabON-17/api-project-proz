<?php

class TeachersController
{
   private readonly TeachersService $teacherService;

   public function __construct(TeachersService $service)
   {
      $this->teacherService = $service;
   }

   public function create($req)
   {
      $body = json_decode($req["BODY"]);
      $response = $this->teacherService->create($body);

      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }

   public function findAll($req)
   {
      $response = $this->teacherService->findAll();

      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }
}
