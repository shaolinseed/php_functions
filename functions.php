<?php

/*
Function 1
Name: url_couk
Description: Checks that the supplied URL is correctly formatted and is a .co.uk domain.
Parameter1: The URL to check
Return: boolean value - true if the URL is valid and the domain is .co.uk otherwise false
(HINT: test this function with URLs that start http and https.)
*/

/**
 * Checks that the supplied URL is correctly formatted and is a .co.uk domain
 * Returns true if the given email string is correctly formatted .co.uk email
 *
 * @param string   $email - .co.uk email to be validated
 * 
 * @return bool   true if email is valid .co.uk email otherwise false
 */ 

function url_couk($email){
	// Check if email is invalid or email does not end with ".co.uk"
	if ((!filter_var($email, FILTER_VALIDATE_EMAIL)) or (substr($email, -6) != ".co.uk")){
		//if invalid or last 6 characters are not ".co.uk" return false
		return false;
	}
	// Passed all the checks (valid email) so return true
	return true;
}

/*
Function 2
Name: count_dirs
Description: Counts the number of directories in a given path but not subdirectories
Parameter1: The path to the given location to check
Return: integer value - the number of directories found.
(HINT: You will need to set up a directory structure to test this function. Set up more than one option. 
Your function should assume that there is NOT a trailing slash in the path so
 the path should be something like path/to/test and not path/to/test/)
*/

/**
 * Counts the number of directories in a given path but not subdirectories
 * Returns the directory count at given path as an integer
 *
 * @param string   $path - given location to count directories but not subdirectories at
 * 
 * @return int   $dirCount - the count of found directories at the given path
 */ 

function count_dirs($path){
	//initialize directory count to 0
	$dirCount = 0;
	//glob function used to find all files with a . followed by any file extension to miss subdirectories 
	//store output in $files variable
	$files = glob($path . "\*.*");
	//if $files variable is not empty
	if ($files) {
		//set the directory count for each item in $files array
		$dirCount = count($files);
	}
	//return the count of directories to the function ouput
	return $dirCount;
}

/*
Function 3
Name: get_image_names
Description: Return an array of names of all image files in a given path. Should check for .png, .gif, .jpg and .jpeg files
Parameter1: The path to the given location to check
Return: Array of file names including the file extensions.
(HINT: Again you will need to set up some files to test. Your function should assume that there is NOT a trailing slash in the path so the path should be something like path/to/test and not path/to/test/)
*/

/**
 * Return an array of names of all image files in a given path (checks for .png,.gif,.jpg,.jpeg)
 *
 * @param string   $path - given location to find image file names at
 * 
 * @return array   $imagesNames - return array storing the found image file names
 */ 

//create get_image_names function that takes a $path (given location to get image names from)
function get_image_names($path){
	//glob function used with GLOB_BRACE to store pathnames matching different file extensions in $imagePaths
	$imagePaths = glob($path . "\*{gif,png,jpg,jpeg}", GLOB_BRACE);
	//for each element in imagePaths array
	foreach ($imagePaths as $value) {
		//store each filename in new array imageNames array using basename function to return only the trailing name component of the path
		$imageNames[] = basename($value);
	}
	//return the $imageNames array
	return $imageNames;
}


/*
Function 4
Name: count_file_type
Description: Returns the number of files in a given path with a specific file extension. If no file extension is provided then a .php file is assumed to be the default value
Parameter1: The path to the location to check
Parameter2: The file extension to count - .php if no extension provided. Note: file extensions should be provided without leading dots e.g. jpeg not .jpeg
Return: Integer value - The number of files found in the path with the appropriate file extension
(HINT: As before you will need to set up a structure to check the function - set up multiple options for testing. Path naming rules as above)
*/

/**
 * counts the number of file types in a directory
 * Returns the number of files in a given path with a specific file extension defaulting to php if not file type given
 *
 * @param string   $path - given location to count the specified file type at
 * @param string   $file_extension - given file extension to count (defaults to php if nothing given)
 * 
 * @return int the count of the found number of files in the given path
 */ 

function count_file_type($path, $file_extension = "php"){
	//return the count of the array returned from passing the path with relevant file extension to the glob function
	return count(glob($path . "\*." . $file_extension));
}

/*
Function 5
Name: html_date_to_mysql
Description: converts a date-time returned from an HTML form to a date-time in MySQL format
Parameter1: The date-time to be converted
Return: The date-time in MySQL format
(HINT: You will need to look up the format for both date-time in HTML and MySQL)
*/

/**
 * converts a date-time in html format to a date-time in mySQL format
 * Returns the date-time in mySQL format
 *
 * @param string   $htmlDateTime - html date time formatted string. format YYYY-MM-DDTHH:MM
 * 
 * @return string $mySqlDateTime - mySQL date time formatted string. format YYYY-MM-DD hh:mm:ss
 */ 

function html_date_to_mysql($htmlDateTime){
	//convert into mySQL
	//replace the T character with a blank space and concatenate :00 to add the seconds
	//store in variable $sql_date_time
	$mySqlDateTime = str_replace("T", " ", $htmlDateTime) . ":00";

	//returns the date-time mySQL format
	return ($mySqlDateTime);
}




/*
Function 6
Name: get_exif_data
Description: Returns an associative array of exif data for a given image file
Parameter1: The path to the image file
Return: An array of exif data contained within the specified image file
(HINT: This will not work for all image files but you are provided with some test images with data in the appropriate
 format. You may like to test this function with images from your mobile phone to see what data is uploaded along with
  any image you share on social media!)
  */

