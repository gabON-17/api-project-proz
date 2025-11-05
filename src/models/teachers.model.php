<?php

class TeachersModel implements Models
{
   private $connection;

   public function __construct($connection)
   {
      $this->connection = $connection;
   }

   public function create($body)
   {

      $cpf = isset($body->cpf) ? preg_replace('/[^0-9]/', '', $body->cpf) : null;

      $comand = $this->connection->prepare(
         "INSERT INTO teachers 
            (name, sex, cpf, telephone)
         VALUES
            (?, ?, ?, ?)"
      );
      try {
         $comand->execute([
            $body->name ?? null,
            $body->sex ?? null,
            $cpf,
            $body->telephone ?? null
         ]);
         return ["status" => true];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }

   public function findAll()
   {
      $comand = $this->connection->prepare("SELECT * FROM teachers");

      try {
         $comand->execute();
         $teachers = $comand->fetchAll(PDO::FETCH_ASSOC);

         return ["status" => true, "data" => $teachers];
      } catch (PDOException $e) {
         return ["status" => false];
      }
   }
   public function dell($id) {}
}
