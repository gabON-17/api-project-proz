<?php

class RouterRegister
{
   private $url;
   private $req;
   private $endpoints;
   private readonly RegisterController $controller;

   public function __construct($request, $controller)
   {
      $this->req = $request;
      $this->url = $request["REQUEST_URI"];
      $this->controller = $controller;

      $this->endpoints = [
         "createRegister" => "/api/src/server.php/register",
         "getRegisters" => "/api/src/server.php/register"
      ];
   }

   public function getEndpoint(): void
   {
      if (
         $this->url === $this->endpoints["createRegister"] && $this->req["REQUEST_METHOD"] === "POST"
      ) {
         $this->controller->create($this->req);
      } elseif (
         $this->url === $this->endpoints["getRegisters"] && $this->req["REQUEST_METHOD"] === "GET"
      ) {
         $this->controller->findAll();
      }
      return;
   }
}
