<?php
try{

   $pdo = new PDO('mysql:host=localhost;port=3306;dbname=yousabte_workspace', 
      'yousabte_workspace', 'kD[asKgc%ydC');
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
   echo "PDOException: " . $e->getMessage();
}

