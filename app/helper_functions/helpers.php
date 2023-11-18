<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function flash($message = 'Successful!')
{
	session()->flash('message', $message);
}

function error_flash($message = 'Error!')
{
	session()->flash('error_message', $message);
}


// this function returns the service id of a user
function serviceId()
{
	return auth()->user() ? auth()->user()->service_id : "";
}
// this function returns the role and dashboard of a procurement officer
function is_procurement_officer()
{

	return auth()->user()->is_procurement_officer ?? 0;
}
// // this function returns the role and dashboard of a contractor

function is_contractor()
{

	return auth()->user()->is_contractor ?? 0;
}
function is_chairman()
{

	return auth()->user()->is_chairman ?? 0;
}
// this function returns the service code of a user
function serviceCode()
{
	return auth()->user() ? auth()->user()->service_code : "";
}


// this function returns the full name of a user
function username()
{
	if (groupId() == 10) {
		return auth()->user() ? strtoupper(auth()->user()->username) : "";
	} else {
		return auth()->user() ? auth()->user()->username : "";
	}
}


// this function returns the full name of a user
function name()
{
	return auth()->user() ? auth()->user()->name : "";
}


// this function returns the surname of a user
function surname()
{
	return auth()->user() ? auth()->user()->surname : "";
}


// this function returns the first name of a user
function firstName()
{
	return auth()->user() ? auth()->user()->firstname : "";
}


// this function returns the middle name of a user
function middleName()
{
	return auth()->user() ? auth()->user()->middlename : "";
}


// this fuction returns the userid
function userId()
{
	return auth()->user() ? auth()->user()->id : "";
}


// this function returns the groupid
function groupId()
{
	return auth()->user() ? auth()->user()->group_id : "";
}

// returns if the user is to login for the first time
function first_use()
{
	return auth()->user() ? auth()->user()->first_use : "";
}

// returns the uuid
function uuid()
{
	return Uuid::generate()->string;
}


// RETURNS THE TYPE OF CLIENT TYPE
function client_type_id()
{
	// Note::  1 for private clients, 2 for government (ubeb,subeb, lg, state, fg, etc), 3 for pensions alone.
	return session('client_type_id') ?: 0;
}

// RETURNS THE CLIENT NAME
function client()
{
	return session('client_name') ?: "";
}
function client_city()
{
	return session('client_city') != "EMPTY RECORD" ? session('client_city') : "";
}
function client_country()
{
	return session('client_country') != "EMPTY RECORD" ? session('client_country') : "";
}

function client_address()
{
	return session('client_address') ?: "";
}


//Messages Notification Count
function message_count()
{
	$m_count = DB::table('message_receiver')->where(['read_message' => 0, 'receiver_user_id' => userId(), 'service_id' => serviceId(), 'mark_delete' => 0])->count();
	return $m_count;
}

function payment_count()
{
	$sql = "(SELECT count(*) as a_count FROM payment_approval_users RIGHT JOIN monthly_pay_register ON payment_approval_users.batch_no = monthly_pay_register.batch_no INNER JOIN approval_level ON payment_approval_users.approval_level_id = approval_level.approval_level_id WHERE payment_approval_users.approved<>1 and payment_approval_users.user_id=" . userid() . " GROUP BY payment_approval_users.batch_no) ";
	//$sql2 = "(SELECT count(*) as a_count FROM payment_approval_users INNER JOIN expenditure_payregister ON payment_approval_users.batch_no = expenditure_payregister.batch_name INNER JOIN approval_level ON payment_approval_users.approval_level_id = approval_level.approval_level_id WHERE payment_approval_users.approved<>1 and payment_approval_users.user_id=".userid()." GROUP BY payment_approval_users.batch_no)";
	//$p_count = DB::table('payment_approval_users')->where(['approved'=>0, 'user_id'=> userId(), 'service_id'=>serviceId()])->groupBy('batch_no')->count();
	//$p_count = DB::select($sql);
	//dd($sql);
	return 0;
}



// this function generates a random password.

