<?php
 class Conexao {

  private static $instance;

  /**
   * @return PDO
   */
  public static function getInstance() 
  {
      if (!isset(self::$instance)) {
          self::$instance = new PDO("mysql:host=localhost;dbname=guia;charset=utf8", "root", "123123");
          self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      return self::$instance;
  }
}
?>
