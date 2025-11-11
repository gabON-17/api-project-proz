<?php

class CoursesService
{
   private readonly CoursesModel $couserModel;
   private readonly TeachersModel $teachersModel;

   public function __construct(CoursesModel $modelCourse, TeachersModel $modelTeacher)
   {
      $this->couserModel = $modelCourse;
      $this->teachersModel = $modelTeacher;
   }

   public function create($body)
   {
      if (!$body->teacher) return ["message" => "Error, professor não enviado", "statusCode" => 403];

      $teachers = $this->teachersModel->findAll();
      $teacherID = null;

      for ($i = 0; $i < count($teachers["data"]); $i++) {
         if ($teachers["data"][$i]["cpf"] === $body->teacher) {
            $teacherID = $teachers["data"][$i]["id"];
            break;
         }
      }

      if (!$teacherID) return ["message" => "Error, professor não existe", "statusCode" => 403];

      $body->teacher = $teacherID;

      $data = $this->couserModel->create($body);

      if (!$data["status"]) return ["message" => "Not create", "statusCode" => 403];
      return ["message" => "Create", "statusCode" => 201];
   }

   public function findAll()
   {
      $data = $this->couserModel->findAll();

      if (!$data["status"]) return ["message" => "Not Foud", "statusCode" => 404];
      return ["message" => "OK", "statusCode" => 200, "data" => $data["data"]];
   }
}
