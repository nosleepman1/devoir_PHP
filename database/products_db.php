<?php 

    require 'db_connection.php';



    function create($libelle, $prix, $quantite, $description) {
        global $pdo;

        $sql = "INSERT INTO products (libelle, prix, quantite, description) VALUES (:libelle, :prix, :quantite, :description)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(
            [
                'libelle' => $libelle,
                'prix' => $prix,
                'quantite' => $quantite,
                ':description' => $description
            ]
        );

    }