function generate_password()
{

	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);

	$characters2 = 'abcdefghijklmnopqrstuvwxyz';
	$charactersLength2 = strlen($characters2);

	//$characters3 = '~!@#$%^&*()_+}{":?<>./;[]';
	$characters3 = '!@#$%^&*()_+}{:?<>;[]';
	$charactersLength3 = strlen($characters3);

	$characters4 = '0123456789';
	$charactersLength4 = strlen($characters4);


	$randomString = '';

	for ($i = 0; $i < 3; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}

	for ($i = 0; $i < 3; $i++) {
		$randomString .= $characters2[rand(0, $charactersLength2 - 1)];
	}

	for ($i = 0; $i < 3; $i++) {
		$randomString .= $characters3[rand(0, $charactersLength3 - 1)];
	}

	for ($i = 0; $i < 3; $i++) {
		$randomString .= $characters4[rand(0, $charactersLength4 - 1)];
	}

	$shuffled = str_shuffle($randomString);


	return $shuffled;
}

// this confirms that the password complies to the password policy	
function check_password($user_pass)
{
	$errors = true;


	if (strlen($user_pass) < 7) {
		$errors = "Password Must Be At Least 7 Characters";

	}

	if (!preg_match("#[0-9]+#", $user_pass)) {
		$errors = "Password Must Contain Numbers";
	}

	if (!preg_match("#[a-z]+#", $user_pass)) {
		$errors = "Password Must Contain Lower Case Letters";
	}

	if (!preg_match("#[A-Z]+#", $user_pass)) {
		$errors = "Password Must Contain Upper Case Letters";
	}

	if (!preg_match("/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\<\>,\.\?\\\]/", $user_pass)) {
		$errors = "Password Must Contain Special Characters like @,#,$...";
	}

	return $errors;
}


// this functions returns a color from an array of colors
function getColor($id)
{
	$myColors = array();
	$myColors = array("#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#754DEB", "#DDDDDD", "#999999", "#333333", "#000000", "#000022");
	if (array_key_exists($id, $myColors)) {
		return $myColors[$id];
	} else {
		return "";
	}
}


// the functioin returns accronym (first word of each letter)

function createAccronym($inputWord)
{

	$words = explode(" ", $inputWord);
	$acronym = "";

	foreach ($words as $w) {
		$acronym .= $w[0];
	}

	return $acronym;
}

function suggestServiceCode($inputWord, $min = 3, $max = 5)
{

	$words = explode(" ", $inputWord);
	$acronym = "";
	$acronym1 = "";
	$acronym3 = "";

	foreach ($words as $w) {

		$acronym1 .= strlen($w) > 1 ? $w[1] : $w[0]; // second char if it exist
		$acronym3 .= substr($w, -1); // last char
	}

	if (preg_match_all('/\b(\w)/', strtoupper($inputWord), $m)) {
		$accronym2 = implode('', $m[1]); // $v is now SOQTU
	}

	$first_string = checkSize($inputWord, $acronym1, $min, $max);
	$second_string = checkSize($inputWord, $accronym2, $min, $max);
	$third_string = checkSize($inputWord, $acronym3, $min, $max);

	$string1 = checkServiceCodeExist($first_string) ? checkSize($inputWord, $first_string . get_random(2), $min, $max) : $first_string;
	$string2 = checkServiceCodeExist($second_string) ? checkSize($inputWord, $second_string . get_random(2), $min, $max) : $second_string;
	$string3 = checkServiceCodeExist($third_string) ? checkSize($inputWord, $third_string . get_random(2), $min, $max) : $third_string;


	return ($string1 . ', ' . $string2 . ', ' . $string3);
}

function checkSize($inputWord, $acronym, $min, $max)
{
	$words = explode(" ", $inputWord);
	// if acronym is shorter than the required lenght
	if (strlen($acronym) < $min) {
		$diff = abs($min - strlen($acronym));

		if ($diff == 1) {
			$last_word = end($words);
			$last_char = substr($last_word, -1);
			$acronym .= $last_char;
		} else {
			shuffle($words);
			foreach ($words as $w) {
				$acronym .= $w[0] . substr($w, -1);
			}
		}
	}
	// if acronym is grater than the required maximum

	if (strlen($acronym) > $max) {
		$acronym = substr($acronym, 0, $max);
	}
	return strtoupper($acronym);
}

