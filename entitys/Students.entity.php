<?php

class StudentEntity
{
   public readonly string $name;
   public readonly DateTime $nacimento;
   public readonly string $sex;
   public readonly string $cpf;
   public readonly string $address;
   public readonly string $complement;
   public readonly int $cep;
   public readonly string $district;
   public readonly string $city;
   public readonly string $state;
   public readonly int $telephone;
   public readonly int | null $course;
   public readonly DateTime $createAt;
   public readonly DateTime $updateAt;
}
