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
      $data = $this->studentsModel->findAll();

      if (!$data["status"]) {
         return ["message" => 'Bad Request', "statusCode" => 400];
      }

      return ["message" => 'OK', "statusCode" => 200, "data" => $data["data"]];
   }
}
