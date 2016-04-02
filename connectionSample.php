 <?PHP
require_once '../../google-api-php-client/src/Google_Client.php';


 // Set your client id, service account name, and the path to your private key.
	// For more information about obtaining these keys, visit:
	// https://developers.google.com/console/help/#service_accounts
	//(Brandon) const CLIENT_ID 		             = 'myclientid.apps.googleusercontent.com';
	const CLIENT_ID = 'brandon-t1995@fusion-table-310-project.iam.gserviceaccount.com';

	// const SERVICE_ACCOUNT_NAME = 'myservicea...@developer.gserviceaccount.com';
	//(Brandon) const SERVICE_ACCOUNT_NAME = 'brandon-t1995@fusion-table-310-project.iam.gserviceaccount.com';
	const SERVICE_ACCOUNT_NAME = 'brandon.t1995';

	
	// Make sure you keep your key.p12 file in a secure location, and isn't
	// readable by others.
	// const KEY_FILE = 'mykeypath';

	//const KEY_FILE = '/users/omercheema/Applications/XAMPP/htdocs/H2OMapper/Fusion Table 310 project-a1571b80cafc.p12';
	set_include_path(get_include_path() . PATH_SEPARATOR . '/users/omercheema/Applications/XAMPP/xamppfiles/htdocs/H2OMapper/Fusion Table 310 project-a1571b80cafc.p12');
    
	//$googleClient = fopen('/users/omercheema/Applications/XAMPP/htdocs/H2OMapper/googleClient/src/Google/Client.php', "r");
	

	/*$myfile = fopen("/users/omercheema/Applications/XAMPP/htdocs/H2OMapper/googleClient/src/Google/Client.php", "r") or die("Unable to open file!");
	echo fread($myfile,filesize("/users/omercheema/Applications/XAMPP/htdocs/H2OMapper/googleClient/src/Google/Client.php"));
	fclose($myfile);*/

	set_include_path(get_include_path() . PATH_SEPARATOR .'/users/omercheema/Applications/XAMPP/xamppfiles/htdocs/H2OMapper/google-api-php-client/src/Google/Client.php') or die("Unable to open file!");
	// set_include_path(get_include_path() . PATH_SEPARATOR .'/google-api-php-client/src');
	// require_once '/path/to/autoload.php';  
	// require_once '/path/to/Client.php';

	
	$client = new Google_Client();
	$client->setApplicationName("my app name");
	
	
	// Load the key in PKCS 12 format (you need to download this from the
	// Google API Console when the service account was created.
	$key = file_get_contents(KEY_FILE);
	$client->setAssertionCredentials(new Google_AssertionCredentials(
	    SERVICE_ACCOUNT_NAME,
	    array('https://www.googleapis.com/auth/fusiontables'),
	    $key)
	);
	
	
	$client->setClientId(CLIENT_ID);
	$service = new Google_FusiontablesService($client);
	
	
	$insQuery = "INSERT INTO 1gvDDEgs\-\-88nxW7a\-FwSwo\-Rgoahmkd22Wh\-Adve VALUES (kid,billable_serv_id,service_addr, type, rate_code, date, consump) VALUES (2,2,\"2\",\"2\",\"20160401\",2)";
	// $insQuery = "INSERT INTO 1P8kJGgBvCYHOHWbPJwf8b8TtykociMAyzWq8Pz4 (stat_id, latitude, longitude, stat_type) VALUES ('2532', 55.664503, 12.59953, 'c')";
	// $selQuery = "select * from 1P8kJGgBvCYHOHWbPJwf8b8TtykociMAyzWq8Pz4 where rowid = '1'";
	$res = $service->query->sql($insQuery);

	?>