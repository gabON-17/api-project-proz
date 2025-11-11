<?php

class RegisterModel implements Models
{
   private $connection;
   public function __construct($con)
   {
      $this->connection = $con;
   }

   public function create($body)
   {
      $comand = $this->connection->prepare(
         "INSERT INTO register 
            (student_id, course_id)
         VALUES
            (?, ?)"
      );
      try {
         $comand->execute([
            $body->student ?? null,
            $body->course ?? null
         ]);
         return ["status" => true];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }
   public function findAll()
   {
      $comand = $this->connection->prepare("SELECT * FROM register");

      try {
         $comand->execute();
         $students = $comand->fetchAll(PDO::FETCH_ASSOC);

         return ["status" => true, "data" => $students];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }
   public function dell($id): void {}
}
