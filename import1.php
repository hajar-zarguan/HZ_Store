<?php 

$pdo = new PDO('mysql:host=localhost;dbname=hajar_zarguan_tp_ecommerce', 'root', '');
$initial_products = json_decode(file_get_contents('C:\xampp\htdocs\tp_ecommerce_Zarguan\products.json'), true);

if (is_array($initial_products) || is_object($initial_products))
{

   foreach ($initial_products as $produit) {
    $sku = $produit->sku;
    $pdo->query("INSERT INTO produit(sku, name,type ,price , upc,   shipping,
            description , manufacturer,model, url, image)
         VALUES('$sku', '$produit->name', '$produit->type', '$produit->price', 
         '$produit->upc', '$produit->shipping', '$produit->description', 
         '$produit->manufacturer', '$produit->model', '$produit->url',
          '$produit->image')") ;

    $sku = mysql_last_insert_id();
    foreach ($produit->category as $category) {
    $pdo->query("INSERT INTO `category` (`id_produit`, `id_categorie`, `name`), VALUES( '{$sku}','{$category->id}','{$category->name}') "); }
    }
}

?>