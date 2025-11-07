<?php

class CoursesModel implements Models
{
   private readonly mixed $connection;

   public function __construct($connection)
   {
      $this->connection = $connection;
   }

   public function create($body)
   {
      $comand = $this->connection->prepare(
         "INSERT INTO courses 
            (name, description, creation_date, teacher_id)
         VALUES
            (?, ?, ?, ?)"
      );
      try {
         $comand->execute([
            $body->name ?? null,
            $body->description ?? null,
            $body->creation_date ?? null,
            $body->teacher_id,
         ]);
         return ["status" => true];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }

   public function findAll()
   {
      $comand = $this->connection->prepare(
         "SELECT 
            c.name, c.description, c.creation_date, c.teacher_id
         FROM 
            courses c"
      );

      try {
         $comand->execute();
         $students = $comand->fetchAll(PDO::FETCH_ASSOC);

         return ["status" => true, "data" => $students];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }
   public function dell($id) {}
}
