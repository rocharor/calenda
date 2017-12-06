<?php
    date_default_timezone_set('America/Sao_Paulo');
    session_start();

    // $host       = 'server-mysql';
    // $user       = 'root';
    // $password   = 'root';
    // $dataBase   = 'calendario_da_paz';
    //
    // $conexao = mysql_connect($host,$user,$password);
    // mysql_query("SET NAMES 'utf8'");
    // mysql_select_db($dataBase);

    $dsn = 'mysql:dbname=calendario_da_paz;host=server-mysql';
    $user = 'root';
    $password = 'root';

    try {
        $conexao = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }

    function __autoload($classname)
    {
        $filename = "classes/".$classname.".class.php";
        include_once($filename);
    }

?>
