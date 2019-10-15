<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-image: url(<?php echo base_url(); ?>/public/assets/imagenes/formulario1.jpg); overflow: hidden;">

	<div class="m-grid__item m-grid__item--fluid m-wrapper">

		<div class="m-content">
			<div class="row">
				<div class="col-md-4">

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
							<table class="table table-striped m-table" >
								<tbody>
									<tr>
										<th scope="row">Ingresos liquidos mensuales</th>
										<td align="right"><?php echo $datos_credito['ingreso_mensual']; ?></td>
									</tr>
									<tr>
										<th scope="row">Ingresos liquidos mensuales conyugue</th>
										<td align="right"><?php echo $datos_credito['ingreso_conyugue']; ?></td>
										<?php 
											$total = 0;
											$total = $datos_credito['ingreso_mensual'] + $datos_credito['ingreso_conyugue'];
										?>
									</tr>
									<tr>
										<th scope="row">Ingresos padre beneficiario</th>
										<td align="right" id="diipb">0</td>
									</tr>
									<tr>
										<th scope="row">Ingresos madre beneficiario</th>
										<td align="right">0</td>
									</tr>
									<tr>
										<th scope="row">Ingresos padre conyugue</th>
										<td align="right">0</td>
									</tr>
									<tr>
										<th scope="row">Ingresos madre conyugue</th>
										<td align="right">0</td>
									</tr>
									<tr>
										<th scope="row">Total</th>
										<td align="right" id="total_ingresos"><?php echo $total; ?></td>
									</tr>
									<tr>
										<th scope="row">Tasa de interes</th>
										<td align="right">5.5%</td>
									</tr>
									<tr>
										<th scope="row">Plazo</th>
										<td align="right">25 a&nacute;os</td>
									</tr>
								</tbody>
							</table>

						</div>

						<?php // echo vdebug($cuota, false, false, true); ?>

						<!--begin::Form-->
						<!-- <form class="m-form m-form--fit m-form--label-align-right" action="/"> -->

									<!--begin::Preview-->
									<div class="m-demo">

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
												<th></th>
											</tr>
										</thead>
										<tbody>
										<?php $ingreso_total_solicitante = $datos_credito['ingreso_mensual']+$datos_credito['ingreso_conyugue'] ?>
										<?php //foreach ($condominios as $c): ?>
											<tr>
												<th scope="row"><?php echo $condominio['id'] ?></th>
												<td><?php echo $condominio['descripcion'] ?></td>
												<td><?php echo $condominio['ciudad'] ?></td>
												<td><?php echo $condominio['valor'] ?></td>
												<td><?php echo $condominio['cuota_mensual'] ?></td>
												<td><?php echo $condominio['sueldo_prom'] ?></td>
												<td>
													<?php if ($condominio['sueldo_prom'] <= $ingreso_total_solicitante): ?>
														<a href="#" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only">
															<i class="fa fa-check"></i>
														</a>
													<?php else: ?>
														<a href="#" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" onclick="muestra_papab(<?php echo $condominio['id'] ?>, '<?php echo $condominio['descripcion'] ?>')">
															<i class="fa fa-ban"></i>
														</a>
													<?php endif; ?>
												</td>
											</tr>
										<?php //endforeach; ?>
											
										</tbody>
									</table>
								</div>
									</div>

									<!--end::Preview-->
							
							<!-- <div class="m-portlet__foot m-portlet__foot--fit" >
								<center>
								<div class="m-form__actions">
									<button type="submit" class="btn m-btn--pill    btn-accent">Siguiente</button>
									<button type="button" onclick="agregarform()" class="btn m-btn--pill    btn-success">Agregar Conyugue</button>
								</div>
								</center>
							</div> -->
						<!-- </form> -->

						<!--end::Form-->
					</div>

					<!--end::Portlet-->
				</div>

				<div class="col-md-4 item" id="bloque_1" style="display: block;">
					<a href="#" class="btn btn-block btn-success" id='titulo_vivienda'></a>
					<!--begin::Portlet-->
					<div class="m-portlet m-portlet--tab">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Registro Ingresos del papa del beneficiario
									</h3>
								</div>
							</div>
						</div>

						<div class="m-portlet__body">

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Carnet Identidad</label>
								<div class="col-4">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci2" required>

								</div>

								<div class="col-3">								
										<div class="m-section__content m-demo-dropdowns" >
											<div class="m-dropdown m-dropdown--inline m-dropdown--large m-dropdown--arrow m-dropdown--align-left" m-dropdown-toggle="hover" >
												<button type="button" class="btn m-btn--pill btn-success " onclick="carnet_2();">Buscar</button>
											</div>
										</div>																	
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Nombre</label>
								<div class="col-8">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_2" id="name_2" readonly>

								</div>
								
							</div>

							<!--begin::Section-->
							<div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_5" role="tablist">

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--danger">
									<div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body_1" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Independientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body_1" role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_5" style="">
										<div class="m-accordion__item-content">

										
										<div class="form-group m-form__group row">
											<div class="col-lg-4">
												<label class="">Tipo:</label>
												<select class="form-control m-input" id="cb_ipb">
													<option value="Comercio">Comercio</option>
													<option value="Servicio">Servicio</option>
													<option value="Productivo">Productivo</option>
												</select>
											</div>
											<div class="col-lg-4">
												<label class="">Ingreso Bruto:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_impb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

											<div class="col-lg-4">
												<label class="">Gastos:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_igpb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

										</div>
									
									<div class="m-portlet__foot m-portlet__foot--fit">
										<center>
											<div class="m-form__actions">
												<button type="submit" class="btn m-btn--pill btn-accent" onclick=padre_beneficiario_independiente();>Calcular</button>
												<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2();">Pedir Ayuda</button>
											</div>
										</center>
									</div>
											
										</div>
									</div>
								</div>

								<!--end::Item-->

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--brand">
									<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_3_head" data-toggle="collapse" href="#m_accordion_5_item_3_body_1" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa  flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Dependientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_3_body_1" role="tabpanel" aria-labelledby="m_accordion_5_item_3_head" data-parent="#m_accordion_5">
										<div class="m-accordion__item-content">
											<div class="form-group m-form__group row">

												<div class="col-lg-12">
													<label class="">Monto:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_dmbp">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__foot--fit">
												<center>
													<div class="m-form__actions">
														<button type="submit" class="btn m-btn--pill btn-accent"  onclick="padre_beneficiario_dependiente();">Calcular</button>
														<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2();">Pedir Ayuda</button>
													</div>
												</center>
											</div>
										</div>
									</div>
								</div>

								<!--end::Item-->
							</div>

							<!--end::Section-->
						</div>

						<!--begin::Form-->

						<!--end::Form-->
					</div>

					<div style="display: block;" id="bloque_2">
					<a href="#" class="btn btn-block btn-success" id='titulo_vivienda'></a>
					<!--begin::Portlet-->
					<div class="m-portlet m-portlet--tab">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Registro Ingresos del mama
									</h3>
								</div>
							</div>
						</div>

						<div class="m-portlet__body">

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Carnet Identidad</label>
								<div class="col-4">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci3" required>

								</div>

								<div class="col-3">								
										<div class="m-section__content m-demo-dropdowns" >
											<div class="m-dropdown m-dropdown--inline m-dropdown--large m-dropdown--arrow m-dropdown--align-left" m-dropdown-toggle="hover" >
												<button type="button" class="btn m-btn--pill btn-success " onclick="carnet_3();">Buscar</button>
											</div>
										</div>																	
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Nombre</label>
								<div class="col-8">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_3" id="name_3" readonly>

								</div>
								
							</div>
							
							<!-- <div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">Carnet Identidad:</label>
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci3" required>
									<button type="button" class="btn m-btn--pill btn-success" onclick="carnet_3();">Buscar</button>
								</div>
								<div class="col-lg-8">
									<label class="">Nombre</label>
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_3" id="name_3" readonly>
								</div>
							</div> -->

							<!--begin::Section-->
							<div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_6" role="tablist">

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--danger">
									<div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body_2" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Independientes 3</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body_2" role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_6" style="">
										<div class="m-accordion__item-content">

										
										<div class="form-group m-form__group row">
											<div class="col-lg-4">
												<label class="">Tipo:</label>
												<select class="form-control m-input" id="cb_ipb">
													<option value="Comercio">Comercio</option>
													<option value="Servicio">Servicio</option>
													<option value="Productivo">Productivo</option>
												</select>
											</div>
											<div class="col-lg-4">
												<label class="">Ingreso Bruto:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_impb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

											<div class="col-lg-4">
												<label class="">Gastos:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_igpb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

										</div>

									<div class="m-portlet__foot m-portlet__foot--fit">
										<center>
											<div class="m-form__actions">
												<button type="submit" class="btn m-btn--pill btn-accent" onclick=calcula_cuota();>Calcular</button>
												<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2()">Pedir Ayuda</button>
											</div>
										</center>
									</div>
											
										</div>
									</div>
								</div>

								<!--end::Item-->

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--brand">
									<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_3_head" data-toggle="collapse" href="#m_accordion_5_item_3_body_2" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa  flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Dependientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_3_body_2" role="tabpanel" aria-labelledby="m_accordion_5_item_3_head" data-parent="#m_accordion_6">
										<div class="m-accordion__item-content">
											<div class="form-group m-form__group row">

												<div class="col-lg-12">
													<label class="">Monto:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_dmbp">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__foot--fit">
												<center>
													<div class="m-form__actions">
														<button type="submit" class="btn m-btn--pill btn-accent" onclick="calcula_dependientes();">Calcular</button>
														<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2();">Pedir Ayuda</button>
													</div>
												</center>
											</div>
										</div>
									</div>
								</div>

								<!--end::Item-->
							</div>

							<!--end::Section-->
						</div>

						<!--begin::Form-->

						<!--end::Form-->
					</div>

					</div>

				
		
				</div>

				<div class="col-md-4 item" id="bloque_1" style="display: block;">
					<a href="#" class="btn btn-block btn-success" id='titulo_vivienda'></a>
					<!--begin::Portlet-->
					<div class="m-portlet m-portlet--tab">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Registro Ingresos del papa
									</h3>
								</div>
							</div>
						</div>

						<div class="m-portlet__body">

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Carnet Identidad</label>
								<div class="col-4">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci4" required>

								</div>

								<div class="col-3">								
										<div class="m-section__content m-demo-dropdowns" >
											<div class="m-dropdown m-dropdown--inline m-dropdown--large m-dropdown--arrow m-dropdown--align-left" m-dropdown-toggle="hover" >
												<button type="button" class="btn m-btn--pill btn-success " onclick="carnet_4();">Buscar</button>
											</div>
										</div>																	
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Nombre</label>
								<div class="col-8">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_4" id="name_4" readonly>

								</div>
								
							</div>

							<!-- <div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">Carnet Identidad:</label>
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci4" required>
									<button type="button" class="btn m-btn--pill btn-success " onclick="carnet_4();">Buscar</button>
								</div>
								<div class="col-lg-8">
									<label class="">Nombre</label>
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_4" id="name_4" readonly>
								</div>
							</div>
 -->
							<!--begin::Section-->
							<div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_7" role="tablist">

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--danger">
									<div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body_5" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Independientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body_5" role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_7" style="">
										<div class="m-accordion__item-content">

										
										<div class="form-group m-form__group row">
											<div class="col-lg-4">
												<label class="">Tipo:</label>
												<select class="form-control m-input" id="cb_ipb">
													<option value="Comercio">Comercio</option>
													<option value="Servicio">Servicio</option>
													<option value="Productivo">Productivo</option>
												</select>
											</div>
											<div class="col-lg-4">
												<label class="">Ingreso Bruto:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_impb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

											<div class="col-lg-4">
												<label class="">Gastos:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_igpb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

										</div>

									<div class="m-portlet__foot m-portlet__foot--fit">
										<center>
											<div class="m-form__actions">
												<button type="submit" class="btn m-btn--pill btn-accent" onclick=calcula_cuota();>Calcular</button>
												<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2();">Pedir Ayuda</button>
											</div>
										</center>
									</div>
											
										</div>
									</div>
								</div>

								<!--end::Item-->

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--brand">
									<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_3_head" data-toggle="collapse" href="#m_accordion_5_item_3_body_6" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa  flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Dependientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_3_body_6" role="tabpanel" aria-labelledby="m_accordion_5_item_3_head" data-parent="#m_accordion_7">
										<div class="m-accordion__item-content">
											<div class="form-group m-form__group row">

												<div class="col-lg-12">
													<label class="">Monto:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_dmbp">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__foot--fit">
												<center>
													<div class="m-form__actions">
														<button type="submit" class="btn m-btn--pill btn-accent">Calcular</button>
														<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2();">Pedir Ayuda</button>
													</div>
												</center>
											</div>
										</div>
									</div>
								</div>

								<!--end::Item-->
							</div>

							<!--end::Section-->
						</div>

						<!--begin::Form-->

						<!--end::Form-->
					</div>

					<div style="display: block;" id="bloque_2">
					<a href="#" class="btn btn-block btn-success" id='titulo_vivienda'></a>
					<!--begin::Portlet-->
					<div class="m-portlet m-portlet--tab">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Registro Ingresos del mama
									</h3>
								</div>
							</div>
						</div>

						<div class="m-portlet__body">

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Carnet Identidad</label>
								<div class="col-4">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci5" required>

								</div>

								<div class="col-3">								
										<div class="m-section__content m-demo-dropdowns" >
											<div class="m-dropdown m-dropdown--inline m-dropdown--large m-dropdown--arrow m-dropdown--align-left" m-dropdown-toggle="hover" >
												<button type="button" class="btn m-btn--pill btn-success " onclick="carnet_5();">Buscar</button>
											</div>
										</div>																	
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-3 col-form-label">Nombre</label>
								<div class="col-8">
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_5" id="name_5" readonly>

								</div>
								
							</div>

							<!-- <div class="form-group m-form__group row">
								<div class="col-lg-4">
									<label class="">Carnet Identidad:</label>
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="ci_c" id="ci5" required>
									<button type="button" class="btn m-btn--pill btn-success " onclick="carnet_5();">Buscar</button>
								</div>
								<div class="col-lg-8">
									<label class="">Nombre</label>
									<input type="text" class="form-control m-input m-input--air m-input--pill" name="name_5" id="name_5" readonly>
								</div>
							</div>
 -->
							<!--begin::Section-->
							<div class="m-accordion m-accordion--default m-accordion--toggle-arrow" id="m_accordion_8" role="tablist">

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--danger">
									<div class="m-accordion__item-head collapsed" srole="tab" id="m_accordion_5_item_1_head" data-toggle="collapse" href="#m_accordion_5_item_1_body_7" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Independientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_1_body_7" role="tabpanel" aria-labelledby="m_accordion_5_item_1_head" data-parent="#m_accordion_8" style="">
										<div class="m-accordion__item-content">

										
										<div class="form-group m-form__group row">
											<div class="col-lg-4">
												<label class="">Tipo:</label>
												<select class="form-control m-input" id="cb_ipb">
													<option value="Comercio">Comercio</option>
													<option value="Servicio">Servicio</option>
													<option value="Productivo">Productivo</option>
												</select>
											</div>
											<div class="col-lg-4">
												<label class="">Ingreso Bruto:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_impb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

											<div class="col-lg-4">
												<label class="">Gastos:</label>
												<div class="m-input-icon m-input-icon--right">
													<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_igpb">
													<span class="m-input-icon__icon m-input-icon__icon--right"></span>
												</div>
											</div>

										</div>

									<div class="m-portlet__foot m-portlet__foot--fit">
										<center>
											<div class="m-form__actions">
												<button type="submit" class="btn m-btn--pill btn-accent" onclick=calcula_cuota();>Calcular</button>
												<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2()">Pedir Ayuda</button>
											</div>
										</center>
									</div>
											
										</div>
									</div>
								</div>

								<!--end::Item-->

								<!--begin::Item-->
								<div class="m-accordion__item m-accordion__item--brand">
									<div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_5_item_3_head" data-toggle="collapse" href="#m_accordion_5_item_3_body" aria-expanded="false">
										<span class="m-accordion__item-icon"><i class="fa  flaticon-user-ok"></i></span>
										<span class="m-accordion__item-title"> Formulario Dependientes</span>
										<span class="m-accordion__item-mode"></span>
									</div>
									<div class="m-accordion__item-body collapse" id="m_accordion_5_item_3_body" role="tabpanel" aria-labelledby="m_accordion_5_item_3_head" data-parent="#m_accordion_8">
										<div class="m-accordion__item-content">
											<div class="form-group m-form__group row">

												<div class="col-lg-12">
													<label class="">Monto:</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="text" class="form-control m-input m-input--air m-input--pill" name="paterno_c" id="txt_dmbp">
														<span class="m-input-icon__icon m-input-icon__icon--right"></span>
													</div>
												</div>
											</div>
											<div class="m-portlet__foot m-portlet__foot--fit">
												<center>
													<div class="m-form__actions">
														<button type="submit" class="btn m-btn--pill btn-accent">Calcular</button>
														<button type="button" class="btn m-btn--pill btn-success" onclick="muestra2();">Pedir Ayuda</button>
													</div>
												</center>
											</div>
										</div>
									</div>
								</div>

								<!--end::Item-->
							</div>

							<!--end::Section-->
						</div>

						<!--begin::Form-->

						<!--end::Form-->
					</div>

					</div>

				
		
				</div>
			</div>
		</div>
	</div>
