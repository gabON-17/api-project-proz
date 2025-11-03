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
}
