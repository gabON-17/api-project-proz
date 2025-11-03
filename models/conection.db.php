<?php

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class ConnectionMySQL
{
   protected static $conection;

   public function __construct()
   {
      $driver = $_ENV['DB_DRIVER'];
      $nameDB = $_ENV['DB_NAME'];
      $user = $_ENV['DB_USERNAME'];
      $password = $_ENV['DB_PASSWORD'];
      $port = $_ENV['DB_PORT'];
      $host = $_ENV['DB_HOST'];

      try {
         $dsn = "$driver:host=$host;port=$port;dbname=$nameDB;charset=utf8";

         self::$conection = new PDO($dsn, $user);

         self::$conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
         self::$conection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
   }

   public static function getConection()
   {
      if (!self::$conection) {
         new ConnectionMySQL();
      }

      return self::$conection;
   }
};
