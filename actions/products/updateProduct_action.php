<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require '../../database/products_db.php';

        $id = intval($_POST['id']);
        $libelle = $_POST['libelle'];
        $prix = floatval($_POST['prix']);
        $quantite = intval($_POST['quantite']);
        $description = $_POST['description'];

        if($prix < 0 || $prix > 20000000 || $quantite < 5 || $quantite > 100) {
            $_SESSION['error'] = "Le prix et la quantité doivent être des valeurs positives.";
            header('Location: /views/pages/editProduct.php?id=' . $id);
            exit();
        }

        if(strlen($description) < 250) {
            $_SESSION['error'] = "La description doit contenir au moins 250 caractères.";
            header('Location: /views/pages/editProduct.php?id=' . $id);
            exit();
        }

        $result = update($id, $libelle, $prix, $quantite, $description);

        if ($result) {
            header('Location: /views/pages/produits.php');
            exit();
        } else {
            header('Location: /views/pages/editProduct.php?id=' . $id);
            exit();
        }
    } else {
        header('Location: /views/pages/produits.php');
        exit();
}