<?php 

	class EspeciesModel extends Mysql
	{
		public $intIdespecie;
		public $strEspecie;
		public $strDescripcion;
		public $intStatus;
		//public $strPortada;

		public function __construct()
		{
			parent::__construct();
		}

		public function inserEspecie(string $nombre, string $descripcion, int $status){

			$return = 0;
			$this->strEspecie = $nombre;
			$this->strDescripcion = $descripcion;
			//$this->strPortada = $portada;
			$this->intStatus = $status;

			$sql = "SELECT * FROM tb_especie WHERE nombre = '{$this->strEspecie}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO tb_especie(nombre,descripcion,status) VALUES(?,?,?)";
	        	$arrData = array($this->strEspecie, 
								 $this->strDescripcion, 
								 //$this->strPortada, 
								 $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

		public function selectEspecies()
		{
			$sql = "SELECT * FROM tb_especie 
					WHERE status != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectEspecie(int $idespecie){
			$this->intIdespecie = $idespecie;
			$sql = "SELECT * FROM tb_especie
					WHERE idespecie = $this->intIdespecie";
			$request = $this->select($sql);
			return $request;
		}

		public function updateEspecie(int $idespecie, string $especie, string $descripcion, int $status){
			$this->intIdespecie = $idespecie;
			$this->strEspecie = $especie;
			$this->strDescripcion = $descripcion;
			//$this->strPortada = $portada;
			$this->intStatus = $status;

			$sql = "SELECT * FROM tb_especie WHERE nombre = '{$this->strEspecie}' AND idespecie != $this->intIdespecie";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tb_especie SET nombre = ?, descripcion = ?, status = ? WHERE idespecie = $this->intIdespecie ";
				$arrData = array($this->strEspecie, 
								 $this->strDescripcion, 
								 //$this->strPortada, 
								 $this->intStatus);  
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteEspecie(int $idespecie)
		{
			$this->intIdespecie = $idespecie;
			$sql = "SELECT * FROM tb_comercial WHERE especieid = $this->intIdespecie";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE tb_especie SET status = ? WHERE idespecie = $this->intIdespecie ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{   
				$request = 'exist';  
			}
			return $request;
		}	


	}
 ?>