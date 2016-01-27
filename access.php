<?php
   $key=@$_GET['key']; 
   $al=0;
   $db = new PDO('sqlite:db/article.sqlite'); 
   $result = $db->query("SELECT view FROM article where id='$key'");
   foreach($result as $row)
   { $al=$row['view']+1; }
   $result=$db->query("UPDATE article SET view='$al' where id='$key'");
   $db = NULL; 
   include("article_detail.php");
?>