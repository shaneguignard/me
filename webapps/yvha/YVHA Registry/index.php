<!DOCTYPE html>
<html>
<?php include('form-validate.php'); ?>
<head>
    <title>Renters Submittion Form</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Scales the display to the same resolution on all devices-->
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h1 {
            text-align: center;
            font-weight: 400;
            font-size: 32pt;
            color: #5e5e5e;
        }
        #header{
            padding:20px;
            margin:0;
        }
        body {
            font-family: sans-serif;
            padding:0;
            margin:0;
        }

        form {
            color: #5e5e5e;
            font-weight: 100;
            width: 100%;
            max-width: 800px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            font-size: 16pt;

        }

        input[type='number'],
        input[type='text'],
        input[type='submit'],
		input[type='date'],
        textarea,
        select {
            font-size: 12pt;
            display: table;
            width: 90%;
            margin-bottom: 10px;
            margin-top: 10px;
            padding: 10px;
            border-bottom: 1px solid #5e5e5e;
            border-left: none;
            border-right:none;
            border-top:none; 
        }

        textarea {
            height: 100px;
        }

        input[type='submit'] {
            background: #d22f25;
            border-left: 2px solid #d22f25;
            font-size: 20px;
            border: 0px;
            width: 100%;
        }

        #foo{
            background: #5e5e5e;
            color: black;
            padding: 10px;
        }
        #foo p{
            padding:10px;
            background: white;
            color: #d22f25;
        }
        hr{
            border-color: #d22f25 ;
        }

		hint{
			display:block;
			font-size:12pt;
			color:black;
		}
		
		
		#previousResidencyDates,
		#houseKeeperFee, 
		#keyFee,
		#homeSecurityDetails,
		#roomSecurityDetails,
		#serviceDetails{
			border: 1px solid #d22f25;
			border-radius: 10px;
			padding: 5px;
			margin: 5px;
			display:none;
		}
		.error{
			color:red;
			font-size: 10px;
		}
		#photoUpload{
			border: 2px solid #d22f25;
			border-radius: 10px;
			padding-top: 40px;
			padding-bottom:40px;
			text-align:center;
		}
    </style>

</head>

