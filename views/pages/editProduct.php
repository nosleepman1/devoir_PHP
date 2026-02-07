
<?php 
$produits=true;
$pageTitle = "Produits - Mon Site";
include '../../header.php'; 
include '../../database/user_db.php';
include '../../database/products_db.php';

if (!isset($_GET['id'])) {
    header('Location: /views/pages/productDatails.php');
}

$product = getById($_GET['id']);

if (session_status() == 'PHP_SESSION_NONE') {
    session_start();
}

?>
<?php include '../../navbar.php'; ?>



<div class="container">

    <h1>Modifier Produit</h1>
    <a href="/views/pages//produits.php" class="btn btn-outline-primary">Retour</a>
    <div class="container">

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>


        <form action="/actions/products/updateProduct_action.php" method="POST">

             <div class="form-group">
                <label for="libelle">Libelle</label>
                <input type="text" class="form-control" name="libelle" value="<?= $product['libelle'] ?>">    
            </div>

            <div class="form-group">
                <label for="Prix">Prix</label>
                <input type="text" class="form-control" name="prix" value="<?= $product['prix'] ?>">    
            </div>

            <div class="form-group">
                <label for="quantite">quantite</label>
                <input type="number" class="form-control" name="quantite" value="<?= $product['quantite'] ?>">    
            </div>

            <div class="form-group mb-3">
                <label for="description">description</label>
                <textarea name="description" class="form-control" value="<?= $product['description'] ?>"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-primary">Modifier produit</button>
        </form>

    </div>

        


</div>