<?php

class TeachersService
{
   private readonly TeachersModel $couserModel;
   public function __construct(TeachersModel $model)
   {
      $this->couserModel = $model;
   }

   public function create($body)
   {
      $data = $this->couserModel->create($body);

      if (!$data["status"]) return ["message" => "Not create", "statusCode" => 401];
      return ["message" => "Create", "statusCode" => 201];
   }

   public function findAll()
   {
      $data = $this->couserModel->findAll();

      if (!$data["status"]) return ["message" => "Not Foud", "statusCode" => 404];
      return ["message" => "OK", "statusCode" => 200, $data["data"]];
   }
}
