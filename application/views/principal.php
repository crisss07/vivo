<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-image: url(../vivo/public/assets/imagenes/formulario1.jpg);
		  overflow: hidden;">

				<!-- BEGIN: Left Aside -->
				

					<!-- BEGIN: Aside Menu -->
					

					<!-- END: Aside Menu -->

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="m-subheader__title "></h3>
						</div>
						<div  style=" float: right; margin-right: 20px; ">
							<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
								<a href="<?= base_url('Administrador'); ?>" type="button" class="btn m-btn--pill btn-success">Administrar</a>
								
							</span>
						</div>
					</div>

					<!-- BEGIN: Subheader -->
					

					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">

								<div class="col-md-5">

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
										<?php echo form_open('Persona/insertar', array('method'=>'POST', 'class' => 'm-form m-form--fit m-form--label-align-right')); ?>
										<!-- <form class="m-form m-form--fit m-form--label-align-right" action="/"> -->
											<div class="m-portlet__body">
												<div class="form-group m-form__group">
													<label for="exampleSelect1">¿A cu&aacute;l proyecto desea postular?</label>
													<select class="form-control m-input m-input--air m-input--pill" id="exampleSelect1" name="condominio_id">
														<option value="">ELIJA UNA OPCION</option>
														<?php foreach ($condominios as $con) {	?>
														<option value="<?php echo $con->id ?>"><?php echo $con->descripcion ?> - <?php echo $con->ciudad ?></option>
														<?php } ?>
													</select>
												</div>

												<div>
													<input type="text" hidden name="fec_nacimiento" id="fecha">
												</div>
												<div class="form-group m-form__group row">
													<label for="example-text-input" class="col-4 col-form-label">Carnet Identidad:</label>
													<div class="col-4">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci" id="ci1" required>

													</div>

													<div class="col-3">								
															<div class="m-section__content m-demo-dropdowns" >
																<div class="m-dropdown m-dropdown--inline m-dropdown--large m-dropdown--arrow m-dropdown--align-left" m-dropdown-toggle="hover" >
																	<button type="button" class="btn m-btn--pill btn-success" onclick="buscar();">Buscar</button>
																</div>
															</div>																	
														
													</div>
												</div>
												<!-- <div class="form-group m-form__group row">
													<div class="col-lg-4">
														<label class="">Carnet Identidad:</label>
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci" id="ci1" required>
														<span class="m-form__help">Por favor ingrese su C.I.</span>
													</div>
													<div class="col-lg-3">
														<label class="" >´</label>
														<button type="button" onclick="buscar()"> gola</button>
														<button type="button" onclick="buscar()" class="form-control m-input m-input--air m-input--pill btn-success" style="text-align: center;">Buscar</button>
														<span class="m-form__help"></span>
													</div>
												</div> -->
												<div class="form-group m-form__group row">
													<div class="col-lg-4">
														<label class="">Nombres:</label>
														<input type="text" class="form-control m-input m-input--air m-input--pill" readonly name="nombres" id="nombres">
													</div>
													<div class="col-lg-4">
														<label class="">Apellido Paterno:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="text" class="form-control m-input m-input--air m-input--pill" readonly name="paterno" id="paterno">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
													</div>
													<div class="col-lg-4">
														<label class="">Apellido Materno:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="text" class="form-control m-input m-input--air m-input--pill" readonly name="materno" id="materno">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-8">
														<label class="">Domicilio:</label>
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="direccion" required>
														<span class="m-form__help">Por favor ingrese su domicilio</span>
													</div>
													<div class="col-lg-4">
														<label for="exampleSelect1">Departamento</label>
															<select class="form-control m-input m-input--air m-input--pill" id="departamento" name="departamento">
																<option value="La Paz">La Paz</option>
																<option value="Cochabamba">Cochabamba</option>
																<option value="Santa Cruz">Santa Cruz</option>
																<option value="Beni">Beni, Trinidad</option>
																<option value="Pando">Pando, Cobija</option>
																<option value="Potosi">Potosi</option>
																<option value="Oruro">Oruro</option>
																<option value="Tarija">Tarija</option>
																<option value="Sucre">Sucre, Chuquisaca</option>
															</select>
													</div>

												</div>
												<div class="form-group m-form__group row">
													<div class="col-lg-5">
														<label class="">N&uacute;mero de Celular:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="number" class="form-control m-input m-input--air m-input--pill" name="telefono_celular" required="">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
														<span class="m-form__help">Por favor ingrese su # de Celular</span>
													</div>
													<div class="col-lg-7">
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
													<!-- <button type="submit" class="btn m-btn--pill  btn-accent" id="siguiente">Siguiente</button>
													<button type="button" onclick="agregarform()" class="btn m-btn--pill    btn-success">Agregar Conyugue</button> -->
												</div>
												</center>
											</div>
										<!-- </form> -->

										<!--end::Form-->
									</div>

									<!--end::Portlet-->
								</div>

								<!-- COMIENZO DE LA PRUEBA -->
								
								<!-- FIN DE LA PRUEBA -->

								<div class="col-md-5">
									<!--begin::Portlet-->
									<div class="m-portlet m-portlet--tab">
										<div class="m-portlet__head">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														DATOS DE CONYUGUE (Si Corresponde)
													</h3>
												</div>
											</div>
										</div>

									<!--begin::Form-->
										<!-- <?php echo form_open('Persona/insertar', array('method'=>'POST', 'class' => 'm-form m-form--fit m-form--label-align-right')); ?> -->
										<!-- <form class="m-form m-form--fit m-form--label-align-right"> -->
											<div class="m-portlet__body ">

												<div>
													<input type="text" hidden name="fec_nacimiento_c" id="fecha_c">
												</div>
												<div class="form-group m-form__group row">
													<label for="example-text-input" class="col-4 col-form-label">Carnet Identidad:</label>
													<div class="col-4">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci2">

													</div>

													<div class="col-3">								
															<div class="m-section__content m-demo-dropdowns" >
																<div class="m-dropdown m-dropdown--inline m-dropdown--large m-dropdown--arrow m-dropdown--align-left" m-dropdown-toggle="hover" >
																	<button type="button" class="btn m-btn--pill btn-success" onclick="buscar2();">Buscar</button>
																</div>
															</div>																	
														
													</div>
												</div>
												<!-- <div class="form-group m-form__group row">
													<div class="col-lg-4">
														<label class="">Carnet Identidad:</label>
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci2">
														<span class="m-form__help">Por favor ingrese su C.I.</span>
													</div>
												</div> -->
												<div class="form-group m-form__group row">
													<div class="col-lg-4">
														<label class="">Nombres:</label>
														<input type="text" class="form-control m-input m-input--air m-input--pill" readonly name="nombres_c" id="nombres_c">
													</div>
													<div class="col-lg-4">
														<label class="">Apellido Paterno:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="text" class="form-control m-input m-input--air m-input--pill" readonly name="paterno_c" id="paterno_c">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
													</div>
													<div class="col-lg-4">
														<label class="">Apellido Materno:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="text" class="form-control m-input m-input--air m-input--pill" readonly name="materno_c" id="materno_c">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
													</div>
												</div>
												<!-- <div class="form-group m-form__group row">
													<div class="col-lg-12">
														<label class="">Domicilio:</label>
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="direccion_c" required>
														<span class="m-form__help">Por favor ingrese su domicilio</span>
													</div>
												</div> -->
												<div class="form-group m-form__group row">
													<div class="col-lg-5">
														<label class="">N&uacute;mero de Celular:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="number" class="form-control m-input m-input--air m-input--pill" name="telefono_celular_c">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
														<span class="m-form__help">Por favor ingrese su # de Celular</span>
													</div>
													<div class="col-lg-7">
														<label class="">Email:</label>
														<div class="m-input-icon m-input-icon--right">
															<input type="email" class="form-control m-input m-input--air m-input--pill" name="email_c">
															<span class="m-input-icon__icon m-input-icon__icon--right"></span>
														</div>
														<span class="m-form__help">Por favor ingrese su Correo Electr&oacute;nico</span>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__foot--fit" >
												<center>
												<div class="m-form__actions">
													<button type="submit" id="verificar" class="btn m-btn--pill btn-accent">Siguiente</button>
													<!-- <button type="button" class="btn m-btn--pill    btn-success">Agregar Conyugue</button> -->
												</div>
												</center>
											</div>
										</form>

										<!--end::Form-->
									</div>

									<!--end::Portlet-->
								</div>
							
							
						</div>
					</div>
				</div>
			</div>

			<!-- end:: Body -->


