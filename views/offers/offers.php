<?php $rand = rand();
if(isset($_POST['postQueryString'])){
	if(!empty($_POST['postQueryString'])){
		$string = ltrim($_POST['postQueryString'], '&');
		$elements = explode("&", $string);
		$formArray = Array();
		foreach($elements as $element){
			 $tempArr = explode("=",$element);
			 $formArray[$tempArr[0]] = $tempArr[1];
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="views/css/en/style.css?rand=<?php echo $rand; ?>" rel="stylesheet" type="text/css" />
	<script src="views/js/jquery.min.js?rand=<?php echo $rand; ?>"  type="text/javascript" /></script>
	<script src="views/js/offers.js?rand=<?php echo $rand; ?>"  type="text/javascript" /></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
	<title>Expedia</title>
</head>

<body>
	<div class='left-wrapper'>
		<form>
			<ul class="form-style-1">
			    <label>City<label><input type="text" name="destinationCity" id="destinationCity" class="field-divided" value="<?php if(isset($formArray['destinationCity'])){echo $formArray['destinationCity'];}?>"/>
			    <br />
			    
				<label>Date From</label><input type="text" name="minTripStartDate" id="minTripStartDate" class="field-divided" placeholder="YYYY-mm-dd" value="<?php if(isset($formArray['minTripStartDate'])){echo ltrim($formArray['minTripStartDate'],":");}?>" /><br />
				<label>Date To</label><input type="text" name="maxTripStartDate" id="maxTripStartDate" class="field-divided" placeholder="YYYY-mm-dd" value="<?php if(isset($formArray['maxTripStartDate'])){echo ltrim($formArray['maxTripStartDate'],":");}?>" /><br />
			    
				<label>Length of Stay<label><input type="text" name="lengthOfStay" id="lengthOfStay" class="field-divided" placeholder="1" value="<?php if(isset($formArray['lengthOfStay'])){echo $formArray['lengthOfStay'];}?>" />
			    <br />
				
			    <label>Star Rating From</label>
			        <select name="minStarRating" id="minStarRating" class="field-divided">
						<option value="">-select-</option>
						<?php 
						for($i=1;$i<=5;$i+=0.5){ ?>
							<option <?php if(isset($formArray['minStarRating']) && $formArray['minStarRating'] == $i){echo "selected";}?> value=<?php echo $i;?>><?php echo $i; ?></option>
							<?php
						}
						?>
			        </select>
					
				<label>Star Rating From</label>
			        <select name="maxStarRating" id="maxStarRating" class="field-divided">
						<option value="">-select-</option>
						<?php 
						for($i=1;$i<=5;$i+=0.5){ ?>
							<option <?php if(isset($formArray['maxStarRating']) && $formArray['maxStarRating'] == $i){echo "selected";}?> value=<?php echo $i;?>><?php echo $i; ?></option>
							<?php
						}
						?>
			        </select>
					
				<label>Total Rate From</label><input type="text" name="minTotalRate" id="minTotalRate" class="field-divided" value="<?php if(isset($formArray['minTotalRate'])){echo $formArray['minTotalRate'];}?>" /><br />
				<label>Total Rate To</label><input type="text" name="maxTotalRate" id="maxTotalRate" class="field-divided" value="<?php if(isset($formArray['maxTotalRate'])){echo $formArray['maxTotalRate'];}?>" /><br />
				
				<label>Guest Rating From</label><input type="text" name="minGuestRating" id="minGuestRating" class="field-divided" value="<?php if(isset($formArray['minGuestRating'])){echo $formArray['minGuestRating'];}?>" /><br />
				<label>Guest Rating To</label><input type="text" name="maxGuestRating" id="maxGuestRating" class="field-divided" value="<?php if(isset($formArray['maxGuestRating'])){echo $formArray['maxGuestRating'];}?>" /><br />
			    <br />
			        <input type="button" value="Search" onclick="search()" />
					<input type="button" value="Reset" onclick="reset1()" />
			</ul>
		</form>
	</div>
	<div class='right-wrapper'>
		<?php if(!empty($offers)){
				if(isset($offers['offers']['Hotel']) and !empty($offers['offers']['Hotel'])){
					$hotels = $offers['offers']['Hotel'];
					echo "<ul>";
					foreach($hotels as $hotel){
						$hotelInfo = $hotel['hotelInfo'];
						$hotelPricingInfo = $hotel['hotelPricingInfo'];
						$hotelUrls = $hotel['hotelUrls'];
						$destination = $hotel['destination'];
						?>
						<li>
							<img src=<?php echo $hotelInfo['hotelImageUrl'];?> />
							<h4><?php echo $hotelInfo['hotelName']; ?></h4>
							<h6><strike><?php echo $hotelPricingInfo['currency']." ".$hotelPricingInfo['crossOutPriceValue'];?></strike><span>  <?php echo $hotelPricingInfo['currency']." "; echo $hotelPricingInfo['crossOutPriceValue']-$hotelPricingInfo['averagePriceValue'];?></span></h6>
							<p>
								<label>(<?php echo $hotelInfo['hotelReviewTotal']; ?> reviews)</label><br />
								<span>In <?php echo $destination['city']; ?></span>
								<a href="<?php echo urldecode($hotelUrls['hotelInfositeUrl'])	;?>" target="_blank">read more</a>
							</p>
						</li>
						<?php
					}
					echo "</ul>";
				}else{
					echo "<div>No results found!</div>";
				}
			}else{
				echo "<div>No results found!</div>";
			}
		?>
	</div>
	<form method="POST" action="/?action=filter" name="hiddenForm" id="hiddenForm">
		<input type="hidden" name="postQueryString" id="postQueryString">
	</form>
</body>

</html>
