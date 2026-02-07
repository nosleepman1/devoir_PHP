
<?php 
$produits=true;
$pageTitle = "Produits - Mon Site";
include '../../header.php'; 
include '../../database/user_db.php';

if (session_status() == 'PHP_SESSION_NONE') {
    session_start();
}

?>
<?php include '../../navbar.php'; ?>



<div class="container">

    <h1>Ajouter Produit</h1>

    <div class="container">

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($_SESSION['error']); ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>


        <form action="/actions/products/addProduct_action.php" method="POST">

             <div class="form-group">
                <label for="libelle">Libelle</label>
                <input type="text" class="form-control" name="libelle">    
            </div>

            <div class="form-group">
                <label for="Prix">Prix</label>
                <input type="text" class="form-control" name="prix">    
            </div>

            <div class="form-group">
                <label for="quantite">quantite</label>
                <input type="number" class="form-control" name="quantite">    
            </div>

            <div class="form-group mb-3">
                <label for="description">description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter produit</button>
        </form>

    </div>

        


</div>