function checkServiceCodeExist($service_code)
{
	try {
		$clientCheck = DB::table('client_services')->where(['service_code' => $service_code])->first();

		return $clientCheck ? true : false;
	} catch (\Exception $e) {
		return false;
	}


}

function get_random($digits = 4)
{
	return rand(pow(10, $digits - 1), pow(10, $digits) - 1);
}

// the functioin returns the first words

function createShortName($inputWord)
{

	$words = explode(" ", $inputWord);
	$firstWord = $words[0];


	return strtoupper($firstWord);
}

//gets the number of character from a string
function string_limit($string, $limit = 10)
{
	$sub_string = substr($string, 0, $limit);
	return strlen($string) > $limit ? $sub_string . '...' : $sub_string;
}

// word trim
function word_limit($string, $limit = 10)
{
	return Str::words($string, $limit, '...');
}

// gets the current date
function get_today()
{
	$mytime = Carbon\Carbon::now();
	//$today = $mytime->toDateTimeString();->format('l jS \\of F Y h:i:s A')
	//return Carbon\Carbon::now()->subDay();
	//return Carbon\Carbon::now()->toDateString();
	return $mytime;
}


// function that sends sms
function SendSMS($sender, $receiver, $msg)
{
	if ($receiver == "" || $msg == "") {
		return FALSE;
	} else {
		$URL = "http://www.smslive247.com/http/index.aspx?"
			. "cmd=sendmsg"
			. "&sessionid=68e4a439-1972-4b0d-960f-6db15bae540b"
			. "&message=" . UrlEncode($msg)
			. "&sender=" . UrlEncode($sender)
			. "&sendto=" . UrlEncode($receiver)
			. "&msgtype=0";
		file($URL);

		return TRUE;
	}
}

// send mails
function send_mail($fullname, $subject, $mail_body, $client, $email, $ccArray = array())
{


	$data = array('name' => $fullname, 'client' => $client, 'subject' => $subject, 'body' => $mail_body);
	$other_data = array('name' => $fullname, 'email' => $email, 'subject' => $subject, 'body' => $mail_body, 'ccArray' => $ccArray);

	try {
		Mail::send('Mail/general_mail', $data, function ($message) use ($other_data) {
			if (count($other_data['ccArray']) > 0) {
				$message->cc(implode(';', $other_data['ccArray']));
			}
			$message->to($other_data['email'], 'VERITEX')->subject($other_data['subject']);
			$message->from('veritex@techvibesltd.com', 'VERITEX');

		});

	} catch (Exception $exception) {
		//dd($exception); 
		return back()->with('error', "Could not send email notification.");
	}

}



// returns the url of the app
function app_url()
{
	return env('APP_URL');
}


// calculate age from date of birth
function get_age($birthDate = "0000-00-00")
{
	//date in yyyy-mm-dd format; or it can be in other formats as well

	//explode the date to get month, day and year
	$birthDate = explode("-", $birthDate);
	//get age from date or birthdate
	if (count($birthDate) == 3) {
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
			? ((date("Y") - $birthDate[0]) - 1)
			: (date("Y") - $birthDate[0]));
		return $age;
	}
	return 0;
}


// RETURNS THE MONTH NAME WHEN GIVEN A DATE
function get_month_name($date)
{
	@$dt = explode('-', $date); // date is expected to be in yyyy-mm-dd format
	@$month = $dt[1] ?: '00';

	switch ($month) {
		case "01":
			return "January";
			break;
		case "02":
			return "February";
			break;
		case "03":
			return "March";
			break;
		case "04":
			return "April";
			break;
		case "05":
			return "May";
			break;
		case "06":
			return "June";
			break;
		case "07":
			return "July";
			break;
		case "08":
			return "August";
			break;
		case "09":
			return "September";
			break;
		case "10":
			return "October";
			break;
		case "11":
			return "November";
			break;
		case "12":
			return "December";
			break;
		default:
			return null;
	}


}

// RETURNS THE VALUE OF 
function get_year($date)
{
	@$dt = explode('-', $date); // date is expected to be in yyyy-mm-dd format
	@$year = $dt[0] ?: '0000';
	return $year;
}

