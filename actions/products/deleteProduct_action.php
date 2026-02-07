<?php 

     if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require '../../database/products_db.php';

        $id = intval($_POST['id']);

        $result = delete($id);

        if ($result) {
            header('Location: /views/pages/produits.php');
            exit();
        } else {
            header('Location: /views/pages/produits.php');
            exit();
        }

     }