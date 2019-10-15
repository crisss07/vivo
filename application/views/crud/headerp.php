<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>Metronic | Dashboard</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>


	<!--end::Web font -->

	<!--begin::Global Theme Styles -->
	<link href="<?php echo base_url(); ?>public/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="<?php echo base_url(); ?>public/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="<?php echo base_url(); ?>public/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles -->

	<!--begin::Page Vendors Styles -->


	<!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/demo/default/media/img/logo/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">

		<!-- BEGIN: Header -->
		<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">

					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-blue ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								
									<img alt="" src="<?php echo base_url(); ?>public/assets/logos/logo.png" width="80%"/>
							
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">

								<!-- BEGIN: Left Aside Minimize Toggle -->
								

								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>

					<!-- END: Brand -->
					<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

						<!-- BEGIN: Horizontal Menu -->
						<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
							<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
								<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
									class="m-menu__link-icon flaticon-add"></i><span class="m-menu__link-text">Administrar Datos </span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
									<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
										<ul class="m-menu__subnav">
											<li class="m-menu__item " aria-haspopup="true"><a href="Administrador" class="m-menu__link "><i class="m-menu__link-icon flaticon-file"></i><span class="m-menu__link-text">Condominios</span></a>
											</li>
											<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="Administrador_Persona" class="m-menu__link "><i class="m-menu__link-icon flaticon-diagram"></i><span class="m-menu__link-title"> <span class="m-menu__link-wrap">
												<span class="m-menu__link-text">Listado de Solicitantes</span>  </span></span></a>
											</li>
										</ul>
									</div>
								</li>
								<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true"><a href="javascript:;" class="m-menu__link m-menu__toggle" title="Non functional dummy link"><i
									class="m-menu__link-icon flaticon-line-graph"></i><span class="m-menu__link-text">Reportes</span><i class="m-menu__hor-arrow la la-angle-down"></i><i class="m-menu__ver-arrow la la-angle-right"></i></a>
									<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:1000px"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
										<div class="m-menu__subnav">
											<ul class="m-menu__content">

												<li class="m-menu__item">
													<h3 class="m-menu__heading m-menu__toggle"><span class="m-menu__link-text">Solicitantes Registrados</span><i class="m-menu__ver-arrow la la-angle-right"></i></h3>
													<ul class="m-menu__inner">
														<li class="m-menu__item " m-menu-link-redirect="1" aria-haspopup="true"><a href="Charts" class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--line"><span></span></i><span class="m-menu__link-text">Graficas</span></a></li>
														
													</ul>
												</li>
												
												
											</ul>
										</div>
									</div>
								</li>
								
							</ul>
						</div>

						<!-- END: Horizontal Menu -->

						<!-- BEGIN: Topbar -->
						<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
							<div class="m-stack__item m-topbar__nav-wrapper">
								<ul class="m-topbar__nav m-nav m-nav--inline">
									

									

									<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
									m-dropdown-toggle="click">
									<a href="#" class="m-nav__link m-dropdown__toggle">
										<span class="m-topbar__userpic">
											<img src="<?php echo base_url(); ?>public/assets/logos/user.png" class="m--img-rounded m--marginless" alt="" />
										</span>
										<span class="m-topbar__username m--hide">Nick</span>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
												<div class="m-card-user m-card-user--skin-dark">
													<div class="m-card-user__pic">
														<img src="<?php echo base_url(); ?>public/assets/logos/user.png" class="m--img-rounded m--marginless" alt="" />

																<!--
						<span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
						-->
					</div>
					<div class="m-card-user__details">
						<span class="m-card-user__name m--font-weight-500">Administrador</span>
						<a href="" class="m-card-user__email m--font-weight-300 m-link">admin@oopp.gob.bo</a>
					</div>
				</div>
			</div>
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav m-nav--skin-light">

						<li class="m-nav__separator m-nav__separator--fit">
						</li>
						<li class="m-nav__item">
							<a href="Login/logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Cerrar Sesion</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</li>

</ul>
</div>
</div>

<!-- END: Topbar -->
</div>
</div>
</div>
</header>

			<!-- END: Header -->