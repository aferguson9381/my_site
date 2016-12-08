<?php

function single_blog_post() {

	if(isset($_GET['blog_id'])) {

	global $con;

	$get_id = $_GET['blog_id'];

	$get_posts = "SELECT * FROM my_blogs WHERE blog_id='$get_id'";
	$run_posts = mysqli_query($con,$get_posts);
	$row_posts=mysqli_fetch_array($run_posts);

	$blog_title = $row_posts['blog_title'];
	$blog_name = $row_posts['blog_author'];
	$content = $row_posts['blog_content'];
	$blog_img = $row_posts['blog_img'];
	$file_type = $row_posts['img_type'];

	echo "
		<article class='blog-post long-post'>
		<div class='post-content'>
			<a href='#'><h5>$blog_title</h5></a>
			<span class='meta'>Posted by $blog_name on " . date("M d, Y", strtotime($row_posts['blog_date'])) . " in <a href='#'>Photography</a></span>
			<a href='#'><img alt='Blog Post Image' src='img/$blog_img' /></a>
			<p>
				$content;
			</p>

		</div>	
		</article><!--end of individual short post-->";
		}
	}
  
?>
