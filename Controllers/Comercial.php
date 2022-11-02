<?php 
	class Comercial extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(8);
		}

		public function Comercial()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_tag'] = "Comercial";
			$data['page_title'] = "COMERCIAL <small>Sistema Fishcorp</small>";
			$data['page_name'] = "comercial";
			$data['page_functions_js'] = "functions_comerciales.js";
			$this->views->getView($this,"comercial",$data);
		}

		public function getComercials()
		{     
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectComercials();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcomercial'].')" title="Ver orden"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idcomercial'].')" title="Editar orden"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){	
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcomercial'].')" title="Eliminar orden"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setComercial(){
			if($_POST){
				if(empty($_POST['txtProforma']) || empty($_POST['txtPuerto']) || empty($_POST['listEspecie']) || empty($_POST['txtMarca']) || empty($_POST['listStatus']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
					
					$idComercial = intval($_POST['idComercial']);
					$intProforma = strClean($_POST['txtProforma']);
					$strDescripcion = strClean($_POST['txtDescripcion']);
					$strPuerto = strClean($_POST['txtPuerto']);
					$intEspecieId = intval($_POST['listEspecie']);
					$strMarca = strClean($_POST['txtMarca']);
					$intStatus = intval($_POST['listStatus']);
					$request_producto = "";

					if($idComercial == 0)
					{
						$option = 1;
						if($_SESSION['permisosMod']['w']){
							$request_producto = $this->model->insertComercial($intProforma, 
																		$strDescripcion, 
																		$strPuerto, 
																		$intEspecieId,
																		$strMarca,  
																		$intStatus );
						}
					}else{
						$option = 2;
						if($_SESSION['permisosMod']['u']){
							$request_producto = $this->model->updateComercial($idComercial,
																		$intProforma, 
																		$strDescripcion, 
																		$strPuerto, 
																		$intEspecieId,
																		$strMarca,  
																		$intStatus);
						}
					}
					if($request_producto > 0 )
					{
						if($option == 1){
							$arrResponse = array('status' => true, 'idcomercial' => $request_producto, 'msg' => 'Datos guardados correctamente.');
						}else{
							$arrResponse = array('status' => true, 'idcomercial' => $idComercial, 'msg' => 'Datos Actualizados correctamente.');
						}
					}else if($request_producto == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! ya existe una orden con la proforma Ingresada.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getComercial($idcomercial){
			if($_SESSION['permisosMod']['r']){
				$idcomercial = intval($idcomercial);
				if($idcomercial > 0){
					$arrData = $this->model->selectComercial($idcomercial);
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}


		public function delComercial(){
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intIdcomercial = intval($_POST['idComercial']);
					$requestDelete = $this->model->deleteComercial($intIdcomercial);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado la orden');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar la orden.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
	}

 ?>