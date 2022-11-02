<?php 
class ClientesModel extends Mysql
{
	private $intIdCliente;
	private $strIdentificacion;
	private $strNombre;
	private $strApellido;
	private $intTipoCliente;
	private $intTipoId;
	private $intStatus;
	private $intTelefono;
	private $strEmail;
	private $strDireccion;

	public function __construct()
	{
		parent::__construct();
	}	

	public function insertCliente(string $identificacion, string $nombre, string $apellido, int $telefono, string $email, int $tipoid, string $tipocliente, string $direccion){

		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoId = $tipoid;
		$this->intTipoCliente = $tipocliente;
		$this->strDireccion = $direccion;
	

		$return = 0;
		$sql = "SELECT * FROM tb_cliente WHERE 
				email = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$query_insert  = "INSERT INTO tb_cliente(identificacion,nombres,apellidos,telefono,email,rolid,tipocliente,direccion) 
							  VALUES(?,?,?,?,?,?,?,?)";
        	$arrData = array($this->strIdentificacion,
    						$this->strNombre,
    						$this->strApellido,
    						$this->intTelefono,
    						$this->strEmail,
    						$this->intTipoId,
    						$this->intTipoCliente,
    						$this->strDireccion);
        	$request_insert = $this->insert($query_insert,$arrData);
        	$return = $request_insert;
		}else{
			$return = "exist";
		}
        return $return;
	}

	public function selectClientes()
	{
		$sql = "SELECT idcliente,identificacion,nombres,apellidos,telefono,email,status 
				FROM tb_cliente 
				WHERE rolid = 7 and status != 0 ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCliente(int $idcliente){
		$this->intIdCliente = $idcliente;
		$sql = "SELECT idcliente,identificacion,nombres,apellidos,telefono,email,tipocliente,direccion,status, DATE_FORMAT(datecreated, '%d-%m-%Y') as fechaRegistro 
				FROM tb_cliente
				WHERE idcliente = $this->intIdCliente and rolid = 7";
		$request = $this->select($sql);
		return $request;
	}

	public function updateCliente(int $idCliente, string $identificacion, string $nombre, string $apellido, int $telefono, string $email, string $tipocliente, string $direccion){

		$this->intIdCliente = $idCliente;
		$this->strIdentificacion = $identificacion;
		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->intTipoCliente = $tipocliente;
		$this->strDireccion = $direccion;
	

		$sql = "SELECT * FROM tb_cliente WHERE (email = '{$this->strEmail}' AND idcliente != $this->intIdCliente)
									  OR (identificacion = '{$this->strIdentificacion}' AND idcliente != $this->intIdCliente) ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			if($this->strPassword  != "")
			{
				$sql = "UPDATE tb_cliente SET identificacion=?, nombres=?, apellidos=?, telefono=?, email=?,  tipocliente=?, direccion=?
						WHERE idcliente = $this->intIdCliente ";
				$arrData = array($this->strIdentificacion,
        						$this->strNombre,
        						$this->strApellido,
        						$this->intTelefono,
        						$this->strEmail,
        						$this->intTipoCliente,
        						$this->strDireccion);
			}else{
				$sql = "UPDATE tb_cliente SET identificacion=?, nombres=?, apellidos=?, telefono=?, email=?, tipocliente=?, direccion=?
						WHERE idcliente = $this->intIdCliente ";
				$arrData = array($this->strIdentificacion,
        						$this->strNombre,
        						$this->strApellido,
        						$this->intTelefono,
        						$this->strEmail,
        						$this->intTipoCliente,
        						$this->strDireccion);
			}
			$request = $this->update($sql,$arrData);
		}else{
			$request = "exist";
		}
		return $request;
	}

	public function deleteCliente(int $intIdcliente)
	{
		$this->intIdCliente = $intIdcliente;
		$sql = "UPDATE tb_cliente SET status = ? WHERE idcliente = $this->intIdCliente ";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		return $request;
	}
}

 ?>