<script type="text/javascript">
function buscar()
	{
    	var ci = $("#ci1").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>Persona/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
            	//alert(data);
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data.message);
	            if (data.estado == 'registrado') {
	            	alerta();
	            	$("#verificar").prop('type', 'button');
	            }
	            else
	            {

	            	if (data.estado == 'noEdad') {
	            		alerta_edad();
	            		$("#verificar").prop('type', 'button');
	            	}
	            	else
	            	{
	            		$("#verificar").prop('type', 'submit');
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
	            	}
           		}  

            },
            error:function(jqXHR, textStatus, errorThrown) {
                alerta_ci();
            }
        });
  }
   
</script>

<script type="text/javascript">

function buscar2()
{
        var ci = $("#ci2").val();
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        $.ajax({
            url: '<?php echo base_url(); ?>Persona/ajax_verifica/',
            type: 'GET',
            dataType: 'json',
            data: {csrfName: csrfHash, param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {
                //alert("Se envio bien");
                // csrfName = data.csrfName;
                // csrfHash = data.csrfHash;
                // alert(data.message);

                if (data.estado == 'registrado') {
	            	alerta();
	            	$("#verificar").prop('type', 'button');
	            }
	            else
	            {
	            	if (data.estado == 'noEdad') {
	            		alerta_edad();
	            		$("#verificar").prop('type', 'button');
	            	}
	            	else
	            	{
	            		$("#verificar").prop('type', 'submit');
   			            if (data.estado == 'segip') {
			                    $("#msg_error_catastral").hide();
			                    $("#msg_sucess_catastral").show();
			                    $("#msg_alerta_catastral").show();
			                    $("#ci").val(data.ci);
			                    $("#msg_sucess_catastral").html('Esta registrado en el SEGIP la persona con Cedula de Identidad Numero: '+data.ci);
			                    $('#nombres_c').val(data.nombres);
			                    $('#paterno_c').val(data.paterno);
			                    $('#materno_c').val(data.materno);
			                    $('#fecha_c').val(data.fec_nacimiento);
			                    }else{
			                    $("#msg_sucess_catastral").hide();
			                    $("#msg_error_catastral").show();
			                    $("#msg_alerta_catastral").hide();
			                    $("#msg_error_catastral").html('La persona no existe ni en la base de datos ni en el segip: '+data.ci);
			                    $('#nombres_c').val('');
			                    $('#paterno_c').val('');
			                    $('#materno_c').val('');
			                    $("#nombres_c").prop("disabled", false);

			                    $("#paterno_c").prop("disabled", false);

			                    $("#materno_c").prop("disabled", false);
			                }
			        }
	            }
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
 }
   
</script>

<script type="text/javascript">
    function agregarform()
        {
              $('.item').hide('slow');
              $("#bloque_1").show('slow');
        }
</script>
<script>
function alerta_edad(){
Swal.fire({
  // type: 'error',
  title: 'Oops...',
  text: 'El beneficio es solo para personas que tengan la edad entre 18 años y 29 años!',
  imageUrl: '<?php echo base_url(); ?>public/imagenes/mal.png',
  imageWidth: 300,
  imageHeight: 200,
  imageAlt: 'Custom image',
  animation: false
})
//location.reload();
}
</script>
<script>
function alerta(){
Swal.fire({
  // type: 'error',
  title: 'Oops...',
  text: 'Usted ya esta registrado!. '+'Solo puede registrarse una vez.',
  imageUrl: '<?php echo base_url(); ?>public/imagenes/mal.png',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  animation: false
})
}
</script>
<script>
function alerta_ci(){
Swal.fire({
  // type: 'error',
  title: 'Oops...',
  text: 'No es un Carnet Valido!',
  imageUrl: '<?php echo base_url(); ?>public/imagenes/mal.png',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  animation: false
})
//location.reload();
}
</script>

