<?php

interface Models
{
   public function create(CreateStudentDto $body);
   public function findALl();
   public function dell(int $id);
}
