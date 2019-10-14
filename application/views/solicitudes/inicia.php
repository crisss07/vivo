<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-image: url(<?php echo base_url(); ?>/public/assets/imagenes/formulario1.jpg);
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
							<div class="col-md-5">

								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--brand m-portlet--head-solid-bg m-portlet--bordered">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													CALCULO DE CUOTA
												</h3>
											</div>
										</div>
									</div>
									<?php //echo vdebug($datos_credito, false, false, true); ?>

									<!--begin::Form-->
									<?php echo form_open('Persona/insertar', array('method'=>'POST', 'class' => 'm-form m-form--fit m-form--label-align-right')); ?>
									<!-- <form class="m-form m-form--fit m-form--label-align-right" action="/"> -->

												<!--begin::Preview-->
												<div class="m-demo">
													<div class="m-demo__preview">
														<div class="m-list-timeline">
															<div class="m-list-timeline__items">
																<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																	<span class="m-list-timeline__text">Ingresos liquidos mensuales</span>
																	<span class="m-list-timeline__time"><?php echo $datos_credito['ingreso_mensual']; ?></span>
																</div>
																<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--danger"></span>
																	<span class="m-list-timeline__text">Ingresos liquidos mensuales conyugue</span>
																	<span class="m-list-timeline__time"><?php echo $datos_credito['ingreso_conyugue']; ?></span>
																</div>
																<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--warning"></span>
																	<span class="m-list-timeline__text">Condominio</span>
																	<span class="m-list-timeline__time"><?php echo $datos_credito['ingreso_mensual']; ?></span>
																</div>
																<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--primary"></span>
																	<span class="m-list-timeline__text">Tasa de interes</span>
																	<span class="m-list-timeline__time">5.5%</span>
																</div>
																<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
																	<span class="m-list-timeline__text">Plazo</span>
																	<span class="m-list-timeline__time">25 a&nacute;os</span>
																</div>
																<div class="m-list-timeline__item">
																	<span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
																	<span class="m-list-timeline__text">Garantia</span>
																	<span class="m-list-timeline__time">El mismo Inmueble</span>
																</div>
															</div>
														</div>
													</div>
													<table class="table m-table m-table--head-bg-brand">
													<thead>
														<tr>
															<th>#</th>
															<th>Descripcion</th>
															<th>Valor Inmueble</th>
															<th>Cuota Mensual</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Condominio Wiphala</td>
															<td>45000</td>
															<td>216 $us</td>
															<td>
																<a href="#" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only">
																	<i class="fa fa-check"></i>
																</a>															
															</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Condominio Mercenario</td>
															<td>35000</td>
															<td>216 $us</td>
															<td>
																<a href="#" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only">
																	<i class="fa fa-ban"></i>
																</a>															
															</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Condominio Papa Francisco</td>
															<td>25000</td>
															<td>216 $us</td>
															<td>
																<a href="#" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only">
																	<i class="fa fa-check"></i>
																</a>															
															</td>
														</tr>
														
													</tbody>
												</table>
												</div>


												<!--end::Preview-->

											
										
										<div class="m-portlet__foot m-portlet__foot--fit" >
											<center>
											<div class="m-form__actions">
												<button type="submit" class="btn m-btn--pill    btn-accent">Siguiente</button>
												<button type="button" onclick="agregarform()" class="btn m-btn--pill    btn-success">Agregar Conyugue</button>
											</div>
											</center>
										</div>
									</form>

									<!--end::Form-->
								</div>

								<!--end::Portlet-->
							</div>

							<!-- COMIENZO DE LA PRUEBA -->
							
							<!-- FIN DE LA PRUEBA -->

							<div class="col-md-5 item" id="bloque_1" style="display: none;">
								<!--begin::Portlet-->
								<div class="m-portlet m-portlet--tab">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Datos del Papa
												</h3>
											</div>
										</div>
									</div>

									<div class="m-portlet">
                  
										<ul class="nav nav-pills nav-fill" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">Independientes</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">Dependientes</a>
											</li>
										</ul>
										<div class="tab-content">
													<?php //echo form_open('Persona/insertar', array('method'=>'POST', 'class' => 'm-form m-form--fit m-form--label-align-right')); ?>
													<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="/">
														<div class="m-portlet__body">

															<div class="form-group m-form__group row">
																<div class="col-lg-4">
																	<label class="">N&uacute;mero de Carnet Identidad:</label>
																	<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci2" required>
																</div>
															</div>
															<div class="form-group m-form__group row">
																<div class="col-lg-6">
																	<label class="">Tipo:</label>
																	<select class="form-control m-input" id="exampleSelect1">
																		<option>Comercio</option>
																		<option>Servicios</option>
																		<option>Productivo</option>
																	</select>
																</div>
																<div class="col-lg-6">
																	<label class="">Monto:</label>
																	<div class="m-input-icon m-input-icon--right">
																		<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="paterno_c">
																		<span class="m-input-icon__icon m-input-icon__icon--right"></span>
																	</div>
																</div>
																
															</div>
															
														</div>
														<div class="m-portlet__foot m-portlet__foot--fit" >
															<center>
															<div class="m-form__actions">
																<button type="submit" class="btn m-btn--pill    btn-accent">Solicitar</button>
																<button type="button" class="btn m-btn--pill    btn-success">Pedir Ayuda</button>
															</div>
															</center>
														</div>
													</form>

											</div>
											<div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
													
											</div>
								</div>


								<!--begin::Form-->
									

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

<script type="text/javascript">

    $("#ci2").focusout(function(){
        var ci = $("#ci2").val();
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
            },
            error:function(jqXHR, textStatus, errorThrown) {
                // alert("error");
            }
        });
    });

   
</script>

<script type="text/javascript">
    function agregarform()
        {
              $('.item').hide('slow');
              $("#bloque_1").show('slow');
        }

    function muestra()
    {
    	alert('Si entro');
    }
</script>