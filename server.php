<?php

require_once "./routes/students.routes.php";
require_once "./middleware/addBody.middleware.php";
require_once "./controllers/students.controller.php";
require_once "./services/students.service.php";
require_once "./models/students.model.php";
require_once "./models/conection.db.php";

class Server
{
   private $request;
   private $models;
   private $controllers;

   public function __construct(array $models, array $controllers)
   {
      $this->request = $_SERVER;
      $this->models = $models;
      $this->controllers = $controllers;
   }

   public function bootstrap()
   {
      $this->request = AddBodyMiddleware::addBory($this->request);
      $routerStudent = new RouterStudent($this->request, $this->controllers["students"]);

      $routerStudent->getEndpoint();

      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST");
      header("Access-Control-Allow-Headers: Content-Type");
      header('Content-Type: application/json');
   }
}

$connection = (new ConnectionMySQL())->getConection();

$studentsModel = new StudentsModel($connection);
$Controller = new StudentsController(new StudentsService($studentsModel));

$server = new Server(
   models: ["students" => $studentsModel],
   controllers: ["students" => $Controller]
);

$server->bootstrap();
