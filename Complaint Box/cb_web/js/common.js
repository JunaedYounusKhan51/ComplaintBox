function display_control(hide, show){
	document.getElementById(hide).style.display='none';
	document.getElementById(show).style.display='';
}

function take_vote(complaint_id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("show_take_vote_"+complaint_id).innerHTML = this.responseText;
			total_vote(complaint_id);
		}
	};
	xhttp.open("GET", "ajax/take_vote.php?complaint_id="+complaint_id, true);
	xhttp.send();
}

function total_vote(complaint_id) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("show_total_vote_"+complaint_id).innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "ajax/total_vote.php?complaint_id="+complaint_id, true);
	xhttp.send();
}