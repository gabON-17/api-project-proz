<?php

require_once "./common/interfaces/routes.interface.php";

class RouterTeachers implements Router
{
   private $url;
   private $req;
   private $endpoints;
   private readonly TeachersController $controller;

   public function __construct($request, $controller)
   {
      $this->req = $request;
      $this->url = $request["REQUEST_URI"];
      $this->controller = $controller;

      $this->endpoints = [
         "createTeacher" => "/api/src/server.php/teachers",
         "getTeacher" => "/api/src/server.php/teachers"
      ];
   }

   public function getEndpoint(): void
   {
      if (
         $this->url === $this->endpoints["createTeacher"] && $this->req["REQUEST_METHOD"] === "POST"
      ) {
         $this->controller->create($this->req);
      } elseif (
         $this->url === $this->endpoints["getTeacher"] && $this->req["REQUEST_METHOD"] === "GET"
      ) {
         $this->controller->findAll($this->req);
      }
      return;
   }
}
