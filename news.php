<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>news</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="news.css" /> 
		<link rel="stylesheet" href="videos.css" />
		<link rel="stylesheet" href="main.css" />
		<script src="https://kit.fontawesome.com/cd21e51899.js" crossorigin="anonymous"></script>
		<style>
			#header{
				background: #fff;
			}
			#features{
				background: #d1eaf8f0;
			}
			.header a i{
				color: #000;
			}
		</style>
	</head>
	<body class="is-preload">
		

		<!-- Wrapper -->
			<div id="wrapper">

					<?php
					$servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$dbname = "gstdb";
					
					$conn = new mysqli($servername, $db_username, $db_password, $dbname);
					
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
					// ... Your file upload handling code ...
					
					?>
					
					
					<body class="homepage is-preload">
					<div id="page-wrapper">
						<!-- Wrapper -->
						<div id="wrapper">
							
							<!-- Header -->
							<header class="header" id="header">
								
								<h1>NEWS</h1>
								
            						<a href="homenav.html"><i class="fa fa-home" aria-hidden="true"></i></a>
							</header>
					
							<!-- Features -->
							<section id="features">
								<div class="container">
									<div class="row aln-center">
										<?php
										// Fetch data from the database
										$sql = "SELECT article_id, title, img, description FROM news"; // Corrected "artical_id" to "article_id"
										$result = $conn->query($sql);
					
										if ($result === false) {
											// Check if there was an error with the query
											echo "Error: " . $conn->error;
										} else if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												$article_id = $row["article_id"];
												$title = $row["title"];
												$image_data = $row["img"];
												$description = $row["description"];
												
												echo '<div class="col-4 col-6-medium col-12-small">';
												echo '<section>';
												// Display the title
												echo '<h3>' . $title . '</h3>';
												echo '</header>';
												// Display the image
												echo '<a href="#" class="image featured"><img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="' . $title . '" /></a>';
												echo '<header>';
												
												// Display the description
												echo '<p>' . $description . '</p>';
												// Add a "Continue Reading" button that links to a next page
												echo '<a href="single1.php?article_id=' . $article_id . '" class="button">Continue Reading</a>';
												echo '</section>';
												echo '</div>';
											}
										}
										?>
									</div>
								</div>
							</section>
						</div>
					
						<!-- Scripts -->
						<script src="assets/js/jquery.min.js"></script>
						<script src="assets/js/jquery.dropotron.min.js"></script>
						<script src="assets/js/browser.min.js"></script>
						<script src="assets/js/breakpoints.min.js"></script>
						<script src="assets/js/util.js"></script>
						<script src="assets/js/main.js"></script>
					</body>
					</html>
					