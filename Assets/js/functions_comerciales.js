
let tableComercial;
let rowTable = "";
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});
tableComercial = $('#tableComercial').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/Comercial/getComercials",
        "dataSrc":""
    },
    "columns":[
        {"data":"nprofor"},
        {"data":"puerto"},
        {"data":"marca"},
        {"data":"especieid"},
        {"data":"status"},
        {"data":"options"}
    ],
    "columnDefs": [
                    { 'className': "textcenter", "targets": [ 3 ] },
                    { 'className': "textright", "targets": [ 4 ] },
                    { 'className': "textcenter", "targets": [ 5 ] }
                  ],       
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "btn btn-secondary",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "btn btn-success",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "btn btn-danger",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "btn btn-info",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
});
window.addEventListener('load', function() {
    if(document.querySelector("#formComercial")){
        let formComercial = document.querySelector("#formComercial");
        formComercial.onsubmit = function(e) {
            e.preventDefault();
            let intProforma = document.querySelector('#txtProforma').value;
            let strPuerto = document.querySelector('#txtPuerto').value;
            let strMarca = document.querySelector('#txtMarca').value;
            let intStatus = document.querySelector('#listStatus').value;
            if(intProforma == '' || strPuerto == '' || strMarca == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }
           
            divLoading.style.display = "flex";
           
            let request = (window.XMLHttpRequest) ? 
                            new XMLHttpRequest() : 
                            new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Comercial/setComercial'; 
            let formData = new FormData(formComercial);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("", objData.msg ,"success");
                        document.querySelector("#idComercial").value = objData.idcomercial;
                       
                        if(rowTable == ""){
                            tableComercial.api().ajax.reload();
                        }else{
                           htmlStatus = intStatus == 1 ? 
                            '<span class="badge badge-success">Activo</span>' : 
                            '<span class="badge badge-danger">Inactivo</span>';
                            rowTable.cells[1].textContent = intProforma;
                            rowTable.cells[2].textContent = strPuerto;
                            rowTable.cells[3].textContent = strMarca;
                            rowTable.cells[4].innerHTML =  htmlStatus;
                            rowTable = ""; 
                        }
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    
    fntEspecies();
}, false);


function fntViewInfo(idComercial){
    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Comercial/getComercial/'+idComercial;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
               
                let objComercial = objData.data;
                let estadoProducto = objComercial.status == 1 ?                
                '<span class="badge badge-success">Activo</span>' : 
                '<span class="badge badge-danger">Inactivo</span>';

                /*let objEspecie = objData.data;
                let estadoTipoEspecie = objData.data.status == 1 ?;*/

                document.querySelector("#celProforma").innerHTML = objComercial.nprofor;
                document.querySelector("#celPuerto").innerHTML = objComercial.puerto;
                document.querySelector("#celMarca").innerHTML = objComercial.marca;
                document.querySelector("#celEspecie").innerHTML = objComercial.tb_especie;
                document.querySelector("#celStatus").innerHTML = estadoProducto;
                document.querySelector("#celDescripcion").innerHTML = objComercial.descripcion;

                $('#modalViewComercial').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    } 
}

function fntEditInfo(element,idComercial){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Orden";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";
    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Comercial/getComercial/'+idComercial;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
              
                let objComercial = objData.data;
                document.querySelector("#idComercial").value = objComercial.idcomercial;
                document.querySelector("#txtProforma").value = objComercial.nprofor;
                document.querySelector("#txtDescripcion").value = objComercial.descripcion;
                document.querySelector("#txtPuerto").value = objComercial.puerto;
                document.querySelector("#txtMarca").value = objComercial.marca;
                document.querySelector("#listEspecie").value = objComercial.especieid;
                document.querySelector("#listStatus").value = objComercial.status; 
                $('#listEspecie').selectpicker('render');
                $('#listStatus').selectpicker('render');
               

                       
                $('#modalFormComercial').modal('show');
            }else{
                swal("Error", objData.msg , "error");
            }
        }
    }
}

function fntDelInfo(idComercial){
    swal({
        title: "Eliminar Orden",
        text: "¿Realmente quiere eliminar la orden?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Comercial/delComercial';
            let strData = "idComercial="+idComercial;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableComercial.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}



function fntEspecies(){
    if(document.querySelector('#listEspecie')){
        let ajaxUrl = base_url+'/Especies/getSelectEspecies';
        let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET",ajaxUrl,true);
        request.send();
        request.onreadystatechange = function(){
            if(request.readyState == 4 && request.status == 200){
                document.querySelector('#listEspecie').innerHTML = request.responseText;
                $('#listEspecie').selectpicker('render');
            }
        }
    }
}


function openModal()
{
    rowTable = "";
    document.querySelector('#idComercial').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nueva Orden";
    document.querySelector("#formComercial").reset();
  
    $('#modalFormComercial').modal('show');

}