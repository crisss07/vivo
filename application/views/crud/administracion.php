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

									<!-- BEGIN: Subheader -->


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
																	ADMINISTRAR CONDOMINIOS
																</h3>
															</div>
														</div>
													</div>

													<div class="m-portlet__body">
														<button type="button" class="btn btn-success" data-toggle="modal" data-target="#m_modal_1">adicionar</button>
													</div> 


														<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
									<thead>
										<tr>
											<th>Nro</th>
											<th>Descripcion</th>
											<th>Ciudad</th>
											<th>Precio</th>
											<th>Acciones</th>											
										</tr>
									</thead>
									<tbody>
                                            <?php $i=1;?>
                                            <?php foreach ($datos as $row) {
                                               $datos = $row->id."||".
                                               $row->descripcion."||".
                                               $row->ciudad."||".
                                               $row->valor;
                                                ?>
                                               <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row->descripcion; ?></td>    
                                                <td><?php echo $row->ciudad; ?></td>  
                                                <td><?php echo $row->valor; ?></td> 
                                                
                                                                 
                                                <td>
                                                    <a href=""><button type="button" class="btn btn-warning"><span class="fas fas fa-edit" aria-hidden="true"></span></button></a>                                                  
                                                                                                        
                                                                                                  
                                                </td>                                                
                                            </tr>
                                            <?php } ?>
                                    </tbody>
								</table>							
						</div>



													
												</div>

												<!--end::Portlet-->

												<!--begin::Portlet-->


												<!--end::Portlet-->

												<!--begin::Portlet-->


												<!--end::Portlet-->
											</div>
											<div class="col-md-6">

											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">ADICIONAR</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<!--begin::Form-->
											<?php echo form_open('Administrador/create', array('method'=>'POST', 'class' => 'm-form m-form--fit m-form--label-align-right')); ?>
											<!--<form class="m-form m-form--fit m-form--label-align-right">-->

												<div class="m-portlet__body">
													

													<div class="form-group m-form__group">
														<label for="example-text-input" >Descripcion</label>
															<input class="form-control m-input m-input--air m-input--pill" type="text" value="" id="example-text-input" name="descripcion" required="">
													</div>

											

													<div class="form-group m-form__group">
														<label for="exampleSelect1">Ciudad</label>
														
															<select name="ciudad" class="form-control m-input m-input--air m-input--pill" onchange="showDivPagoEF('hidden_pago_ef', this)" required="">
																<option value=""></option>
																<option value="LA PAZ">LA PAZ</option>
																<option value="COCHABAMBA">COCHABAMBA</option>
																<option value="SANTA CRUZ">SANTA CRUZ</option>
															</select>
														

													</div>
													<div class="form-group m-form__group">
														<label for="example-text-input">Precio</label>
													
															<input class="form-control m-input m-input--air m-input--pill" type="number" value="" id="example-text-input" name="valor" required="">
														
													</div>

												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">

														</div>
													</div>
												</div>



											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-success">Guardar</button>
											</div>

										</form>
									</div>
								</div>
							</div>