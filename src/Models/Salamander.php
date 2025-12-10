<?php
// src/Models/Salamander.php
//
// The Model contains all the database logic for salamanders.
// It knows HOW to get the data, but not how to display it.
require_once __DIR__ . '/../Database.php';
class Salamander
{
    /**
     * Get all salamanders from the database.
     *
     * @return array Each element is one row from the salamanders table.
     */
    public static function all(): array
    {
        // Get a PDO connection
        $pdo = Database::getConnection();

        // SQL query to select all salamanders, ordered by name
        $sql = "SELECT id, name, habitat, description
                FROM salamanders
                ORDER BY name ASC";

        // Run the query. query() returns a PDOStatement.
        $stmt = $pdo->query($sql);

        // Fetch all rows as an array of associative arrays
        return $stmt->fetchAll();
    }

    /**
     * Find a single salamander by ID.
     *
     * @param int $id The ID of the salamander to find
     * @return array|null The salamander data as an associative array, or null if not found
     */
    public static function find(int $id): ?array
    {
        // Get a PDO connection
        $pdo = Database::getConnection();

        // SQL query with a placeholder to prevent SQL injection
        $sql = "SELECT id, name, habitat, description
                FROM salamanders
                WHERE id = :id";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind the ID parameter
        $stmt->execute(['id' => $id]);

        // Fetch one row, or false if not found
        $result = $stmt->fetch();

        // Return the row as an array, or null if not found
        return $result ?: null;
    }
}
