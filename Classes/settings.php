<?php 

	


	class Settings {

		public static function Info($id,$massiv){
		global $db;
		$siyahi = $db->sorgu("SELECT * FROM settings WHERE id = '1'")->massiv_siyahi();
		return 	$siyahi[0][$massiv];
		}


	}





	?>