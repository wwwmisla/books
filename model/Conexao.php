<?php

class Conexao {

    private static $servername = "ec2-54-85-56-210.compute-1.amazonaws.com";
    private static $username = "uefyjhafmjskno";
    private static $password = "51c6b623a649f6739b3162d8f044b034636c0771032ca0b17ac2b782fa8dadb5";
    private static $dbname = "dtp34i2o6qu2q";
    private static $erro = "";
    private static $data = null;
    private static $conn = null;

    public static function getErro() {
        $message = self::$erro;
        self::$erro = "";
        return $message;
    }

    public static function getData() {
        $data = self::$data;
        self::$data = null;
        return $data;
    }

    public static function getLastId() {
        return self::$conn
                ->query("SELECT LAST_INSERT_ID();")
                ->fetchColumn();
    }

    public static function isConnected() {
        if (self::$conn == null) {
            return self::connect();
        }
        return true;
    }

    public static function exec($sql) {
        if (self::isConnected()) {
            try {
                return self::$conn->query($sql);
            } catch (PDOException $ex) {
                self::$erro = "Erro ao executar: " . $ex->getMessage();
            } catch (Exception $ex) {
                self::$erro = "Erro genérico: " . $ex->getMessage();
            }
        }
        return false;
    }

    public static function execWithReturn($sql) {
        if (self::isConnected()) {
            try {
                $result = self::$conn->query($sql);
                return self::fetchResult($result);
            } catch (PDOException $ex) {
                self::$erro = "Erro ao consultar: " . $ex->getMessage();
            } catch (Exception $ex) {
                self::$erro = "Erro genérico: " . $ex->getMessage();
            }
        }
        return false;
    }
    
    public function __destruct() {
        self::$conn = null;
    }

    private static function fetchResult($result){
        if ($result->rowCount() > 0) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
            self::$data = $result->fetchAll();
            return true;
        } else {
            self::$erro = "Nenhum registro encontrado!";
            return false;
        }
    }
    
    private static function connect() {
        try {
            self::$conn = new PDO("pgsql:host=" . self::$servername .
                    ";dbname=" . self::$dbname . ";port=5432",
                    self::$username,
                    self::$password);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            self::$erro = "Falha na conexão com o banco de dados: " . $e->getMessage();
            self::$conn = null;
            return false;
        }
    }

}