</div>
<?php //vdebug($condominio, true, false, true); ?>
			<!-- end:: Body -->

<script type="text/javascript">

	var ingresos_beneficiario = <?php echo $datos_credito['ingreso_mensual']; ?>;
	var ingresos_conyugue = <?php echo $datos_credito['ingreso_conyugue']; ?>;
	var ingresos_padre_beneficiario = 0;
	var ingresos_madre_beneficiario = 0;
	var ingresos_padre_conyugue = 0;
	var ingresos_madre_conyugue = 0;
	var couta_mes_condominio = <?php echo $cuota['cuota_total']; ?>;
	var total = 0;
	var sueldo_ideal = <?php echo $condominio['sueldo_prom']; ?>;;

    function agregarform()
        {
              $('.item').hide('slow');
              $("#bloque_1").show('slow');
        }
	function muestra_papab(idCondominio, nombre) 
	{
		// console.log(idCondominio);
		$("#bloque_1").show('slow');
		$('#titulo_vivienda').html("<h4>CONDOMINIO: "+nombre+"</<h4>");
	}

	function muestra2()
	{
		$("#bloque_2").show('slow');
		// alert('entro');
	}

	function calcula_cuota(monto)
	{
		// $cuota_mensual = $monto_prestamo * (($porcentaje * Math.pow((1 + $porcentaje), $cuotas)) / (Math.pow((1 + $porcentaje), $cuotas) - 1));
		prestamo = <?php echo $condominio['valor']; ?>;
		var cuota_mensual = 0;
		cuota_mensual = prestamo * ((0.0045 * Math.pow((1 + 0.0045), 300)) / (Math.pow((1 + 0.0045), 300) - 1));
		// console.log(prestamo);
		cuota_redondeado = Math.round(parseFloat(cuota_mensual)*100) / 100;
		porcentaje_ajuste = cuota_redondeado * 0.035;
		monto_ajustado = cuota_mensual + porcentaje_ajuste;
		cuota_ajustado_redondeado = Math.round(monto_ajustado*100)/100;

		seguro_incendio = monto * 0.00015;
		cuota_total = cuota_ajustado_redondeado + seguro_incendio;

		// $("#diipb").html(cuota_total);

		sueldo_ideal = Math.round(cuota_total / 0.4, 2);
		// console.log(sueldo_ideal);

		// $resultados['cuota'] = $monto_redondeado;
		// $resultados['seguro'] = $seguro_incendio;
		// $resultados['cuota_total'] = $cuota_total;
		// $resultados['sueldo_ideal'] = $sueldo_ideal;

		// vdebug($sueldo_ideal, true, false, true);
		// return $resultados;
	}

    function calcula_independientes(tipo_ipb, monto_impb, gasto_igpb)
    {
    	// var tipo_ipb = $('#cb_ipb').val();
    	// var monto_impb = $('#txt_impb').val();
    	// var gasto_igpb = $('#txt_igpb').val();

    	switch (tipo_ipb) {
    		case 'Comercio':
    			porcentaje = 0.25;
    			break;

			case 'Servicio':
    			porcentaje = 0.75;
    			break;

			case 'Productivo':
    			porcentaje = 0.45;
    			break;
    	}

    	porcentaje_monto = monto_impb*porcentaje;
    	monto_adicionable = porcentaje_monto - gasto_igpb; 
    	return monto_adicionable;
    	// $('#ayuda_pb').show('slow');
    	// console.log(monto_adicionable);

    	// console.log("monto "+monto_adicionable);
    	// $("#diipb").html(monto_adicionable);
    }

    function padre_beneficiario_independiente()
    {
    	var tipo_ipb = $('#cb_ipb').val();
    	var monto_impb = $('#txt_impb').val();
    	var gasto_igpb = $('#txt_igpb').val();
    	monto = calcula_independientes(tipo_ipb, monto_impb, gasto_igpb);
    	console.log(monto);
    	ingresos_padre_beneficiario = monto;
    	var subtotal = ingresos_beneficiario + ingresos_conyugue + ingresos_padre_beneficiario + ingresos_madre_beneficiario + ingresos_padre_conyugue + ingresos_madre_conyugue;
		$("#diipb").html(monto);
		$("#total_ingresos").html(subtotal);
		
		if(subtotal > parseFloat(sueldo_ideal)){
    		alert('si');
    	}else{
    		alert('no');
    	}
    }

    function padre_beneficiario_dependiente()
    {
    	var monto_bmbp = $('#txt_dmbp').val();
    	var monto_numerico = parseFloat(monto_bmbp);
    	var monto_descontado = monto_numerico*0.4;
    	var ingresos_padre_beneficiario = monto_descontado;
    	var subtotal = ingresos_beneficiario + ingresos_conyugue + ingresos_padre_beneficiario + ingresos_madre_beneficiario + ingresos_padre_conyugue + ingresos_madre_conyugue;
    	$("#diipb").html(monto_bmbp);
    	$("#total_ingresos").html(subtotal);

    	if(subtotal > parseFloat(sueldo_ideal)){
    		alert('si');
    	}else{
    		alert('no');
    	}
    	// console.log(sueldo_ideal);
    }

