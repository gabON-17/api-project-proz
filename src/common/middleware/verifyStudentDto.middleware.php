<?php

class MiddlewareCreateStudent
{
   public static function verifyDto($req)
   {
      $body = json_decode($req["BODY"], true);

      if (!$body) {
         http_response_code(403);
         echo json_encode([
            "message" => "Error. Requisição sem body",
            "statusCode" => 403,
         ]);
         exit();
      }

      // if (count($body) > 10) {
      //    http_response_code(403);
      //    echo json_encode([
      //       "message" => "Error. Dados incorretos",
      //       "statusCode" => 403,
      //    ]);
      //    exit();
      // };

      if (!$body["name"] || !$body["birth"] || !$body["cpf"] || !$body["cep"]) {
         http_response_code(403);
         echo json_encode([
            "message" => "Error. Dados incorretos",
            "statusCode" => 403,
         ]);
         exit();
      }

      return;
   }
}
