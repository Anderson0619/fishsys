<!-- Modal -->
<div class="modal fade" id="modalFormCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
      <div class="modal-body">
            <form id="formCliente" name="formCliente" class="form-horizontal">
              <input type="hidden" id="idCliente" name="idCliente" value="">
              <!-- <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p> -->
              <p class="text-primary">Datos de Contacto.</p>
              <div class="form-row">
                 <div class="form-group col-md-4">
                    <label for="listTipClient">Tipo</label>
                    <select class="form-control selectpicker" id="listTipClient" name="listTipClient" required >
                        <option value="1">COMERCIANTE</option>
                        <option value="2">EMPRESA</option>
                        <option value="3">EMPLEADOS</option>
                        <option value="4">PARTICULAR</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="txtIdentificacion">Cédula/Ruc</label>
                  <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" >
                </div>
                <div class="form-group col-md-4">
                  <label for="txtNombre">Nombres</label>
                  <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" >
                </div>
                <div class="form-group col-md-4">
                  <label for="txtApellido">Apellidos</label>
                  <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" >
                </div>
              </div>
              <hr>
              <p class="text-primary">Datos de Contacto.</p>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtDireccion">Dirección</label>
                  <input class="form-control" type="text" id="txtDireccion" name="txtDireccion" >
                </div>
               <div class="form-group col-md-4">
                  <label for="txtTelefono">Teléfono</label>
                  <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" onkeypress="return controlTag(event);">
                </div>
                <div class="form-group col-md-4">
                  <label for="txtEmail">Email</label>
                  <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" >
                </div>
              </div>
             <div class="form-row">
                
             </div>
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewCliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celIdentificacion">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">Jacob</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">Larry</td>
            </tr>
            <tr>
              <td>Tipo de Cliente:</td>
              <td id="celTipCliente">Larry</td>
            </tr>
            <tr>
              <td>Dirección:</td>
              <td id="celDireccion">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

