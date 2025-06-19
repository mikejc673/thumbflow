<?php
/**
 * Classe Database - Gestion de la connexion à la base de données
 * Implémentation du pattern Singleton
 */
class Database {
    private static $instance = null;
    private $conn;
    
    // Paramètres de connexion à la base de données
    private $host = 'localhost';
    private $db_name = 'thumbflow_db';
    private $username = 'root';
    private $password = 'root';
    
    /**
     * Constructeur privé (pattern Singleton)
     */
    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->exec("SET NAMES utf8");
        } catch(PDOException $e) {
            echo "Erreur de connexion: " . $e->getMessage();
        }
    }
    
    /**
     * Méthode pour obtenir l'instance unique de la classe
     * @return Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Obtenir la connexion PDO
     * @return PDO
     */
    public function getConnection() {
        return $this->conn;
    }
    
    /**
     * Exécuter une requête SQL
     * @param string $query - Requête SQL
     * @param array $params - Paramètres pour la requête préparée
     * @return PDOStatement
     */
    public function query($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            echo "Erreur d'exécution de requête: " . $e->getMessage();
            return false;
        }
    }
}
?>