<body>
    <div id="header">
    <h1>YVHA Housing Review</h1>
        </div>
        <hr>
    <form id='renter' method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' enctype="multipart/form-data">
        <!-- <input type='checkbox' onselect="inputs.forEach(noAnswer);">No Answer -->
		
		<!-- HOUSING DETAILS -->
		<h3>Housing Details</h3>
		Please provide the house number and street name in their respective fields.
        <input name='number' type='text' placeholder="Street Number (Required)" value="<?php echo $streetNumReq; ?>" required>
        <input name='streetname' type='text' placeholder="Street Name (Required)" value="<?php echo $streetNameReq; ?>" required>
        How much do you currently pay per month in rent?
		<input name='rent' type='text' placeholder="Rent Cost Per Month (Requred)" value="<?php echo $rentReq; ?>" required>
		
		<hr>
		
		<!-- RESIDENCY -->
		<h3>Residency</h3>
		Do you currently live at this address?</br>
		<!-- can we make the menu exposure dependent on evaluated state of radio buttons? -->
		<input type='radio' name='currentResident' value='yes' onclick='exposeSubMenu("notResident", "previousResidencyDates")'>Yes<br>
		<input type='radio' name='currentResident' value='no' id='notResident' onclick='exposeSubMenu("notResident", "previousResidencyDates")'>No</br>
		<div id='previousResidencyDates'>
			When did you stop living here? 
			<input name='tenantEnd' type='date' value="<?php echo $resident; ?>">
		</div>
		<input type='radio' name='currentResident' value='never' onclick='exposeSubMenu("notResident", "previousResidencyDates")'>I'd rather not say</br>

		<br>
		
		What are the cohabitance conditions?
        <select name='bias'>
            <option value='female-only'>Female-Only</option>
            <option value='male-only'>Male-Only</option>
            <option value='co-ed'>Co-Ed</option>
        </select>
		
		Overall Quality of House?
		<select name='houseRating'>
			<option value='-1'>Unsatisfactory</option>
			<option value='1'>Satisfactory</option> 
			<option value='2'>Excellent</option>
		</select>
	
		
		<!-- TENANT DETAILS -->
		<h3>Accomodations:</h3>
		How many rooms are rented in the house?
        <input name='rooms' type='text' placeholder='Number of rooms in house' value="<?php echo $rooms; ?>">
  
		Of those rooms, how many of them are currently Vacant?
        <input name='vacancies' type='text' placeholder='Number of Vacancies' value="<?php echo $vacancies; ?>">
       

		What is the typical length of a lease or contract?
        <select name='term'>
            <option value='m2m'>Month to Month</option>
            <option value='1'>1 Month</option>
            <option value='2'>2 Months</option>
            <option value='3'>3 Months</option>
            <option value='4'>4 Months</option>
            <option value='5'>5 Months</option>
            <option value='6'>6 Months</option>
            <option value='7'>7 Months</option>
            <option value='8'>8 Months</option>
            <option value='12'>12 Months</option>
            <option value='16'>16 Months</option>
            <option value='more'>More</option>
        </select>
				
		 Does a room come furnished?</br>
        <input type='radio' name='furniture' value='yes'> Yes</br>
        <input type='radio' name='furniture' value='no'> No</br>
		
		Overall Quality of Room?
		<select name='roomRating'>
			<option value='-1'>Unsatisfactory</option>
			<option value='1'>Satisfactory</option> 
			<option value='2'>Excellent</option>
		</select>
		
		<!-- TENANT DETAILS -->

		<h3>Amenities</h3>
		
		How many kitchen areas are there?
        <input name='kitchens' type='number' placeholder='Number of Kitchens' value="<?php echo $kitchens; ?>">
		Overall Quality of Kitchens?
		<select name='kitchenRating'>
			<option value='-1'>Unsatisfactory</option>
			<option value='1'>Satisfactory</option> 
			<option value='2'>Excellent</option>
		</select>
		
		
		How many common access bathrooms are there?
        <input name='bathrooms' type='number' placeholder='Number of Bathrooms' value="<?php echo $bathrooms; ?>">
		Overall Quality of Bathrooms?
		<select name='bathroomRating'>
			<option value='-1'>Unsatisfactory</option>
			<option value='1'>Satisfactory</option> 
			<option value='2'>Excellent</option>
		</select>
		
		
		How many washing and drying machines are there in the house?
        <input name='washers' type='number' placeholder="Number of Washing Machines" value="<?php echo $washingMachines; ?>">
        <input name='dryers' type='number' placeholder='Number of Drying Machines' value="<?php echo $dryingMachines; ?>">
		Overall Quality of Laundry facilities?
		<select name='launderRating'>
			<option value='-1'>Unsatisfactory</option>
			<option value='1'>Satisfactory</option> 
			<option value='2'>Excellent</option>
		</select>
		
		
		If there are Common Areas, how would you rate their overall quality?
		<select name='commonAreaRating'>
			<option value='-1'>Unsatisfactory</option>
			<option value='1'>Satisfactory</option> 
			<option value='2'>Excellent</option>
		</select>
		
		<!-- SECURITY -->
	
		<h3>Security Details</h3>
		<p>
			What type of security is there for the main door?</br>
			<input type='radio' name='houseSecurity' value='key' onclick="exposeSubMenu('otherHomeSecurity', 'homeSecurityDetails')">Physical Key</br>
			<input type='radio' name='houseSecurity' value='digital' onclick="exposeSubMenu('otherHomeSecurity', 'homeSecurityDetails')">Digital Key Pad</br>
			<input type='radio' name='houseSecurity' value='other' id='otherHomeSecurity' onclick="exposeSubMenu('otherHomeSecurity', 'homeSecurityDetails')">Other</br>
			<div id='homeSecurityDetails'>
				<input type='text' name='comments' placeholder='What other home security systems are being used?'>
			</div>
		</p>
		<p>
			What type of security is there for personal doors? </br>
			<input type='radio' name='roomSecurity' value='key' onclick="exposeSubMenu('otherRoomSecurity', 'roomSecurityDetails')">Physical Key</br>
			<input type='radio' name='roomSecurity' value='digital' onclick="exposeSubMenu('otherRoomSecurity', 'roomSecurityDetails')">Digital Key Pad</br>
			<input type='radio' name='roomSecurity' value='other' id='otherRoomSecurity' onclick="exposeSubMenu('otherRoomSecurity', 'roomSecurityDetails')">Other</br>
			<div id='roomSecurityDetails'>
				<input type='text' name='comments' placeholder='What other room security systems are being used?'>
			</div>
		</p>
			<p>
			Were you required to provide a deposit for your keys?</br>
			<input type='radio' name='keyDeposit' value='yes' id='hasKeyDeposity' onclick='exposeSubMenu("hasKeyDeposity","keyFee")'>Yes</br>
			<input type='radio' name='keyDeposit' value='no'>No</br>
			<div id='keyFee'>
				<input type='number' name='keyDepositAmount' placeholder='Key Deposit Fee Amount' value="<?php echo $keyDepositFee; ?>">
			</div>
		</p>
		
		<!-- WASTE MANAGEMENT -->
		
		<h3>Waste Management</h3>
		How many garbage bins, and recycling bins are there in the house?<br>
		<input type='number' name='numGarbageBins' placeholder='Number of Garbage Bins' value="<?php echo $numGarbageBins; ?>">
		<input type='number' name='numRecyclingBins' placeholder='Number of Recycling Bins' value="<?php echo $numRecyclingBins; ?>">
		
		Are there any house keepers, or cleaners that generally maintain the house?<br>
		<input type='radio' name='housekeeper' value='yes' id="hasHouseKeeper" onclick='exposeSubMenu("hasHouseKeeper","houseKeeperFee")'>Yes</br>
		<input type='radio' name='housekeeper' value='no'>No</br>
		<div id="houseKeeperFee">If this is not included in your monthly rent:
			<input type='number' name='houseKeeperAmount' placeholder='How much does this service cost?' value="<?php echo $houseKeeperFee; ?>">
		</div>
		
		<input type='checkbox' id='isAdditionalServices' onclick='exposeSubMenu("isAdditionalServices", "serviceDetails")'>Additional services not mentioned here?<br>
		<div id='serviceDetails'>
			<textarea name='comments' placeholder='Please describe any additional services that may occur which has not been included in this list.'></textarea>
		</div>
		
		<h3>Acessibility</h3>
		<!-- http://www.ohrc.on.ca/en/part-i-%E2%80%93-freedom-discrimination/housing-4 -->
        <input name='accessibility' type='text' placeholder='Are there any accessibility modifications in the house?' value="<?php echo $accessibility; ?>">
        
		
		<h3>Comments</h3>
		<textarea name='comments' type='text' value="<?php echo $allComments; ?>" placeholder='If there is any additional comments, or notes that you would like to make about the property, landlord, or fellow tenants. Let us know here.'></textarea>
		
		

        <!-- PHOTO Upload -->
		<hr>
		<div id='photoUpload'>
			<h3>Upload a Photo</h3>
			<input type="file" name='fileToUpload'><br>
			<span class='error'><?php echo $photoErr; ?></span>
		</div>
		<!-- 
		In the future, photo metadata will be referenced to 
		ensure accurate most accurate and relevant images are 
		linked with housing profiles 
		-->

		<hr>
		<input name='sumbit' type='submit'>
    </form>
	
    <div id='foo'>
        <!-- Double check with the guys about this. Should be a well scripted message -->
        <p>
            We are collecting information to create a database of all the houses in the village in the effort
            to standardize the housing prices in the village. If you own one of these lovely homes, we would 
            like to hear from you as well. By standardizing the living costs of a room in the village, and finding
            a way to privide a resonable minimum level of living standard and lowest cost to the owner 
            (remember we want to be green too!). We can work together to find a business model that allows
            the income property to support itself. 
        </p>
    </div>
</body>
<script>
function exposeSubMenu(triggerId, subMenuId){
	console.log("Expose "+subMenuId+" if "+triggerId);
	var trigger = document.getElementById(triggerId);
	var subMenu = document.getElementById(subMenuId);
	if(trigger.checked){
		subMenu.style = "display: block";
	}
	else{
		subMenu.style = "display: none";
	}
}
</script>

</html>