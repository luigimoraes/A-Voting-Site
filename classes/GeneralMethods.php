<?php
  class GeneralMethods {
					public static function connectToDB(){
								try{
										$db = new PDO('mysql:host=localhost; dbname=sisteleitoral', "u0_a715", "");
								}catch(PDOException $error){
										$error->getMessage();
								}

								return $db;
					}

					public static function searchByCpf($table){
								
					}
		}
?>