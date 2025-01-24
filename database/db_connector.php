<?php
     require_once __DIR__ . '/../vendor/autoload.php';

     use Illuminate\Database\Capsule\Manager as DB;
     use Dotenv\Dotenv;

     // Cargar variables de entorno desde el archivo .env
     $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
     $dotenv->load();

     $capsule = new DB();

     // Agregar la configuración de la conexión a la base de datos
     $capsule->addConnection([
          'driver'    => 'mysql',
          'host'      => $_ENV['DB_HOST'],
          'database'  => $_ENV['DB_NAME'],
          'username'  => $_ENV['DB_USER'], // Cambiado de 'user' a 'username'
          'password'  => $_ENV['DB_PASSWORD'],
          'charset'   => 'utf8',
          'collation' => 'utf8_unicode_ci',
          'prefix'    => '',
     ]);

     // Hacer que Capsule esté disponible globalmente
     $capsule->setAsGlobal();
     $capsule->bootEloquent();
