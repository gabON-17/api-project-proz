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
            (name, description, teacher_id)
         VALUES
            (?, ?, ?)"
      );
      try {
         $comand->execute([
            $body->name ?? null,
            $body->description ?? null,
            $body->teacher,
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
            c.name, c.description, t.teacher_name
         FROM 
            courses c
         JOIN
            teachers t ON c.teacher_id = t.id"
      );

      try {
         $comand->execute();
         $courses = $comand->fetchAll(PDO::FETCH_ASSOC);

         return ["status" => true, "data" => $courses];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }
   public function dell($id) {}
}
