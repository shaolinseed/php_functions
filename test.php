<?php
//PHP session used to pass answers
session_start();
?>
<!doctype html>
<html>

<head>
  <!-- link the css stylesheet-->
  <link rel="stylesheet" href="styles/main.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Functions</title>
</head>

<body>


    

    <main>
      <!-- create ordered list to hold the question number -->
      <?php
      include "functions.php";
      echo "<p>Function 1</p>";


	var_dump(url_couk("philip@philip.co.uk"));

	echo "<p>Function 2</p>";

	var_dump(count_dirs('C:\xampp\htdocs'));


	echo "<p>Function 3</p>";
	var_dump(get_image_names('C:\Users\Rahim\Desktop\imag_dirs'));


	echo "<p>Function 4</p>";
	var_dump(count_file_type('C:\Users\Rahim\Desktop\imag_dirs', 'jpg'));

	echo "<p>Function 5</p>";
	var_dump(html_date_to_mysql("2015-12-08T15:43"));

	echo "<p>Function 6</p>";
	var_dump(get_exif_data("C:\Users\Rahim\Desktop\coli.jpg"));

	echo "<p>Function 7</p>";
	var_dump(datetime_to_unix_days("1970-05-03T00:00"));

	echo "<p>Function 8</p>";
	var_dump(clean_string("<h1>Test  SJJSparagraph.</h1>"));

	echo "<p>Function 9</p>";
	var_dump(check_sentence("hello i am."));

	echo "<p>Function 10</p>";
    $myArray = $myArray = array ("Entertainment", array("Radio", "Film", array("TV", "Sitcom", "Drama", "Other")));
	echo array_to_list($myArray);

      
      ?>
      
    </main>





</body>

</html>