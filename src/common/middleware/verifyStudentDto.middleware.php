<?php

class MiddlewareCreateStudent
{
   public static function verifyDto($req)
   {
      $body = json_decode($req["BODY"]);

      if (!$body) {
         http_response_code(403);
         echo json_encode([
            "message" => "Error. Requisição sem body",
            "statusCode" => 403,
         ]);
         exit();
      }

      print_r($body);
   }
}
