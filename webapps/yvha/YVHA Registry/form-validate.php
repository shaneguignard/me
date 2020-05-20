<?php


$currDateTime = date("Y/m/d h:i");
$currDate = date("Y/m/d");
$uniqueImgKey = date("ymdhis");

$streetNumReq = $streetNameReq = $rentReq = '';
$streetNumErr = '';
$streetNameErr = '';
$rentErr = '';


// Validate Post Form
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include("dbConnection.php");
	// Validate All Form Fields
	// Required
	if (empty($_POST['number'])){
		$streetNumErr = "A street number is required";
	} else {
		$streetNumReq = test_input($_POST['number']);
	}
	
	if (empty($_POST['streetname'])){
		$streetNameErr = "A street name is required";
	} else {
		$streetNameReq= test_input($_POST['streetname']);
	}
	if (empty($_POST['rent'])){
		$rentErr = "A monthly rent amount is required";
	} else {
		$rentReq = test_input($_POST['rent']);
	}
	 
	// Optional items defaults values if left blank
	// Recidency
	
	if(empty($_POST['tenantEnd'])){
		$resident = ''; 
	} else {
		if($_POST['currentResident'] == 'no'){
			$resident = test_input($_POST['tenantEnd']);
		}
		$resident = test_input($_POST['currentResident']);
	}
	
	if(empty($_POST['bias'])){
		$bias = '';
	} else { 
		$bias = test_input($_POST['bias']);
	}
	
	if(empty($_POST['houseRating'])){
		$houseRating = 0;
	} else {
		$houseRating = test_input($_POST['houseRating']);
	}
	
	
	// Acoomodations
	if(empty($_POST['rooms'])){
		$rooms = 0;
	} else {
		$rooms = test_input($_POST['rooms']);
	}
	
	if(empty($_POST['vacancies'])){
		$vacancies = 0;
	} else {
		$vacancies = test_input($_POST['vacancies']);
	}
	
	if(empty($_POST['term'])){
		$term = '';
	} else {
		$term = test_input($_POST['term']);
	}
	
	if(empty($_POST['furniture'])){
		$furnished = '';
	} else {
		$furnished = test_input($_POST['furniture']);
	}
	
	if(empty($_POST['roomRating'])){
		$roomRating = 0;
	} else {
		$roomRating = test_input($_POST['roomRating']);	
	}
	
	// Amenities
	if(empty($_POST['kitchens'])){
		$kitchens = 0;
	} else {
		$kitchens = test_input($_POST['kitchens']);
	}
	
	if(empty($_POST['kitchenRating'])){
		$kitchenRating = 0;
	} else {
		$kitchenRating = test_input($_POST['kitchenRating']);
	}
	
	if(empty($_POST['bathrooms'])){
		$bathrooms = 0;
	} else {
		$bathrooms = test_input($_POST['bathrooms']);
	}
	
	if(empty($_POST['bathroomRating'])){
		$bathroomRating = 0;
	} else {
		$bathroomRating = test_input($_POST['bathroomRating']);
	}
	
	if(empty($_POST['washers'])){
		$washingMachines = 0;
	} else {
		$washingMachines = test_input($_POST['washers']);
	}
	
	if(empty($_POST['dryers'])){
		$dryingMachines = 0;
	} else {
		$dryingMachines = test_input($_POST['dryers']);
	}
	
	if(empty($_POST['launderRating'])){
		$launderRating = 0;
	} else {
		$launderRating = test_input($_POST['launderRating']);
	}
	
	if(empty($_POST['commonAreaRating'])){
		$commonAreaRating = 0;
	} else {
		$commonAreaRating = test_input($_POST['commonAreaRating']);
	}
	
	// Security
	if(empty($_POST['houseSecurity'])){
		$houseSecurity= '';
	} else {
		$houseSecurity = test_input($_POST['houseSecurity']);
	}
	
	if(empty($_POST['roomSecurity'])){
		$roomSecurity = '';
	} else {
		$roomSecurity = test_input($_POST['roomSecurity']);
	}
	
	if(empty($_POST['keyDeposit'])){
		$keyDeposit = '';
	} else {
		$keyDeposit = test_input($_POST['keyDeposit']);
	}
	
	if(empty($_POST['keyDeposityAmount'])){
		$keyDepositFee = 0;
	} else {
		$keyDepositFee = test_input($_POST['keyDeposityAmount']);
	}
	
	
	// Waste Management
	if(empty($_POST['numGarbageBins'])){
		$numGarbageBins = 0;
	} else {
		$numGarbageBins = test_input($_POST['numGarbageBins']);
	}
	
	if(empty($_POST['numRecyclingBins'])){
		$numRecyclingBins = 0;
	} else {
		$numRecyclingBins = test_input($_POST['numRecyclingBins']);
	}
	
	if(empty($_POST['houseKeeper'])){
		$houseKeeper = '';
	} else {
		$houseKeeper = test_input($_POST['houseKeeper']);
	}
	
	if(empty($_POST['houseKeeperAmount'])){
		$houseKeeperFee = 0;
	} else {
		$houseKeeperFee = test_input($_POST['houseKeeperAmount']);
	}
	
	// Accessibility
	if(empty($_POST['accessibility'])){
		$accessibility = '';
	} else { 
		$accessibility = test_input($_POST['accessibility']);
	}
	
	$allComments = join("\n\n", $comments);	
		
	// file name should be something incremental and automated	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		$photoErr = "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
	$photoErr =  "File is not an image.";
	$uploadOk = 0;
	
	}


	// Check if file already exists
	if (file_exists($target_file)) {
	  $photoErr = "Sorry, file already exists.";
	  $uploadOk = 0;
	}

	// Check file size
	// Min file size = 1GB
	$minImageSize = 1000000000;
	if ($_FILES["fileToUpload"]["size"] > $minImageSize ) {
	  $photoErr =  "Sorry, your file is too large.";
	  $uploadOk = 0;
	}
	
	
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	  $photoErr =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	$yvhaPhotoUpload = $target_dir.$uniqueImgKey.".png";
	if ($uploadOk != 0) {
		if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $yvhaPhotoUpload )) {
			$photoErr = "Sorry, there was an error uploading your file.";
		}
	}
	
    $sql = <<<EOF
	INSERT INTO `TheVillage` (
	`timestamp`,
	`number`,
	`street_name`, 
	`rent`, 
	`resident`,
	`house_rating`,
	`cohabitance`,
	`rooms`,
	`vacancies`,
	`lease`,
	`furnished`,
	`room_rating`,
	`kitchens`,
	`kitchen_rating`,
	`bathrooms`,
	`bathroom_rating`,
	`washing_machines`,
	`drying_machines`,
	`laundering_rating`,
	`common_area_rating`,
	`house_security`,
	`room_security`,
	`deposit_required`,
	`deposit_fee`,
	`garbage_bins`,
	`recycling_bins`,
	`house_keeper`,
	`house_keeper_fee`,
	`accessibility`,
	`comments`,
	`photo_upload`
	)
	VALUES (
	'$currDateTime', 
	'$streetNumReq', 
	'$streetNameReq',
	$rentReq,
	'$resident',
	$houseRating,
	'$bias',
	'$rooms', 
	'$vacancies',
	'$term',
	'$furnished',
	$roomRating,
	'$kitchens',
	$kitchenRating,
	'$bathrooms',
	$bathroomRating,
	'$washingMachines',
	'$dryingMachines',
	$launderRating,
	$commonAreaRating,
	'$houseSecurity',
	'$roomSecurity',
	'$keyDeposit',
	$keyDepositFee,
	$numGarbageBins,
	$numRecyclingBins,
	'$houseKeeper',
	$houseKeeperFee,
	'$accessibility',
	'$allComments',
	'$yvhaPhotoUpload'
	)
EOF;
	
	if($uploadOk == 1 and $streetNumErr == '' and $streetNameErr == '' and $rentErr == ''){
		$result = $conn->query($sql);
		if($result === FALSE){
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		if ($result === TRUE){
			echo "New Record Created";
			# How to ensure that entries aren't submitted twice when users refresh the webpage
			# Redirects to gallery once form is validated
			header("Location: gallery.php");
		}
	}
 }
 
 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
	
	
	
?>

