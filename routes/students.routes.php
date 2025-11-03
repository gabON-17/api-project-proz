<?php

require './controllers/students.controller.php';

class RouterStudent
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
         "students" => "/api/server.php/students",
      ];
   }

   public function getEndpoint()
   {
      if ($this->url === $this->endpoints["students"]) {
         $this->controller->create($this->req);
      } else {
         http_response_code(404);
         echo json_encode(array(
            "message" => "Rota não existe",
            "statusCode" => 404
         ));
      }
   }
}
