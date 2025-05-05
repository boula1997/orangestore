<?php
echo "<pre>\n";
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=yousabte_workspace', 'yousabte_workspace', 'kD[asKgc%ydC');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Insert logic
if (isset($_POST['title'], $_POST['subtitle'], $_POST['description'])) {
    // Insert into products table
    $sql = "INSERT INTO products (created_at, updated_at) VALUES (NOW(), NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $product_id = $pdo->lastInsertId();

    // Insert into product_translations
    $sql2 = "INSERT INTO product_translations 
        (product_id, locale, title, subtitle, description, created_at, updated_at)
        VALUES (:product_id, 'ar', :title, :subtitle, :description, NOW(), NOW())";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute([
        ':product_id' => $product_id,
        ':title' => $_POST['title'],
        ':subtitle' => $_POST['subtitle'],
        ':description' => $_POST['description']
    ]);
}

// Delete logic
if (isset($_POST['delete'], $_POST['product_id'])) {
    // First delete translations (if no ON DELETE CASCADE)
    $stmt = $pdo->prepare("DELETE FROM product_translations WHERE product_id = :pid");
    $stmt->execute([':pid' => $_POST['product_id']]);

    // Then delete product
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :pid");
    $stmt->execute([':pid' => $_POST['product_id']]);
}

// Fetch and display
$stmt = $pdo->query("SELECT p.id, pt.title, pt.subtitle, pt.description
                     FROM products p
                     LEFT JOIN product_translations pt 
                     ON p.id = pt.product_id
                     WHERE pt.locale = 'ar'");
?>
<html>
<body>
<table border="1" cellpadding="8">
<tr><th>Title</th><th>Subtitle</th><th>Description</th><th>Actions</th></tr>
<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>";
    echo htmlspecialchars($row['title']);
    echo "</td><td>";
    echo htmlspecialchars($row['subtitle']);
    echo "</td><td>";
    echo htmlspecialchars($row['description']);
    echo "</td><td>";
    echo '<form method="post"><input type="hidden" ';
    echo 'name="product_id" value="'.$row['id'].'">'."\n";
    echo '<input type="submit" value="Del" name="delete">';
    echo "</form></td></tr>\n";
}
?>
</table>

<h3>Add New Product (Arabic)</h3>
<form method="post">
    <p>Title: <input type="text" name="title" required></p>
    <p>Subtitle: <input type="text" name="subtitle" required></p>
    <p>Description: <textarea name="description" required></textarea></p>
    <input type="submit" value="Add Product">
</form>

<p><a href="../HTML/Dashboard.php">Dashboard</a></p>
</body>
</html>