//RETURNS THE PROFILE PICTURE OF AN INDIVIDUAL env('APP_URL').'../veritexrepo/public    env('APP_URL').'../veritexrepo/public/
function get_profile_pix($photo_url)
{
	try {
		if ($photo_url <> "" && $photo_url <> null) {
			if (file_exists('images/' . $photo_url)) {
				return asset('images/' . $photo_url);
			}

		}
		return asset('images/avatar.png');
	} catch (\Exception $e) {
		return asset('images/avatar.png');
	}

}
/////////// GET INVOICE LOGO ////////////////////

function get_invoice_logo($invoice_logo_url = "")
{
	try {
		if ($invoice_logo_url <> "" && $invoice_logo_url <> null) {
			if (file_exists('images/invoice_logo/' . $invoice_logo_url)) {
				return asset('images/invoice_logo/' . $invoice_logo_url);
			}
		}
		return asset('img/main/techvibes_logo.png');
	} catch (\Exception $e) {
		return asset('img/main/techvibes_logo.png');
	}
}

/////////////// GET CLIENT LOGO/////////////////
function get_client_logo()
{
	try {
		$service_logo_url = service_logo_url();
		if ($service_logo_url <> "" && $service_logo_url <> null) {
			if (file_exists('images/' . $service_logo_url)) {
				return asset('images/' . $service_logo_url);
			}
		}

		// return  asset('img/layout4/img/veritex3[1816].png');
		return asset('img/main/images.jpeg');
	} catch (\Exception $e) {
		//return  asset('img/layout4/img/veritex3[1816].png');
		return asset('img/main/images.jpeg');
	}

}

// set the logo for the login page
function get_login_client_logo($service_code = null)
{
	try {
		if ($service_code <> null) {
			$service_code = strtoupper($service_code);
			$client = DB::table('client_services')->where(['service_code' => $service_code, 'service_status' => 1])->first();
			if ($client) {
				$service_logo_url = $client->service_logo_url;
				//dd($service_logo_url);
				if ($service_logo_url <> "" && $service_logo_url <> null) {
					if (file_exists('images/' . $service_logo_url)) {
						return asset('images/' . $service_logo_url);
					}
				}

			}
		}
		//return  asset('img/pages/img/login/veritex1[1813].png');
		return asset('img/main/techvibes_logo.png');
	} catch (\Exception $e) {
		// dd($e);
		return asset('img/main/techvibes_logo.png');
	}
}

// sets the photo_url
function set_photo_url($photo_url)
{

	return session(['photo_url' => $photo_url]);
}

// RETURNS THE EMPLOYEE PICTURE URL
function photo_url()
{
	return session('photo_url');
}

// sets the service_logo
function set_service_logo_url($service_logo_url)
{

	return session(['service_logo_url' => $service_logo_url]);
}
// RETURNS THE EMPLOYEE PICTURE URL
function service_logo_url()
{
	return session('service_logo_url');
}

// RETURNS BANK CODE 
function accountTypeCode($accountType)
{
	switch ($accountType) {
		case "SAVINGS":
			return 10;
			break;
		case "CURRENT":
			return 20;
			break;
		default:
			return 10;
	}

}

function clean($string)
{
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}



/////////////////// FOR CROPING IMAGES /////////////////


