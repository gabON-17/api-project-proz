<?php

class RegisterController
{
   private readonly RegisterService $registerService;

   public function __construct(RegisterService $service)
   {
      $this->registerService = $service;
   }

   public function create($req)
   {
      $body = json_decode($req["BODY"]);
      $response = $this->registerService->create($body);

      http_response_code($response["statusCode"]);
      echo json_encode($response);
      exit();
   }

   public function findAll()
   {
      $response = $this->registerService->findAll();
      http_response_code($response["statusCode"]);
      echo json_encode($response);

      exit();
   }
}
