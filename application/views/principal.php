<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-image: url(../vivo/public/assets/imagenes/formulario1.jpg);
		  overflow: hidden;">

				<!-- BEGIN: Left Aside -->
				

					<!-- BEGIN: Aside Menu -->
					

					<!-- END: Aside Menu -->

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					

					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-md-6">

								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													AEV - REGISTRO DE POSTULANTES
												</h3>
											</div>
										</div>
									</div>

									


									<!--begin::Form-->
									<?php echo form_open('Persona/insertar', array('method'=>'POST')); ?>
									<!-- <form class="m-form m-form--fit m-form--label-align-right" action="/"> -->
										<div class="m-portlet__body">
											<div class="form-group m-form__group">
												<label for="exampleSelect1">¿A cu&aacute;l proyecto desea postular?</label>
												<select class="form-control m-input m-input--air m-input--pill" id="exampleSelect1" name="condominio_id">
													<option value="">ELIJA UNA OPCION</option>
													<?php foreach ($condominios as $con) {	?>
													<option value="<?php echo $con->condominio_id ?>"><?php echo $con->descripcion ?></option>
													<?php } ?>
												</select>
											</div>

											<div>
												<input type="text" hidden name="fec_nacimiento" id="fecha">
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label class="">N&uacute;mero de Carnet Identidad:</label>
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci" id="ci1" required>
													<span class="m-form__help">Por favor ingrese su C.I.</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label class="">Nombres:</label>
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="nombres" id="nombres">
												</div>
												<div class="col-lg-4">
													<label class="">Apellido Paterno:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno" id="paterno">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
												</div>
												<div class="col-lg-4">
													<label class="">Apellido Materno:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="materno" id="materno">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-12">
													<label class="">Domicilio:</label>
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="direccion" required>
													<span class="m-form__help">Por favor ingrese su domicilio</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="">N&uacute;mero de Celular:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="number" class="form-control m-input m-input--air m-input--pill" name="telefono_celular">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
													<span class="m-form__help">Por favor ingrese su # de Celular</span>
												</div>
												<div class="col-lg-6">
													<label class="">Email:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="email" class="form-control m-input m-input--air m-input--pill" name="email" required>
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
													<span class="m-form__help">Por favor ingrese su Correo Electr&oacute;nico</span>
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit" >
											<center>
											<div class="m-form__actions">
												<button type="submit" class="btn btn-primary">Guardar</button>
												<button type="reset" class="btn btn-secondary">Cancelar</button>
											</div>
											</center>
										</div>
									</form>

									<!--end::Form-->
								</div>

								<!--end::Portlet-->

								<!--begin::Portlet-->
								

								<!--end::Portlet-->

								<!--begin::Portlet-->
								

								<!--end::Portlet-->

								<!--begin::Portlet-->
								

								<!--end::Portlet-->
							</div>
							
						</div>
					</div>
				</div>
			</div>

			<!-- end:: Body -->
<script type="text/javascript">

    $("#ci1").focusout(function(){
        var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>persona/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data.message);
              if (data.estado == 'segip') {
                        $("#msg_error_catastral").hide();
                    $("#msg_sucess_catastral").show();
                    $("#msg_alerta_catastral").show();
                        $("#ci").val(data.ci);
                    $("#msg_sucess_catastral").html('Esta registrado en el SEGIP la persona con Cedula de Identidad Numero: '+data.ci);
                    $('#nombres').val(data.nombres);
                    $('#paterno').val(data.paterno);
                    $('#materno').val(data.materno);
                    $('#fecha').val(data.fec_nacimiento);
                    }else{
                    $("#msg_sucess_catastral").hide();
                     $("#msg_error_catastral").show();
                     $("#msg_alerta_catastral").hide();
                    $("#msg_error_catastral").html('La persona no existe ni en la base de datos ni en el segip: '+data.ci);
                    $('#nombres').val('');
                    $('#paterno').val('');
                    $('#materno').val('');
                    $("#nombres").prop("disabled", false);

                    $("#paterno").prop("disabled", false);

                    $("#materno").prop("disabled", false);
                }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });

   
</script>