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
      $data = $this->teacherService->create($body);

      print_r($data);
      exit();
   }

   public function findAll($req)
   {
      $data = $this->teacherService->findAll();

      print_r($data);
      exit();
   }
}