</script>

<script type="text/javascript">
	function carnet_2()
	{
	        var ci = $("#ci2").val();
	        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
	        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	        $.ajax({
	            url: '<?php echo base_url(); ?>Persona/ajax_veri/',
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
		            
            		if (data.estado == 'segip') {
	                        $("#msg_error_catastral").hide();
	                    $("#msg_sucess_catastral").show();
	                    $("#msg_alerta_catastral").show();
	                        $("#ci").val(data.ci);
	                    $("#msg_sucess_catastral").html('Esta registrado en el SEGIP la persona con Cedula de Identidad Numero: '+data.ci);
	                    var concatenados = data.nombres.concat(' ', data.paterno, ' ', data.materno);
	                    $('#name_2').val(concatenados);
	                    // $('#paterno').val(data.paterno);
	                    // $('#materno').val(data.materno);
	                    // $('#fecha').val(data.fec_nacimiento);
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
	                alerta_ci();
	            }
	        });
	}
</script>

<script type="text/javascript">
	function carnet_3()
	{
	        var ci = $("#ci3").val();
	        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
	        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	        $.ajax({
	            url: '<?php echo base_url(); ?>Persona/ajax_veri/',
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
		            
            		if (data.estado == 'segip') {
	                        $("#msg_error_catastral").hide();
	                    $("#msg_sucess_catastral").show();
	                    $("#msg_alerta_catastral").show();
	                        $("#ci").val(data.ci);
	                    $("#msg_sucess_catastral").html('Esta registrado en el SEGIP la persona con Cedula de Identidad Numero: '+data.ci);
	                    var concatenados = data.nombres.concat(' ', data.paterno, ' ', data.materno);
	                    $('#name_3').val(concatenados);
	                    // $('#paterno').val(data.paterno);
	                    // $('#materno').val(data.materno);
	                    // $('#fecha').val(data.fec_nacimiento);
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
	                alerta_ci();
	            }
	        });
	}
