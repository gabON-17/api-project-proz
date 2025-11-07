<?php

class RegisterService
{
   private readonly RegisterModel $registerModel;
   public function __construct(RegisterModel $model)
   {
      $this->registerModel = $model;
   }

   public function create()
   {
      return ["route" => "create"];
   }

   public function findAll()
   {
      return ["route" => "FindALL"];
   }
}
