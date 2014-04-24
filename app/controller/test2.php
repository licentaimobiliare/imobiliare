<?php

class controller_test2 {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		
                $connection = model_database::get_instance();
			 $sql = $connection->prepare("SELECT * FROM users");
                        
                         //$result = mysql_query($sql) or die('Query failed: ' . mysql_error());

                      $resursa = $sql -> fetchAll();
                       //  var_dump($resursa);
                         
                /*         
                  while($row=mysql_fetch_array($result))
	{
		@include_once APP_PATH . 'view/test2_index.tpl.php';
        }
		*/
                      if ( count($resursa) ) 
                          { 
                          foreach($resursa as $row) 
                              { 
                              print_r($row);
                              
                              
                              } }
                      else { echo "No rows returned."; }


        }
}

              