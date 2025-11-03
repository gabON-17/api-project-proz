<?php

class AddBodyMiddleware
{
   public static function addBory($request)
   {
      if ($request["REQUEST_METHOD"] === 'POST') {
         $request["BODY"] = file_get_contents('php://input');
         return $request;
      }
      exit;
   }
}
