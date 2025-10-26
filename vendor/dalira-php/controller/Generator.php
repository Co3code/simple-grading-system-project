<?php

if ($argc < 3) {
    echo "Usage: composer create-controller ControllerName ModelName\n";
    exit(1);
}

$controllerName = ucfirst($argv[1]);
$modelName = ucfirst($argv[2]);

// Check if the model file exists
$modelPath = getcwd() . "/app/Models/{$modelName}.php";

if (!file_exists($modelPath)) {
    echo "Error: The model '{$modelName}' does not exist in app/Models.\n";
    exit(1);
}

$controllerContent = <<<PHP
<?php

namespace app\Controllers;

use config\DBConnection;
use app\Models\\$modelName;

class {$controllerName}
{
    private \$$modelName;

    public function __construct()
    {
        \$db = new DBConnection();
        \$this->$modelName = new $modelName(\$db);
    }
    
    // Add your custom controllers below to handle business logic.
}
PHP;

$path = getcwd() . "/app/Controllers/{$controllerName}.php";

if (!file_exists(dirname($path))) {
    mkdir(dirname($path), 0777, true);
}

if (!file_exists($path)) {
    file_put_contents($path, $controllerContent);
    echo "{$controllerName}.php created successfully in app/Controllers\n";
} else {
    echo "{$controllerName}.php already exists. Skipping...\n";
}
