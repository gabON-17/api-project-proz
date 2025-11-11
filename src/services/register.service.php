<?php

class RegisterService
{
   private readonly RegisterModel $registerModel;
   private readonly StudentsModel $studentsModel;
   public function __construct(RegisterModel $modelRegister, StudentsModel $modelStudents)
   {
      $this->registerModel = $modelRegister;
      $this->studentsModel = $modelStudents;
   }

   public function create($body)
   {
      $user = $body->user;


      $data = $this->registerModel->create($body);
      return ["data" => $data, "statusCode" => 200];
   }

   public function findAll()
   {
      $data = $this->registerModel->findAll();
      if (!$data["status"] || !$data["data"]) return ["message" => 'Usuários não encontrados', "statusCode" => 404,];

      return ["message" => 'OK', "statusCode" => 200, "data" => $data["data"]];
   }
}
