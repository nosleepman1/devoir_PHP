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

    function update($id, $libelle, $prix, $quantite, $description) {
        global $pdo;

        $sql = "UPDATE products SET libelle = :libelle, prix = :prix, quantite = :quantite, description = :description WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(
            [
                'id' => $id,
                'libelle' => $libelle,
                'prix' => $prix,
                'quantite' => $quantite,
                ':description' => $description
            ]
        );
    }

    function delete($id) {
        global $pdo;

        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }



    function getAll() {
        global $pdo;

        $sql = "SELECT * FROM products";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }


    function getById($id) {
        global $pdo;

        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }