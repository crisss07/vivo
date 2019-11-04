

								<style>
									#hidden_div {
										display: none;
									}
									#hidden_pago_m {
										display: none;
									}
									#hidden_pago_ef {
										display: none;
									}
								</style>
								<!-- begin::Body -->
								<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-image: url(<?php echo base_url(); ?>/public/assets/imagenes/formulario2.jpg);
								overflow: hidden;">

								<!-- BEGIN: Left Aside -->


								<!-- END: Left Aside -->
									<div class="m-grid__item m-grid__item--fluid m-wrapper">

										<!-- END: Subheader -->
										<div class="m-content">
											<div class="row">
												<div class="col-md-10">



													<!--begin::Portlet-->
													<div class="m-portlet m-portlet--tab">
														<div class="m-portlet__head">
															<div class="m-portlet__head-caption">
																<div class="m-portlet__head-title">
																	<span class="m-portlet__head-icon m--hide">
																		<i class="la la-gear"></i>
																	</span>
																	<h3 class="m-portlet__head-text">
																		PERSONAS REGISTRADAS
																	</h3>
																</div>
															</div>
														</div>
														<!-- <div class="m-portlet__body">
															<button type="button" class="btn btn-success" data-toggle="modal" data-target="#m_modal_1">adicionar</button>
														</div>  -->
														<div class="m-portlet__body">

															<!--begin: Datatable -->
															<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
																<thead>
																	<tr>
																		<th>Nro</th>
																		<th>Beneficiario</th>
																		<th>Conyugue</th>
																		<th>Beneficio al que Postula</th>	
																		<th>Aplica</th>	
																		<th>Acci&oacute;n</th>											
																	</tr>
																</thead>
																<tbody>
																	<?php $i=1;?>
																	<?php foreach ($persona as $row) { 
																		
																		$fa = $this->db->query("SELECT *
																								FROM familiar
																								WHERE beneficiario_id = '$row->id' 
																								AND relacion = 'conyugue'")->row();
																		$con = $this->db->query("SELECT *
																								FROM condominio
																								WHERE id = '$row->condominio_id' ")->row();
																		$sol = $this->db->query("SELECT *
																								FROM solicitudes
																								WHERE beneficiario_id = '$row->id' ")->row();


																		?>
																		<tr>
																			<td><?php echo $i++; ?></td>
																			<td><?php echo $row->nombres; ?> <?php echo $row->paterno; ?> <?php echo $row->materno; ?></td>
																			<?php if ($fa) { ?>
																			<td><?php echo $fa->nombres; ?></td> 
																			<?php } else {?>    
																			<td>No corresponde</td>
																			<?php } ?>
																			<td><?php echo $con->descripcion; ?> - <?php echo $con->ciudad; ?></td> 
																			<td><?php echo $sol->aprobado; ?></td> 
																			<td>
																			<!-- <input type="hidden" name="padre_beneficiario_nombre_1" id="valor" value="<?php echo $row->id; ?>"> -->
																				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#Modal_insert" onclick="buscar('<?php echo $row->id; ?>');">
																					<span class="fas fa-info-circle" aria-hidden="true">
																					</span>
																				</button>    
																				<a href="<?php echo base_url('Administrador_Persona/delete/'.$row->id); ?>" type="button" class="btn btn-danger ">
																					<span class="fas fa-trash-alt" aria-hidden="true">
																					</span>
																				</a>   
																				                                            
																			</td>                                                
																		</tr>
																	<?php } ?>
																</tbody>
															</table>							
														</div>
													</div>
												</div>
												<div class="col-md-6">
												</div>
											</div>
										</div>
									</div>


								<div class="modal fade" id="Modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
						            <div class="modal-dialog" role="document">
						                   
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
												
												<div class="m-portlet__body">
													<table class="table table-striped m-table">
														<tbody id="tabla_1">
															
														</tbody>
													</table>

												</div>

												
												<!--begin::Form-->
												<!-- <form class="m-form m-form--fit m-form--label-align-right" action="/"> -->

												<!--begin::Preview-->
												<!-- <div class="m-demo"> -->

													<div class="m-portlet__body">
														Listado Condominios
														<table class="table m-table m-table--head-bg-warning">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Descripcion</th>
																	<th>Ciudad</th>
																	<th>Valor Inmueble</th>
																	<th>Cuota Mensual</th>
																	<th>Sueldo ideal</th>
																</tr>
															</thead>
															<tbody id="tabla_2">

															</tbody>
														</table>
													</div>
												<!-- </div>
		 -->
												<!--end::Form-->
											</div>

									<!--end::Portlet-->
								
						                    
						            </div>
						        </div>

								
							</div>
<script>
      


  	function buscar(id)
	{
    	var ci = id;
        
        $.ajax({
            url: '<?php echo base_url(); ?>Administrador_Persona/consulta/',
            type: 'GET',
            dataType: 'json',
            data: {param1: ci},
            // data: {param1: cod_catastral},
            success:function(data, textStatus, jqXHR) {

            	var valor = '<tr>' +
            				'<th scope="row">' + 'Ingresos liquidos mensuales' + '</th>' +
		                	'<td align="right">' + data.ingreso_beneficiario + '</td>' +
					        '</tr>'+
					        '<tr>' +
            				'<th scope="row">' + 'Ingresos liquidos mensuales conyugue' + '</th>' +
		                	'<td align="right">' + data.ingreso_conyugue + '</td>' +
					        '</tr>'+
					        '<tr>' +
            				'<th scope="row">' + 'Ingresos padre beneficiario' + '</th>' +
		                	'<td align="right">' + data.ipb + '</td>' +
					        '</tr>'+
					        '<tr>' +
            				'<th scope="row">' + 'Ingresos madre beneficiario' + '</th>' +
		                	'<td align="right">' + data.imb + '</td>' +
					        '</tr>'+
					        '<tr>' +
            				'<th scope="row">' + 'Ingresos padre conyugue' + '</th>' +
		                	'<td align="right">' + data.ipc + '</td>' +
					        '</tr>'+
					        '<tr>' +
            				'<th scope="row">' + 'Ingresos madre conyugue' + '</th>' +
		                	'<td align="right">' + data.imc + '</td>' +
					        '</tr>'+
					        '<tr>' +
            				'<th scope="row">' + 'Total' + '</th>' +
		                	'<td align="right">' + data.monto_total + '</td>' +
					        '</tr>' +
					        '<tr>' +
							'<th scope="row">' + 'Tasa de interes' + '</th>' +
							'<td align="right">' + '5.5%' + '</td>' +
							'</tr>' +
							'<tr>' +
							'<th scope="row">' + 'Plazo' + '</th>' +
							'<td align="right">' + '25 ańos' + '</td>' +
							'</tr>';
					      $("#tabla_1").html(valor);

                var valor1 = '<tr>' +
		                	'<td>' + 1 + '</td>' +
					        '<td>' + data.descripcion + '</td>' +
					        '<td>' + data.ciudad + '</td>' +
					        '<td>' + data.valor + '</td>' +
					        '<td>' + data.cuota_mensual + '</td>' +
					        '<td>' + data.sueldo_prom + '</td>' +
					        '</tr>';
					      $("#tabla_2").html(valor1);

            },
            error:function(jqXHR, textStatus, errorThrown) {
                alert('no nada');
            }
        });
 	}

</script>



<script type="text/javascript">

    $('#m_table_1').DataTable( {
        "language": {
            "lengthMenu": "_MENU_ registros por página",
            "zeroRecords": "Nada encontrado - lo siento",
            "search": "Buscar",
            "info": "Mostrando la página  _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles.",
            "infoFiltered": "(filtrado de _MAX_ registros totales)"
        }
    } );
	 
</script>


							

		