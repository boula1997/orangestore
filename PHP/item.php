<?php
echo "<pre>\n";
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=Orange',
     'root', '');
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->query("SELECT * FROM items");
if ( isset($_POST['name']) && isset($_POST['source'])
      && isset($_POST['description'])) {
    $sql = "INSERT INTO items (name, source, description)
               VALUES (:name, :source, :description)";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':source' => $_POST['source'],
        ':description' => $_POST['description']));
}  

if ( isset($_POST['delete']) && isset($_POST['item_id']) ) {
    $sql = "DELETE FROM items WHERE item_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['item_id']));
}
?>


<html>
<body><table border="1">
<?php
$stmt = $pdo->query("SELECT name, source, description, item_id FROM items");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo($row['name']);
    echo("</td><td>");
    echo($row['source']);
    echo("</td><td>");
    echo($row['description']);
    echo("</td><td>");
    echo('<form method="post"><input type="hidden" ');
    echo('name="item_id" value="'.$row['item_id'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("\n</form>\n");
    echo("</td></tr>\n");
}
?>
</table>




<p><a href="../HTML/Dashboard.php?coustmer_id=<?php echo number_format($_GET['coustmer_id']);?>"> Dahboard    </p>



</html>