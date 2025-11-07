<?php

class StudentsService
{
   private readonly StudentsModel $studentsModel;

   public function __construct(StudentsModel $studentsModel)
   {
      $this->studentsModel = $studentsModel;
   }

   public function create($body)
   {
      $status = $this->studentsModel->create($body);

      if (!$status['status']) {
         return ["message" => 'Not Create', "statusCode" => 403];
      }
      return ["message" => 'Create', "statusCode" => 201];
   }

   public function findAll()
   {
      $status = $this->studentsModel->findAll();

      if (!$status["status"]) {
         return ["message" => 'Bad Request', "statusCode" => 400];
      }
      return ["message" => 'OK', "statusCode" => 200, "status" => $status["data"]];
   }
}
