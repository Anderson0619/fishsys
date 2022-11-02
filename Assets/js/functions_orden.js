function Registrar_Examen(){
    let examen   = document.getElementById('txt_examen').value;
    let analisis = document.getElementById('select_analisis').value;
    if(examen.length==0 || analisis.length==0){
        return Swal.fire("Mensaje de Advertencia","Tiene algunos campos vacios","warning");
    }
    $.ajax({
        url:'../controller/examen/controlador_examen_registro.php',
        type:'POST',
        data:{
          examen:examen,
          analisis:analisis
        }
    
      }).done(function(resp){
          if(resp>0){
              if(resp==1){
                Swal.fire("Mensaje de Confirmacion","Nuevo Examen Registrado","success").then((value)=>{
                    document.getElementById('txt_examen').value="";
                    $("#modal_registro_examen").modal('hide');
                    tbl_examen.ajax.reload();
                  });
              }else{
                Swal.fire("Mensaje de Advertencia","El examen ingresado ya se encuentra en la base de datos","warning");
              }

    
          }else{
            Swal.fire("Mensaje de Error","No se pudo completar el registro","error");
          }   
      })
}



function openModal()
{
    rowTable = "";
    document.querySelector('#idOrden').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Orden";
    document.querySelector("#formOrden").reset();
    $('#modalFormOrden').modal('show');
    
}