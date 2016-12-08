<?php 

include("includes/connection.php");


	global $con;

	$get_blogs = "SELECT * FROM my_blogs ORDER BY blog_id DESC";
	$run_blogs = mysqli_query($con,$get_blogs);
	while($row_blogs=mysqli_fetch_array($run_blogs)) {

		$blog_id = $row_blogs['blog_id'];
		$blog_title = $row_blogs['blog_title'];
		$content = $row_blogs['blog_content'];
		$blog_img = $row_blogs['blog_img'];
		$file_type = $row_blogs['blog_img_type'];
		$post_date = $row_blogs['blog_date'];

		echo "

		<article class='blog-post post-short'>
			<div class='post-details'>
				<div class='date'>
					<span class='day'>" . date("d", strtotime($row_blogs['blog_date'])) . "</span>
					<span class='month'>" . date("M", strtotime($row_blogs['blog_date'])) . "</span>
				</div>
			</div>
			
			<div class='post-content'>
				<a href='#'><h5>$blog_title</h5></a>
				<span class='meta'>posted by andrew in <a href='#'>digital</a> | <a href='#'>0 comments</a></span>
				<a href='#'><img alt='Blog Post Image' src='img/$blog_img' style='max-width:600px;'/></a>
				<p>
					$content
				</p>
				<a href='/blog-single.php?blog_id=$blog_id' class='button button-small'>Read More <i class='icon arrow_right'></i></a>
			</div>	
		</article><!--end of individual short post-->";
		}

?> 
