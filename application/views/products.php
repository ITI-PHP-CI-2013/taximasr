<html>

<body>

<?php  

foreach($products as $id => $name){?>
<div style="">
<a href='<?php echo base_url("categories/products/$id"); ?>' ><?php echo $name; ?></a>
</div>
		<?php } ?>
<?php  //echo base_url('categories/products/$id'); 
//echo "<br>";
 //echo site_url('categories/products'); //to add index.php in the url

  ?>
</body>

</html>