/**
 * Returns an associative array of exif data for a given image file
 *
 * @param string   $imgPath - path to the image to find the exif data of
 * 
 * @return array - array of the exif data found in the associated file
 */ 

//create function get_exif_data which takes in an imgPath
function get_exif_data($imgPath){
	/*
	use of PHP built in function exif_read_data which reads exif headers from an image
	exif_read_data returns an associative array where the:
	-array indexes are header names
	-array values are the associated exif value to that header;
	*/
	//return exif_read_data function with passed image path
	return exif_read_data($imgPath);
}
/*
Function 7
Name: datetime_to_unix_days
Description: Converts a date and time in HTML datetime-local format to the number of full days since the Unix Epoch time
Parameter1: The datetime to convert in YYYY-MM-DDTHH:mm  format
Return: Integer value representing the total number of days since the Unix Epoch time.
(HINT: You will need to find out what the "Unix Epoch" time is and how to get the get the relevant value. You will also have to 
do some (very basic) maths. The datetime-local format does not include second so you can assume that the input value is always 0 seconds)
*/

/**
 * Converts a date and time in HTML datetime-local format to the number of full days since the Unix Epoch time (January 1st 1970)
 *
 * @param string   $htmlDateTime - string containing the date and time in HTML datetime-local format YYYY-MM-DDTHH:mm  
 * 
 * @return int - integer holding the number of full days since the unix epoch time
 */ 

function datetime_to_unix_days($htmlDateTime){
	//set timezone to UTC to account for clock change in UK which gives the time a 1 hour error on epoch time
	date_default_timezone_set('UTC');

	//return the number of days calculated by using function strtotime to get the number of seconds from the epoch to given date
	//divide the total number of seconds by 60 (seconds) * 60 (minutes) * 24 (hours) to get the number of days
	return strtotime($htmlDateTime) / (60*60*24);

}
/*
Function 8
Name: clean_string
Description: Removes any HTML code from the input string, removes any spaces and converts all to lower case
Parameter1: The string to clean
Return: The cleaned string
(HINT: For example the input "<h1>Hello World</h1>" will return "helloworld")
*/

/**
 * Removes any HTML code from the input string, removes any spaces and converts all to lower case
 *
 * @param string   $dirty - the string to be cleaned
 * 
 * @return string - $clean - the cleaned string (removed html code, spaces and converted to lower case)
 */ 

function clean_string($dirty){
	//use strip_tags PHP function to strip the HTML code from the $dirty string
	//store in variable $clean (cleaned output string)
	$clean = strip_tags($dirty);
	//convert the string to lowercase
	$clean = strtolower($clean);
	//remove spaces in the string using the str_replace function
	$clean = str_replace(' ', '', $clean);
	//return the cleaned output string
	return $clean;

}

/*
Function 9
Name: check_sentence
Description: Checks that a sentence starts with a capital letter and ends with a full stop
Parameter1: The string to check.
Return: String - The corrected sentence
(HINT: If the input string already ends with a full stop an additional full stop should not be added. The input “i 
think therefore I am” should return “I think therefor I am.” The input “run rabbit run.” Should return “Run 
//rabbit run.” and not “Run rabbit run..”)
*/

/**
 * Checks that a sentence starts with a capital letter and ends with a full stop
 * if it doesn't add caps at start and fullstop at end
 * 
 * @param string   $sentence - the string check for capital letter at start and full stop at the end
 * 
 * @return string - $correctedSentence - the corrected sentence with capital letter at start and full stop at the end
 */ 


//function check_sentence takes 1 parameter $sentence which is a sentence to be checked
//check / add capital letter at start and full stop at the end if necessary
function check_sentence($sentence){
	//capitalise the first character in the string and store in $correctedSentence
	$correctedSentence = ucfirst($sentence);
	//if the string does not have a full stop at the end
	if ($correctedSentence[-1] != "."){
		//add a full stop "." to the end of the $correctedSentence
		$correctedSentence = $correctedSentence . ".";
	}
	//return the corrected sentence with capital first letter and 1 full stop at the end
	return $correctedSentence;

	
	

}
/*
Function 10
Name: array_to_list
Description: Returns a HTML formatted string comprising of unordered lists based on an input array. 
If the input array is multidimensional each level of the array should produce a sublist.
Parameter1: The array to be converted into a set of lists
Return: A string containing the appropriate HTML code
(HINT: DO NOT USE THE ECHO STATEMENT! Return the string from the function.
The array $myArray = array ("Fred", "Burt", "Tom") should return a single string as follows
*/

/**
 * Returns a HTML formatted string comprising of unordered lists based on an input array. 
 * If the input array is multidimensional each level of the array should produce a sublist.
 * 
 * need to recursively call this function to account for multidimensional arrays
 * 
 * 
 * @param array   $array - the array to be converted to a set of list
 * 
 * @return string - $htmlString - the string containing the relevant HTML code with the lists
 */ 

function array_to_list($array){
	//initialize the output string
	$htmlString = "";
	//append <ul> tag to the output string
	$htmlString = $htmlString . "<ul>";

	//foreach item in the given $array
	foreach ($array as $value){
		//if current element is an array 
		if (is_array($value)){
			//append a <li> tag to the output string
			$htmlString = $htmlString . "<li>";
			//append the recursive call of this function array_to_list passing the current array $value
			$htmlString = $htmlString . array_to_list($value);
		} 
		//if the current item is a string
		else {
			//append the current value surrounded by <li> </li>
			$htmlString = $htmlString . "<li>" . $value . "</li>";
		}
	}
	//append the ending </ul> closing tag
	$htmlString = $htmlString . "</ul>";
	//return the output string
	return $htmlString;
	
}
?>