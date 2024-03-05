<?php session_start();


function myErrorMsg() {
	if (isset($_SESSION['errorMsg'])) {
		$output = '<div class="alert alert-danger text-center">';
		$output.= $_SESSION['errorMsg'];
		$output.= '</div>';
		$_SESSION['errorMsg'] = null;
		return $output;
	}

}
function mySuccessMsg() {
	if (isset($_SESSION['successMsg'])) {
		$output = '<div class="alert alert-success text-center">';
		$output.= $_SESSION['successMsg'];
		$output.= '</div>';
		$_SESSION['successMsg'] = null;
		return $output;
	}

}


 ?>