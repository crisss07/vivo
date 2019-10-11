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
								<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body" style="background-image: url(../vivo/public/assets/imagenes/formulario2.jpg);
		  overflow: hidden;">

									<!-- BEGIN: Left Aside -->
									<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
									<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-white ">

										<!-- BEGIN: Aside Menu -->


										<!-- END: Aside Menu -->
									</div>

									<!-- END: Left Aside -->
									<div class="m-grid__item m-grid__item--fluid m-wrapper">

										<!-- BEGIN: Subheader -->


										<!-- END: Subheader -->
										<div class="m-content">
											<div class="row">
												<div class="col-md-8">



													<!--begin::Portlet-->
													<div class="m-portlet m-portlet--tab">
														<div class="m-portlet__head">
															<div class="m-portlet__head-caption">
																<div class="m-portlet__head-title">
																	<span class="m-portlet__head-icon m--hide">
																		<i class="la la-gear"></i>
																	</span>
																	<h3 class="m-portlet__head-text">
																		CALCULA TU CREDITO
																	</h3>
																</div>
															</div>
														</div>

														<!--begin::Form-->
														<form class="m-form m-form--fit m-form--label-align-right">
															<div class="m-portlet__body">

																<div class="form-group m-form__group row">
																	<label for="example-text-input" class="col-9 col-form-label">1. ¿A cuánto alcanza tus ingresos liquidos mensuales? (Bs.)</label>
																	<div class="col-3">
																		<input class="form-control m-input" type="number" value="" id="example-text-input">
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label for="example-search-input" class="col-9 col-form-label">2. ¿A cuanto asciende tus ingresos adicionales o de tu conyuge (si corresponde)? (Bs.)</label>
																	<div class="col-3">
																		<input class="form-control m-input" type="number" value="How do I shoot web" id="example-search-input">
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-xl-9 col-lg-9 col-form-label">3. ¿Tienes préstamos en otras entidades financieras?</label>
																	<div class="col-xl-3 col-lg-3">
																		<select name="country" class="form-control m-input" onchange="showDivPagoEF('hidden_pago_ef', this)">
																			<option value=""></option>
																			<option value="1">SI</option>
																			<option value="2">NO</option>
																		</select>
																	</div>
																</div>
																<div class="form-group m-form__group row" 	id="hidden_pago_ef">
																	<label for="example-email-input" class="col-9 col-form-label">3.1 ¿Cuánto pagas mensualmente por tus prestamos en otras entidades financieras?</label>
																	<div class="col-3">
																		<input class="form-control m-input" type="number" value="" id="example-email-input">
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-xl-9 col-lg-9 col-form-label" >4. ¿Vives en casa Alquilada?</label>
																	<div class="col-xl-3 col-lg-3">
																		<select name="country" class="form-control m-input" onchange="showDivPago('hidden_pago_m', this)">
																			<option value=""></option>
																			<option value="1">SI</option>
																			<option value="2">NO</option>
																		</select>
																	</div>
																</div>
																<div class="form-group m-form__group row" id="hidden_pago_m">
																	<label for="example-url-input" class="col-9 col-form-label">4.1 ¿Cuánto pagas mensualmente de alquiler?</label>
																	<div class="col-3">
																		<input class="form-control m-input" type="number" value="" id="example-url-input">
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label for="example-tel-input" class="col-9 col-form-label">5. ¿Por cuántos miembros esta compuesto la unidad familiar?</label>
																	<div class="col-3">
																		<input class="form-control m-input" type="number" value="" id="example-tel-input">
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-xl-9 col-lg-9 col-form-label">6. ¿Usted cuenta con aporte propio?</label>
																	<div class="col-xl-3 col-lg-3">
																		<select name="country" class="form-control m-input" onchange="showDiv('hidden_div', this)">
																			<option value=""></option>
																			<option value="1">SI</option>
																			<option value="2">NO</option>
																		</select>
																	</div>
																</div>


																<div class="form-group m-form__group row" id="hidden_div">
																	<label for="example-password-input" class="col-9 col-form-label">6.1. ¿A cuanto alcanza su aporte propio? (AHORRO EN EFECTIVO Y/O ANTICRETICO) ($us)</label>
																	<div class="col-3">
																		<input class="form-control m-input" type="text" value="" id="example-password-input">
																	</div>
																</div>
																<div class="form-group m-form__group row">
																	<label class="col-xl-9 col-lg-9 col-form-label">7. ¿Es casado o conviviente?</label>
																	<div class="col-xl-3 col-lg-3">
																		<select name="country" class="form-control m-input">
																			<option value=""></option>
																			<option value="AF">SI</option>
																			<option value="AX">NO</option>
																		</select>
																	</div>
																</div>





															</div>
															<div class="m-portlet__foot m-portlet__foot--fit">
																<div class="m-form__actions">
																	<div class="row">
																		<div class="col-2">
																		
																		</div>
																		<div class="col-10" align="right">
																			<button type="reset" class="btn btn-danger">Limpiar</button>
																			<button type="submit" class="btn btn-success">Calcular</button>
																		</div>
																	</div>
																</div>
															</div>
														</form>
													</div>

													<!--end::Portlet-->

													<!--begin::Portlet-->


													<!--end::Portlet-->

													<!--begin::Portlet-->


													<!--end::Portlet-->
												</div>
												<div class="col-md-6">

													<!--begin::Portlet-->


													<!--end::Portlet-->

													<!--begin::Portlet-->


													<!--end::Portlet-->

													<!--begin::Portlet-->


													<!--end::Portlet-->

													<!--begin::Portlet-->


													<!--end::Portlet-->


													<!--end::Portlet-->
												</div>
											</div>
										</div>
									</div>
								</div>

								<script>
									function showDiv(divId, element)
									{
										document.getElementById(divId).style.display = element.value == 1 ? 'flex' : 'none';
									}

									function showDivPago(divId, element)
									{
										document.getElementById(divId).style.display = element.value == 1 ? 'flex' : 'none';
									}
									function showDivPagoEF(divId, element)
									{
										document.getElementById(divId).style.display = element.value == 1 ? 'flex' : 'none';
									}
								</script>