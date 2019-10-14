

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
																	<th>Acci&oacute;n</th>											
																</tr>
															</thead>
															<tbody>
																<?php $i=1;?>
																<?php foreach ($persona as $row) { 

																	$fa = $this->db->query("SELECT *
																							FROM familiar
																							WHERE beneficiario_id = '$row->id' ")->row();
																	$con = $this->db->query("SELECT *
																							FROM condominio
																							WHERE id = '$row->condominio_id' ")->row();


																	?>
																	<tr>
																		<td><?php echo $i++; ?></td>
																		<td><?php echo $row->nombres; ?> <?php echo $row->paterno; ?> <?php echo $row->materno; ?></td>
																		<?php if ($fa) { ?>
																		<td><?php echo $fa->nombres; ?> <?php echo $fa->paterno; ?> <?php echo $fa->materno; ?></td> 
																		<?php } else {?>    
																		<td>No corresponde</td>
																		<?php } ?>
																		<td><?php echo $con->descripcion; ?> - <?php echo $con->ciudad; ?></td> 
																		<td>
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
							</div>

<script type="text/javascript">
	$(document).ready(function() {
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
} );
</script>


							

		