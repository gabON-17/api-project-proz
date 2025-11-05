<?php

require_once "./controllers/courses.controller.php";

class RouterCourses
{
   private $url;
   private $req;
   private $endpoints;
   private readonly CoursesController $controller;

   public function __construct($request, $controller)
   {
      $this->req = $request;
      $this->url = $request["REQUEST_URI"];
      $this->controller = $controller;

      $this->endpoints = [
         "createCourses" => "/api/src/server.php/courses",
         "getCourses" => "/api/src/server.php/courses"
      ];
   }

   public function getEndpoint(): void
   {
      if (
         $this->url === $this->endpoints["createCourses"] && $this->req["REQUEST_METHOD"] === "POST"
      ) {
         $this->controller->create($this->req);
      } elseif (
         $this->url === $this->endpoints["getCourses"] && $this->req["REQUEST_METHOD"] === "GET"
      ) {
         $this->controller->findAll();
      }
      return;
   }
}
