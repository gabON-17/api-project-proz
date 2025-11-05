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
      $data = $this->coursesService->create($body);

      print_r($data);
      exit();
   }

   public function findAll()
   {
      $data = $this->coursesService->findAll();

      print_r($data);
      exit();
   }
}
