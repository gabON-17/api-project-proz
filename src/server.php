<?php

require_once "./routes/students.router.php";
require_once "./routes/teachers.router.php";
require_once "./routes/courses.router.php";

require_once "./common/middleware/addBody.middleware.php";

require_once "./controllers/students.controller.php";
require_once "./controllers/teachers.controller.php";
require_once "./controllers/courses.controller.php";

require_once "./services/students.service.php";
require_once "./services/teachers.service.php";
require_once "./services/courses.service.php";

require_once "./models/students.model.php";
require_once "./models/teachers.model.php";
require_once "./models/courses.model.php";
require_once "./models/connection/conection.db.php";

use Dotenv\Dotenv;

require __DIR__ . '../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Server
{
   private $request;
   private $controllers;

   public function __construct(array $controllers)
   {
      $this->request = $_SERVER;
      $this->controllers = $controllers;
   }

   public function bootstrap()
   {
      $this->request = AddBodyMiddleware::addBory($this->request);

      $routerStudent = new RouterStudent($this->request, $this->controllers["students"]);
      $routerTeacher = new RouterTeachers($this->request, $this->controllers["teachers"]);
      $routerCourser = new RouterCourses($this->request, $this->controllers["courses"]);

      $routerCourser->getEndpoint();
      $routerTeacher->getEndpoint();
      $routerStudent->getEndpoint();

      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST");
      header("Access-Control-Allow-Headers: Content-Type");
      header('Content-Type: application/json');
   }
}

$connection = (new ConnectionMySQL())->getConection();

$studentsModel = new StudentsModel($connection);
$teacherModel = new TeachersModel($connection);
$coursesModel = new CoursesModel($connection);

$ControllerStudent = new StudentsController(new StudentsService($studentsModel));
$ControllerTeacher = new TeachersController(new TeachersService($teacherModel));
$ControllerCourses = new CoursesController(new CoursesService($coursesModel));

$server = new Server(
   controllers: [
      "students" => $ControllerStudent,
      "teachers" => $ControllerTeacher,
      "courses" => $ControllerCourses
   ]
);

$server->bootstrap();
