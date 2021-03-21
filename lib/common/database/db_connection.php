<?php
  class Database {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $instance = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
      }
      return self::$instance;
    }
  }
?>

