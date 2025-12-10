<?php
// src/Controllers/SalamanderController.php
//
// The Controller receives a request (from the router),
// asks the Model for data, and then chooses a View to display.
require_once __DIR__ . '/../Models/Salamander.php';
class SalamanderController
{
    /**
     * Controller action to show a list of all salamanders.
     */
    public function index(): void
    {
        // 1. Ask the model for all salamanders
        $salamanders = Salamander::all();
        // 2. Load the view and pass the data to it.
        // We do this by simply including the file. The view
        // can now use the $salamanders variable.
        require __DIR__ . '/../Views/salamanders/index.php';
    }
    /**
     * Controller action to show a single salamander by ID.
     */
    public function show(): void
    {
        // 1. Get the ID from the query string (?id=123)
        $id = $_GET['id'] ?? null;

        // 2. Validate that ID exists and is numeric
        if ($id === null || !is_numeric($id)) {
            http_response_code(400); // Bad Request
            echo '<h1>400 Bad Request</h1>';
            echo '<p>Invalid or missing salamander ID.</p>';
            echo '<p><a href="salamanders">Back to salamanders list</a></p>';
            return;
        }

        // 3. Convert to integer and fetch from database
        $salamander = Salamander::find((int)$id);

        // 4. Check if salamander was found
        if ($salamander === null) {
            http_response_code(404); // Not Found
            echo '<h1>404 Not Found</h1>';
            echo '<p>Salamander with ID ' . htmlspecialchars($id) . ' not found.</p>';
            echo '<p><a href="salamanders">Back to salamanders list</a></p>';
            return;
        }

        // 5. Load the view and pass the salamander data to it
        require __DIR__ . '/../Views/salamanders/show.php';
    }
}
