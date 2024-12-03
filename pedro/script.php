<?php
// ... (resto do seu código PHP)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ... (resto do seu código PHP)

    // Calcula o custo total
    $total_cost = 0;

    // Calcula o custo das pizzas
    if (isset($_POST['pizza'])) {
        foreach ($_POST['pizza'] as $pizza) {
            switch ($pizza) {
                case 'Margherita':
                    $total_cost += 50;
                    break;
                case 'Calabresa':
                    $total_cost += 25;
                    break;
                case 'Portuguesa':
                    $total_cost += 35;
                    break;
                case 'Vegetariana':
                    $total_cost += 40;
                    break;
            }
        }
    }

    // Calcula o custo da bebida
    switch ($bebida) {
        case 'Coca':
            $total_cost += 12;
            break;
        case 'Suco':
            $total_cost += 8;
            break;
        case 'agua':
            $total_cost += 5;
            break;
        case 'guarana':
            $total_cost += 11;
            break;
        case 'sprite':
            $total_cost += 10;
            break;
    }

    // Calcula o custo da sobremesa
    switch ($sobremesa) {
        case 'Brownie':
            $total_cost += 15;
            break;
        case 'tiramisu':
            $total_cost += 17;
            break;
        case 'pudim':
            $total_cost += 19;
            break;
        case 'bolo':
            $total_cost += 18;
            break;
        case 'mousse':
            $total_cost += 14;
            break;
        case 'sorvete':
            $total_cost += 16;
            break;
    }

    // Exibe o custo total
    echo "<h2>Custo Total: R$ " . $total_cost . "</h2>";

    // ... (resto do seu código PHP)
}