<?php
// Database.php
//
// This class is responsible ONLY for creating and returning
// a PDO database connection. It uses environment variables
// loaded from the .env file via the config/db_credentials.php file.

class Database
{
    /**
     * Get a PDO connection to the salamander database.
     *
     * @return PDO A configured PDO object ready for queries.
     */
    public static function getConnection(): PDO
    {
        // Load database credentials from the config file
        $config = require __DIR__ . '/../config/db_credentials.php';

        // Extract connection settings
        $host = $config['host'];
        $db = $config['dbname'];
        $user = $config['user'];
        $pass = $config['password'];
        $charset = $config['charset'];

        // DSN (Data Source Name) tells PDO how to connect to the database
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        // PDO options:
        // - Throw exceptions when errors occur
        // - Return rows as associative arrays (column_name => value)
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Create and return the PDO object
        return new PDO($dsn, $user, $pass, $options);
    }
}
