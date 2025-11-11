<?php

class StudentsController
{
   private readonly StudentsService $studentsService;

   public function __construct($service)
   {
      $this->studentsService = $service;
   }

   public function create($req)
   {
      $body = json_decode($req["BODY"]);
      $response = $this->studentsService->create($body);

      echo print_r($body);
      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }

   public function findAll()
   {
      $response = $this->studentsService->findAll();
      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }
}
