<!-- Modal -->
<div class="modal fade" id="modalFormComercial" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
      <div class="modal-body">
            <form id="formComercial" name="formComercial" class="form-horizontal">
              <input type="hidden" id="idComercial" name="idComercial" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label class="control-label">Nº Proforma<span class="required">*</span></label>
                      <input class="form-control" id="txtProforma" name="txtProforma" type="text" required="">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Descripción Producto</label>
                      <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" ></textarea>
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Puerto <span class="required">*</span></label>
                        <input class="form-control" id="txtPuerto" name="txtPuerto" type="text" required="">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Marca <span class="required">*</span></label>
                            <input class="form-control" id="txtMarca" name="txtMarca" type="text" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="listEspecie">Especie <span class="required">*</span></label>
                            <select class="form-control" data-live-search="true" id="listEspecie" name="listEspecie" required=""></select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listStatus">Estado <span class="required">*</span></label>
                            <select class="form-control selectpicker" id="listStatus" name="listStatus" required="">
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                       <div class="form-group col-md-6">
                           <button id="btnActionForm" class="btn btn-primary btn-lg btn-block" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>
                       </div> 
                       <div class="form-group col-md-6">
                           <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                       </div> 
                    </div>  
                </div>
              </div>           
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewComercial" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la Orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
       
      
      <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-6">
                  <h2 class="page-header"><i class="fa fa-globe"></i> FISHCORP S.A.</h2>
                </div>
                <div class="col-6">
                  <h5 class="text-right">Date: 08/09/2022</h5>
                </div>
              </div>  
              <div class="row invoice-info">
                <div class="col-4"> RESPONSABLE:
                    <br> <td><?= $_SESSION['userData']['nombrerol']; ?></td> <br> 
                  <address><strong>
                    <td><?= $_SESSION['userData']['nombres']; ?></td>
                    <td><?= $_SESSION['userData']['apellidos']; ?></td>
                    </strong><br><td><?= $_SESSION['userData']['identificacion']; ?></td><br>
                    <td><?= $_SESSION['userData']['telefono']; ?></td>
                    <br> <td><?= $_SESSION['userData']['email_user']; ?></td><br></address>
                </div>

                <div class="col-4">Cliente
                  <address><strong>John Doe</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br>Phone: (555) 539-1037<br>Email: john.doe@example.com</address>
                </div>
                <div class="col-4"><b>Código <td id="celCodigo"></td></b><br><br><b>Order ID:</b> 4F3S8J<br><b>Payment Due:</b> 2/22/2014<br><b>Account:</b> 968-34567</div>
              </div>
              <div class="row">
                <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                          <tr>
                              <th>Nº Proforma</th>
                              <th>Puerto Destino</th>
                              <th>Marca</th>
                              <th>Especie</th>
                              <th>Status</th>
                              <th>Descripción</th>
                          </tr>
                    </thead>
                    <tbody>
                          <tr>
                              <td id="celProforma"></td>
                              <td id="celPuerto"></td>
                              <td id="celMarca"></td>
                              <td id="celEspecie"></td>
                              <td id="celStatus"></td>
                              <th id="celDescripcion"></th>
                          </tr>
                      
                    </tbody>
                </table>
              </div>

              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="modalViewProducto;"  target="_blank"><i class="fa fa-print"></i> Imprimir</a></div>
              </div>
            </section>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

