<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title; ?></title>
		<script>
		$(function(){
		$('#sendComment').click(function(){
		
		$.ajax({
				url: "blog_comment.php", 
				type: "POST",
				data: {
						comment: $('#comment').val()
						},
				success: function(resp){
						
						}
				});
		
		});
	
		});
		</script>

	</head>
	<body>
		<h1><?php echo $title; ?></h1>
		<div><?php echo $content; ?></div>
		<hr>
		<h2>Comments</h2>
		<?php
			foreach($comments as $comment){
				echo "<div style=\"border: solid 1px silver; margin: 10px; padding: 10px;\">$comment</div>";
			}
		?>
		<hr>
		<h2>Post new comment</h2>
		<form method="post" action="blog-comment.php">
			<textarea if="comment" name="comment" cols="50" rows="3"></textarea><br>
			<input type="hidden" name="articleID" value="<?php echo $id; ?>">
			<input type="submit" value="Send comment">
		</form>
	</body>
</html>