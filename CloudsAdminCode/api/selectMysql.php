<?php
class SelectMysql{
		public $array = [];
		function __construct(){
			
		}
		function select($sql)
		{
					include("../api/db.php");
				
					$Sql = $db -> query($sql);
					$array=[];
						while ($show = $Sql -> fetch_array( MYSQL_ASSOC ))
							{
								$this ->array[]=$show;
							}
			return $this ->array;
			//var_dump($array);
		}
	function insert($sql)
		{
					include("../api/db.php");
				
					$Sql = $db -> query($sql);
				
			//return $this ->array;
			//var_dump($array);
	}

}




?>