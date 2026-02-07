<?php 
    require '../../database/products_db.php';
  
    if(!isset($_GET['id'])) {
        header('Location: /');
        exit;
    }

    $product = getById($_GET['id']);

    include '../../header.php';
    include '../../navbar.php';

?>

<h1>Details du produit</h1>

<div class="container">

    <div class="container border rounded-3 p-4 mt-4">
    <h1><?php echo htmlspecialchars($product['libelle']); ?></h1>
    <p><strong>Prix:</strong> <?php echo htmlspecialchars($product['prix']); ?> €</p>
    <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
    </div>

    <div class="d-flex justify-content-between">

        <a href="/views/pages/editProduct.php?id=<?= $product['id']; ?>" class="btn btn-primary mt-3">Modifier </a>
       
        <form action="/actions/products/deleteProduct_action.php" method="POST">
            <input type="hidden" name="id" value="<?= $product['id']; ?>">
            <button type="submit" class="btn btn-danger mt-3">Supprimer </button>
        </form>
        

    </div>

</div>




<?php include '../../footer.php'; ?>