</script>

<script type="text/javascript">
	function carnet_4()
	{
	        var ci = $("#ci4").val();
	        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
	        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	        $.ajax({
	            url: '<?php echo base_url(); ?>Persona/ajax_veri/',
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
		            
            		if (data.estado == 'segip') {
	                        $("#msg_error_catastral").hide();
	                    $("#msg_sucess_catastral").show();
	                    $("#msg_alerta_catastral").show();
	                        $("#ci").val(data.ci);
	                    $("#msg_sucess_catastral").html('Esta registrado en el SEGIP la persona con Cedula de Identidad Numero: '+data.ci);
	                    var concatenados = data.nombres.concat(' ', data.paterno, ' ', data.materno);
	                    $('#name_4').val(concatenados);
	                    // $('#paterno').val(data.paterno);
	                    // $('#materno').val(data.materno);
	                    // $('#fecha').val(data.fec_nacimiento);
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
	                alerta_ci();
	            }
	        });
	}
</script>

<script type="text/javascript">
	function carnet_5()
	{
	        var ci = $("#ci5").val();
	        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
	        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	        $.ajax({
	            url: '<?php echo base_url(); ?>Persona/ajax_veri/',
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
		            
            		if (data.estado == 'segip') {
	                        $("#msg_error_catastral").hide();
	                    $("#msg_sucess_catastral").show();
	                    $("#msg_alerta_catastral").show();
	                        $("#ci").val(data.ci);
	                    $("#msg_sucess_catastral").html('Esta registrado en el SEGIP la persona con Cedula de Identidad Numero: '+data.ci);
	                    var concatenados = data.nombres.concat(' ', data.paterno, ' ', data.materno);
	                    $('#name_5').val(concatenados);
	                    // $('#paterno').val(data.paterno);
	                    // $('#materno').val(data.materno);
	                    // $('#fecha').val(data.fec_nacimiento);
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
	                alerta_ci();
	            }
	        });
	}
</script>

<script>
function alerta_ci(){
Swal.fire({
  type: 'error',
  title: 'Oops...',
  text: 'No es un Carnet Valido!'
})
//location.reload();
}
</script>