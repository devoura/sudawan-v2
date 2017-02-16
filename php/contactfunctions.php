 <!-- Made by Nina Teglverket -->
  
  <?php

	  if(isset($_POST['action']) && !empty($_POST['action'])) {
		   try {
		$grecap = $_POST['action'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$msg = wordwrap($_POST['msg'], 70, "\r\n");
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret'   => '******',
		   'response' => $_POST['$action'],
		   'remoteip' => $_SERVER['REMOTE_ADDR']];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data) 
            ]
        ];
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
		$resultcode = json_decode($result)->success;
		if (resultcode){
			mail('*******','(ninte.no) mail fra: ' . $name,' Mail fra : ' . $name . ' ('. ($email) . ') : ' . $msg);
		}
		else{
			error_log($result);
		}
        return $resultcode;
    }
    catch (Exception $e) {
        return null;
    } 
		  
    }



  ?>