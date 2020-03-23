<?php

namespace App\lib;
use DB;
use Mail;
use Illuminate\Http\Request;
use Validator;

class Helper
{
	public static function displayauthlv($string)
	{
		switch ($string) {
			case "-3":
				return "Admin";
				break;
			case "-2":
				return "Editor Admin";
				break;
			case "-1":
				return "Super Admin";
				break;
			case "1":
				return "Supplier";
				break;
			case "2":
				return "Supplier Officer";
				break;
			default:
				return "none";
				break;
		}
	}

	public static function dbescape(string $string)
	{
		return DB::connection()->getPdo()->quote($string);
	}

	public static function datePlus7(string $string)
	{
		return date('Y-m-d H:i',strtotime('+7 hour',strtotime($string)));
	}
	
	public static function checkPassword(string $password)
	{
		$problem = "";
		$flagTrue = true;
		/*
		$flagTrue = $flagTrue && (strlen($password) < 8 ? false : true);
		$problem = $flagTrue == false ? $problem . "min char 8" : "";
		
		$flagTrue = $flagTrue && (strlen($password) > 20 ? false : true);
		$problem = $flagTrue == false ? $problem . ", max char 8" : "";
		
		$flagTrue = $flagTrue && (strtolower($password) != $password ? true : false);
		$problem = $flagTrue == false ? $problem . ", min uppercase": "";
		
		$flagTrue = $flagTrue && (strtoupper($password) != $password ? true : false);
		$problem = $flagTrue == false ? $problem . ", min lowercase": "";
		
		$flagTrue = $flagTrue && (preg_match('/\\d/', $password) > 0 ? true : false);
		$problem = $flagTrue == false ? $problem . ", min 1 number": "";
		
		$flagTrue = $flagTrue && (preg_match('#[^a-zA-Z0-9]#', $password) ? true : false);
		$problem = $flagTrue == false ? $problem . ", min 1 special character" : "";*/

		return $flagTrue;
	}

	public static function encrypt($plaintext)
	{
		$password = 'altermyth123';
		$method = 'AES-256-CBC';
		$secret_iv = 'secret123';

		$password = substr(hash('sha256', $password, true), 0, 32);
		$iv = substr(hash('sha256', $secret_iv, true), 0, 16);

		$encrypted = base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
		return $encrypted;
	}

	public static function decrypt($ciphertext)
	{
		$password = 'altermyth123';
		$method = 'AES-256-CBC';
		$secret_iv = 'secret123';

		$password = substr(hash('sha256', $password, true), 0, 32);
		$iv = substr(hash('sha256', $secret_iv, true), 0, 16);

		$decrypted = openssl_decrypt(base64_decode($ciphertext), $method, $password, OPENSSL_RAW_DATA, $iv);
		return $decrypted;
	}

	public static function mail($fromParam, $fromNameParam, $toParam, $toNameParam, $subjectParam, $msgParam)
	{
		$data = array('name'=>$toNameParam, "body" => $msgParam);


		Mail::send(['html' => 'mail'], $data, function($message) use ($fromParam, $fromNameParam, $toParam, $toNameParam, $subjectParam, $msgParam)  
		{
			$message->from($fromParam, $fromNameParam);
			$message->to($toParam, $toNameParam)->subject($subjectParam);
			
		});
	}

	public static function getjuliandate()
	{
		$date = now();
		//$date = date_create("2020-02-29");
		$year = date_format($date,"Y");
		$day = date_format($date,"d");
		$month = date_format($date,"m");

		$dateOfYear = date_format($date,"z");
		$dateOfYear = '000'. ($dateOfYear + 1);
		$dateOfYear = substr($dateOfYear, strlen($dateOfYear) - 3);
		//var_dump($year.$dateOfYear);
		//return $year.$dateOfYear;
		$returnValue = GregorianToJD($month, $day, $year);
		//var_dump($returnValue);
		//die();
		return $returnValue;
	}

	public static function uploadimage(Request $request, $fileuploadparam)
	{

		/*
    	$request->validate([
            'photoparam' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $test = $request->validate([
            'photoparam' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);*/

        $imageName = (microtime(true) * 10000).'.'.$fileuploadparam->getClientOriginalExtension();
        $fileuploadparam->move(public_path('imgupload'), $imageName);

    	return $imageName;
	}

	public static function deleteImage($imageName)
	{
		$image_path = public_path('imgupload') ."/". $imageName;
		unlink($image_path);
	}

	public static function validateUserSubmit($username, $email, $phonenumber)
	{
		var_dump($username, $email, $phonenumber);
		$input['email'] = $email;
		$input['username'] = $username;
		$input['phonenumber'] = $phonenumber;

		$rulesUsername = array( 'username' => 'unique:users,username');
		$rulesEmail = array( 'email' => 'unique:users,email');
		$rulesPhone = array( 'phonenumber' => 'unique:users,phonenumber');

		$validatorUsername = !Validator::make($input, $rulesUsername)->fails();
		$validatorEmail = !Validator::make($input, $rulesEmail)->fails();		
		$validatorPhone = !Validator::make($input, $rulesPhone)->fails();

		if($validatorUsername && $validatorEmail && $validatorPhone)
		{
			return "ok";
		}
		else
		{
			$err = !$validatorUsername ? "Username exists, " : "";
			$err = !$validatorEmail ? $err . "Email exists, " : $err;
			$err = !$validatorPhone ? $err . "Phone exists," : $err;
			$err = substr($err, 0, strlen($err)-1);
			return $err;
		}
	}

	public static function ensureNotNull($val,$defVal)
	{
		if($val == null) return $defVal;
		return $val;
	}

	public static function dbescapeNotNull($val)
	{
		$string = $val;
		if($string == null) $string = '';
		return DB::connection()->getPdo()->quote($string);
	}

}