### this function resizes an image to the specified size
function resize_image($image, $destination_folder, $thumb_width, $thumb_height)
{
	//@$thumb_square_size = 150; //Thumbnails will be cropped to 150x150 pixels
	@$max_image_size = 500; //Maximum image size (height and width)
	@$thumb_prefix = "thumb_"; //Normal thumb Prefix
	//@$destination_folder = "profile_image/"; //upload directory ends with / (slash)
	@$jpeg_quality = 90; //jpeg quality
	$thumb_save_folder = $destination_folder . $image;
	$image_size_info = getimagesize($thumb_save_folder); //get image size

	if ($image_size_info) {
		$image_width = $image_size_info[0]; //image width
		$image_height = $image_size_info[1]; //image height
		$image_type = $image_size_info['mime']; //image type
	}
	//switch statement below checks allowed image type
	//as well as creates new image from given file
	switch ($image_type) {
		case 'image/png':
			$image_res = imagecreatefrompng($thumb_save_folder);
			break;
		case 'image/gif':
			$image_res = imagecreatefromgif($thumb_save_folder);
			break;
		case 'image/jpeg':
		case 'image/pjpeg':
		case 'image/jpg':
			$image_res = imagecreatefromjpeg($thumb_save_folder);
			break;
		default:
			$image_res = false;
	}

	if (!crop_image_square($image_res, $thumb_save_folder, $image_type, $thumb_width, $thumb_height, $image_width, $image_height, $jpeg_quality)) {
		// throw and error
	}

}
##### This function crops image to create new image based on your specified dimenssions! ######
function crop_image_square($source, $destination, $image_type, $thumb_width, $thumb_height, $image_width, $image_height, $quality)
{
	if ($image_width <= 0 || $image_height <= 0) {
		return false;
	} //return false if nothing to resize

	if ($image_width > $image_height) {
		$y_offset = 0;
		$x_offset = ($image_width - $image_height) / 2;
		$s_size = $image_width - ($x_offset * 2);
	} else {
		$x_offset = 0;
		$y_offset = ($image_height - $image_width) / 2;
		$s_size = $image_height - ($y_offset * 2);
	}
	$new_canvas = imagecreatetruecolor($thumb_width, $thumb_height); //Create a new true color image

	//Copy and resize part of an image with resampling
	if (imagecopyresampled($new_canvas, $source, 0, 0, $x_offset, $y_offset, $thumb_width, $thumb_height, $s_size, $s_size)) {
		save_image($new_canvas, $destination, $image_type, $quality);
	}

	return true;
}

##### Saves image resource to file #####
function save_image($source, $destination, $image_type, $quality)
{
	switch (strtolower($image_type)) { //determine mime type
		case 'image/png':
			imagepng($source, $destination);
			return true; //save png file
			break;
		case 'image/gif':
			imagegif($source, $destination);
			return true; //save gif file
			break;
		case 'image/jpeg':
		case 'image/pjpeg':
		case 'image/jpg':
			imagejpeg($source, $destination, $quality);
			return true; //save jpeg file
			break;
		default:
			return false;
	}
}

///// END IMAGE RESIZE ////////////////////////////////////////////////////

////////////////////////////////////////////////// APP CONSTANTS ///////////////////////////////////////
// returns the categories label name
function CATEGORIES()
{
	return client_type_id() == 1 ? "Business Categories" : "Categories";
}
// returns the category label name
function CATEGORY()
{
	return client_type_id() == 1 ? "Business Category" : "Category";
}
// returns the category label short form
function CATEGORY_SC()
{
	return client_type_id() == 1 ? "Bus. Cat." : "Cat.";
}
// returns the label name for ministries
function MINISTRIES()
{
	return client_type_id() == 1 ? "Business Branches" : "Ministries";
}
// returns the label name for ministry
function MINISTRY()
{
	return client_type_id() == 1 ? "Business Branch" : "Ministry/MDA";
}
// returns the label name for ministry shortform
function MINISTRY_SC()
{
	return client_type_id() == 1 ? "Bus. Branch" : "Min.";
}
// returns the label name for MDA/Classification
function MDA()
{
	return client_type_id() == 1 ? "Business Setup" : "MDA";
}
// returns the label name for MDA/Classification
function MDAS()
{
	return client_type_id() == 1 ? "Business Branches" : "MDAs";
}
////////////////////////////////// END APP CONSTANTS ////////////////////////////////////////////////////
///////// get users with a particular role name ///////////////////////
function get_users_with_role($role_name, $limit = 1)
{
	try {
		$res = DB::select("SELECT users.`name`, users.email, users.user_phone, users.username, users.id FROM roles INNER JOIN role_user ON roles.id = role_user.role_id INNER JOIN users ON role_user.user_id = users.id WHERE roles.`name` = '" . $role_name . "' and role_user.service_id = '" . serviceId() . "' LIMIT " . $limit);
		return $res;
	} catch (Exception $e) {
		return false;
	}
}
function userRole(): array
{
	return @session('roles') ?? [];
}
function is_my_role($role_name): bool
{
	foreach (userRole() as $res) {
		if ($role_name == $res->name)
			return true;
	}
	return false;
}