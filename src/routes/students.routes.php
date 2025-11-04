<?php

require_once './controllers/students.controller.php';
require_once "./common/interfaces/routes.interface.php";
require_once "./common/middleware/";

class RouterStudent implements Router
{
   private $url;
   private $req;
   private $endpoints;
   private readonly mixed $controller;

   public function __construct($request, $controller)
   {
      $this->req = $request;
      $this->url = $request["REQUEST_URI"];
      $this->controller = $controller;

      $this->endpoints = [
         "createStudents" => "/api/src/server.php/students",
         "getStudents" => "/api/src/server.php/students"
      ];
   }

   public function getEndpoint(): void
   {
      if ($this->url === $this->endpoints["createStudents"] && $this->req["REQUEST_METHOD"] === "POST") {
         MiddlewareCreateStudent::verifyDto($this->req);
         $this->controller->create($this->req);
      } elseif ($this->url === $this->endpoints["getStudents"] && $this->req["REQUEST_METHOD"] === "GET") {
         $this->controller->findAll();
      } else {
         http_response_code(404);
         echo json_encode(array(
            "message" => "Rota não existe",
            "statusCode" => 404
         ));
      }
   }
}
