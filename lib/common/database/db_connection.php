<?php
  class Database {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $instance = @mysqli_connect ('localhost', 'id16637642_techadmin', '57IJL!=zicWVUi#R', 'id16637642_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
      }
      return self::$instance;
    }
  }
?>

