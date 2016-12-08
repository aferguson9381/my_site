<?php 

include("includes/connection.php");

	global $con;

	$get_blogs = "SELECT * FROM my_blogs ORDER BY blog_id DESC";
	$run_blogs = mysqli_query($con,$get_blogs);
	while($row_blogs=mysqli_fetch_array($run_blogs)) {

    $blog_id = $row_blogs['blog_id'];
    $blog_title = $row_blogs['blog_title'];
    $blog_name = $row_blogs['blog_author'];
    $blog_img = $row_blogs['blog_img'];
    $file_type = $row_blogs['blog_img_type'];
    $post_date = $row_blogs['blog_date'];

    $num_comments = "SELECT * FROM my_blogs_comments WHERE blog_id='$blog_id'";
    $run_num_comm = mysqli_query($con, $num_comments);
    $comments = mysqli_num_rows($run_num_comm);

		echo "

				<article class='blog-post post-short'>
					<div class='post-details'>
						<div class='date'>
							<span class='day'>" . date("d", strtotime($row_blogs['blog_date'])) . "</span>
							<span class='month'>" . date("M", strtotime($row_blogs['blog_date'])) . "</span>
						</div>
					</div>
					
					<div class='post-content'>
						<a href='/blog-single.php?blog_id=$blog_id'><h5>$blog_title</h5></a>
						<span class='meta'>posted by $blog_name | <span style='font-weight:bold; color:#454545;'>$comments comments</span></span>
						<a href='#'><img alt='Blog Post Image' src='img/$blog_img' style='width: 100%; max-width:700px;'/></a>
						<p>
							" . substr($row_blogs['blog_content'], 0, 250) . "...
						</p>
						<a href='/blog-single.php?blog_id=$blog_id' class='button button-small'>Read More <i class='icon arrow_right'></i></a>
					</div>	
				</article><!--end of individual short post-->";
		}

?> 
