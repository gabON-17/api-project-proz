<?php

class Router
{
   private $url;
   private $req;

   public function __construct($request)
   {
      $this->req = $request;
      $this->url = $request["REQUEST_URI"];
   }

   public function getRoter()
   {
      if ($this->url === "/api/api.php/students") {
         echo 'Rota students';
      } elseif ($this->url === "/api/api.php") {
         echo 'Rota Home';
      } else {
         http_response_code(404);
         echo 'Rota não existe';
      }
   }
}
