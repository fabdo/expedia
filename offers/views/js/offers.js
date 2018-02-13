function reset1(){
	window.location.href = '/offers';
}

function search(){

	var destinationCity = $('#destinationCity').val();
	var minTripStartDate = $('#minTripStartDate').val();
	var maxTripStartDate = $('#maxTripStartDate').val();
	var lengthOfStay = $('#lengthOfStay').val();
	var minStarRating = $('#minStarRating').val();
	var maxStarRating = $('#maxStarRating').val();
	var minTotalRate = $('#minTotalRate').val();
	var maxTotalRate = $('#maxTotalRate').val();
	var minGuestRating = $('#minGuestRating').val();
	var maxGuestRating = $('#maxGuestRating').val();
	
	var queryString = "";
	
	if(destinationCity != ''){
		queryString += "&destinationCity="+destinationCity;
	}
	
	if(minTripStartDate != ''){
		queryString += "&minTripStartDate=:"+minTripStartDate;
	}
	
	if(maxTripStartDate != ''){
		queryString += "&maxTripStartDate=:"+maxTripStartDate;
	}
	
	if(lengthOfStay != ''){
		queryString += "&lengthOfStay="+lengthOfStay;
	}
	
	if(minStarRating != ''){
		queryString += "&minStarRating="+minStarRating;
	}
	
	if(maxStarRating != ''){
		queryString += "&maxStarRating="+maxStarRating;
	}
	
	if(minTotalRate != ''){
		queryString += "&minTotalRate="+minTotalRate;
	}
	
	if(maxTotalRate != ''){
		queryString += "&maxTotalRate="+maxTotalRate;
	}
	
	if(minGuestRating != ''){
		queryString += "&minGuestRating="+minGuestRating;
	}
	
	if(maxGuestRating != ''){
		queryString += "&maxGuestRating="+maxGuestRating;
	}
	
	document.getElementById('postQueryString').value = queryString;
	document.getElementById('hiddenForm').submit();
}
