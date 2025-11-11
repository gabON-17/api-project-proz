<?php

class TeachersService
{
   private readonly TeachersModel $teacherModel;
   public function __construct(TeachersModel $model)
   {
      $this->teacherModel = $model;
   }

   public function create($body)
   {
      $data = $this->teacherModel->create($body);

      if (!$data["status"]) return ["message" => "Not create", "statusCode" => 401];
      return ["message" => "Create", "statusCode" => 201];
   }

   public function findAll()
   {
      $data = $this->teacherModel->findAll();
      echo json_encode($data);
      exit();
      if (!$data["status"]) return ["message" => "Not Foud", "statusCode" => 404];
      return ["message" => "OK", "statusCode" => 200, "data" => $data["data"]];
   }
}
