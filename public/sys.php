<?php
//getting the uri as an array without index.php in the uri to get the controller class and method
$uri = explode(base_uri, $_SERVER['REQUEST_URI']);
$uris = explode("/",$uri[1]);
$uris = $Built_in->arr_filter($uris);
// end
// getting the controller and the method from uri

//checking if the uris is an array and more than one element 
if(is_array($uris) && count($uris) > 0)
{
  //checking the controller file exists
	if(file_exists(ROOT.SEP."application".SEP."controllers".SEP.$uris[0].".php"))
	{
    // requiring the controller file if it exists and start the object for it
		require (ROOT.SEP."application".SEP."controllers".SEP.$uris[0].".php");
		$controller = new $uris[0];
    // checking the second in the uris array as a method in the object 
		if(isset($uris[1]) && $uris[1] != "")
		{
			// check existed method
			if((int)method_exists($controller, $uris[1]))
			{
 				$method = $uris[1];
				// prepare args
				array_shift($uris); array_shift($uris);
        // checking if there are other uris to set them as arguments for the method
				if(count($uris) > 0)
				{
					call_user_func_array(array($controller,$method), $uris);
				}
        //the case of no argumnts found
				else {
				  call_user_func(array($controller,$method));
        }
      }
      // error
      else
      {
       
        $Built_in->display_error("<h2>No method with $uris[1] name ! error_code = 1 </h2>");
      }

      //error
    }
    // if no method set
   else
    {
      // use index method
      if((int)method_exists($controller, 'index'))
      {
        call_user_func (array($controller,'index'));
      }
      //error
      else{
        $Built_in->display_error("<h2>can not be routed error_code = 2 </h2>");

      }
      //error
    }

  }
  // error no object found
  else
  {

    $Built_in->display_error("<h1>no object with $uris[0] name error_code = 3 </h1>");
  }
}
// if no uris uris < 0 then get home page
else
{
  require (ROOT.SEP."application".SEP."controllers".SEP.default_path.".php");
  $cont = default_path;
  $controller = new $cont;
  call_user_func(array($controller,'index'));
}


