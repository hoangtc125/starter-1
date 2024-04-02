<?php
$routes = [
    '/user/{id}',                // Mẫu 1
    '/product/{category:\d+}',   // Mẫu 2
    '/post/{slug:[a-zA-Z0-9-]+}',// Mẫu 3
];

foreach ($routes as $route) {
    echo "Route: $route<br/>";

    if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
        $parameterNames = $matches[1];
        $constraints = $matches[2] ?? [];

        echo "Parameter Names: " . implode(', ', $parameterNames) . "<br/>";

        foreach ($constraints as $constraint) {
            echo "Constraint: $constraint<br/>";
        }
    } else {
        echo "No parameters found.<br/>";
    }

    echo "<br/>";
}
