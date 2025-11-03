<?php

require_once "./common/interfaces/models.interface.php";

class StudentsModel implements Models
{
   private readonly mixed $connection;

   public function __construct($connection)
   {
      $this->connection = $connection;
   }

   public function create($body)
   {

      $cpf = isset($body->cpf) ? preg_replace('/[^0-9]/', '', $body->cpf) : null;

      $comand = $this->connection->prepare(
         "INSERT INTO students 
            (name, birth, sex, cpf, address, complement, cep, nearby, city, state, telephone)
         VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
      );
      try {
         $comand->execute([
            $body->name ?? null,
            $body->birth ?? null,
            $body->sex ?? null,
            $cpf,
            $body->address ?? null,
            $body->complement ?? null,
            $body->cep ?? null,
            $body->nearby ?? $body->district ?? null,
            $body->city ?? null,
            $body->state ?? null,
            $body->telephone ?? null,
         ]);
         return ["status" => true];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }

   public function findAll()
   {
      $comand = $this->connection->prepare("SELECT * FROM students");

      try {
         $comand->execute();
         $students = $comand->fetchAll(PDO::FETCH_ASSOC);

         return ["status" => true, "data" => $students];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }

   public function dell($params) {}
}
