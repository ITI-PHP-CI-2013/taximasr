
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Blog homepage</title>
	</head>
	<body>
		<?php
			foreach($test as $article){
				echo "<div><a href=\"blog-article.php?id={$article['id']}\">{$article['title']}</a></div>";
				echo "<div>{$article['content']}</div>";
				
			}
		?>
	</body>
</html>