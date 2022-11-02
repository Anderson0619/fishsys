<?php 

	class ComercialModel extends Mysql
	{
		private $intIdComercial;
		private $intProforma;
		private $strDescripcion;
		private $strPuerto;
		private $intEspecieId;
		private $strMarca;
		private $intStatus;
		public function __construct()
		{
			parent::__construct();
		}

		public function selectComercials(){
			$sql = "SELECT p.idcomercial,
							p.nprofor,
							p.puerto,
							p.descripcion,
							p.especieid,
							c.nombre as tb_especie,
							p.marca,
							p.status 
					FROM tb_comercial p 
					INNER JOIN tb_especie c
					ON p.especieid = c.idespecie
					WHERE p.status != 0 ";
					$request = $this->select_all($sql);
			return $request;
		}	

		public function insertComercial(int $nprofor, string $descripcion, string $puerto, int $especieid, string $marca,  int $status){
			$this->intProforma = $nprofor;
			$this->strDescripcion = $descripcion;
			$this->strPuerto = $puerto;
			$this->intEspecieId = $especieid;
			$this->strMarca = $marca;
			$this->intStatus = $status;
			$return = 0;
			$sql = "SELECT * FROM tb_comercial WHERE nprofor = '{$this->intProforma}'";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$query_insert  = "INSERT INTO tb_comercial(especieid,
														nprofor,
														descripcion,
														puerto,
														marca,
														status) 
								  VALUES(?,?,?,?,?,?)";
	        	$arrData = array($this->intEspecieId,
        						$this->intProforma,
        						$this->strDescripcion,
        						$this->strPuerto,
        						$this->strMarca,
        						$this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function updateComercial(int $idcomercial, int $nprofor, string $descripcion, string $puerto, int $especieid, string $marca,  int $status){
			$this->intIdComercial = $idcomercial;
			$this->intProforma = $nprofor;
			$this->strDescripcion = $descripcion;
			$this->strPuerto = $puerto;
			$this->intEspecieId = $especieid;
			$this->strMarca = $marca;
			$this->intStatus = $status;
			$return = 0;
			$sql = "SELECT * FROM tb_comercial WHERE nprofor = '{$this->intProforma}' AND idcomercial != $this->intIdComercial ";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE tb_comercial 
						SET especieid=?,
							nprofor=?,
							descripcion=?,
							puerto=?,
							marca=?,							
							status=? 
						WHERE idcomercial = $this->intIdComercial ";
				$arrData = array($this->intEspecieId,
        						$this->intProforma,
        						$this->strDescripcion,
        						$this->strPuerto,
        						$this->strMarca,
        						$this->intStatus);

	        	$request = $this->update($sql,$arrData);
	        	$return = $request;
			}else{
				$return = "exist";
			}
	        return $return;
		}

		public function selectComercial(int $idcomercial){
			$this->intIdComercial = $idcomercial;
			$sql = "SELECT p.idcomercial,							
							p.nprofor,
							p.puerto,
							p.descripcion,
							p.especieid,
							c.nombre as tb_especie,
							p.marca,
							p.status 
					FROM tb_comercial p
					INNER JOIN tb_especie c
					ON p.especieid = c.idespecie
					WHERE idcomercial = $this->intIdComercial";
			$request = $this->select($sql);
			return $request;

		}


		public function deleteComercial(int $idcomercial){
			$this->intIdComercial = $idcomercial;
			$sql = "UPDATE tb_comercial SET status = ? WHERE idcomercial = $this->intIdComercial ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
 ?>