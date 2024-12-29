@if (getDomain() == 'tuongtacviet.vn')

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="{{ DataSite('title') }}" />        
        <meta name="keywords" content="{{ DataSite('keyword') }}" />
        <meta name="description" content="{{ DataSite('description') }}" />
  
        <meta property="og:image" content="{{ DataSite('image_seo') }}" />
					<link rel="shortcut icon" type="image/ico" href="{{ DataSite('favicon') }}"/>

	<!-- Plugins styles -->
	<link rel="stylesheet" href="/Landing-Lam/styles/plugins.css">

	<!-- Main styles -->
	<link rel="stylesheet" href="/Landing-Lam/styles/main.css">
</head>

<body>
	<!-- Start Header -->
	<header id="header" class="header" data-section="header">
		<div class="container">
			<div class="header__nav d-flex">
				<div class="header__logo">
					<a href="/home" class="header__logo--link">
						<img src="https://i.imgur.com/TUWRCjv.png" class="" alt="" width="300">
						 
					</a>
				</div>
				<div class="header__right flex-fill align-self-center">
					<div class="header__right--wrapper d-flex">
						<div class="header__right--main flex-fill align-self-center js-navbar-main">
							<button type="button" class="header__right--main-close js-navbar-mobile-close" aria-label="Close"><i data-feather="x"></i></button>
							<ul class="header__lists">
							 
								<li class="header__lists--item"><a href="#about" class="header__lists--link js-anchor-link">Thông tin</a></li>
								
								<li class="header__lists--item"><a href="#pricing" class="header__lists--link js-anchor-link">Cấp bậc</a></li>
								 
							</ul>
						</div>
						<div class="header__action">
							<a href="https://smm.tuongtacviet.vn/auth/register" class="button button__sm button__green"><span>Đăng kí ngay</span></a>
						</div>
						<button type="button" class="header__open--mobile js-navbar-mobile-open" aria-label="Open"><i data-feather="menu"></i></button>
					</div>
				</div>
			</div>
		</div>
	</header> <!-- End Header -->

	<!-- Start Main -->
	<main>
		<!-- Start Masthead -->
		<section class="masthead masthead__graphic--section">
			<div class="container masthead__container masthead__graphic--container">
				<div class="row">
					<div class="col-lg-6">
						<!-- Start Masthead Overview -->
						<div class="masthead__overview">
							<div class="masthead__overview--desc">
								<h1 class="masthead__overview--heading">Dịch vụ mạng xã hội Uy Tín</h1>
								<p class="text-medium">Hệ thống chuyên cung cấp các dịch vụ tăng Like, Follow, Share, Comment, View Video,... cho các Mạng xã hội như Facebook, Instagram, Tiktok....</p>
							</div>
							<div class="masthead__overview--action masthead__overview--action-inline">
								<a href="https://smm.tuongtacviet.vn/auth/login" class="button button__purple"><span>Bắt đầu</span></a>
								 
							</div>
						</div>
						<!-- End Masthead Overview -->
					</div>
					<div class="col-lg-6">
						<!-- Start Masthead Graphic -->
						<div class="masthead__graphic">
							<img src="https://i.imgur.com/L7r3wdS.png" class="masthead__graphic--image" alt="">
						</div>
						<!-- End Masthead Graphic -->
					</div>
				</div>
				<div class="masthead__rocket"></div>
			</div>
		</section>
		<!-- Video modal -->
		<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl modal__video--dialog modal-dialog-centered" role="document">
				<div class="modal-content modal__video--content">
					<div class="modal-body modal__video--body">
						<button type="button" class="modal__video--close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
						<div class="js-video-player" data-plyr-provider="youtube" data-plyr-embed-id="zfbHCLpQ5sg"></div>
					</div>
				</div>
			</div>
		</div><!-- End Masthead -->


		<!-- Start Overview -->
		
		<!-- Start Introduction -->
		<section id="about" class="section introduction">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 align-self-center">
						<!-- Start introduction content -->
						<div class="introduction__content">
							<div class="section__heading">
							 
								<h2 class="section__heading--title">Lý do bạn nên chọn chúng tôi</h2>
							</div>
							<p>Trang web của chúng tôi cung cấp giải pháp SMM rẻ và hiệu quả, giúp bạn cải thiện tốt hơn trong việc quản lý và phát triển mạng xã hội của mình. Với những công cụ và dịch vụ được cung cấp, bạn có thể dễ dàng tăng lượng người theo dõi, thích, xem cho tài khoản của mình một cách hiệu quả.</p>
							<ul class="introduction__listing">
								<li><label class="introduction__listing--check"><i class="introduction__listing--check-icon" data-feather="check"></i></label>Bảng điều khiển của chúng tôi rất dễ sử dụng và dễ quản lý, giúp cho bạn dễ dàng quản lý các tài khoản mạng xã hội của mình.</li>
								<li><label class="introduction__listing--check"><i class="introduction__listing--check-icon" data-feather="check"></i></label> Bảng điều khiển SMM của chúng tôi cung cấp giải pháp tiết kiệm chi phí cho nhu cầu quảng bá mạng xã hội của bạn.</li>
								<li><label class="introduction__listing--check"><i class="introduction__listing--check-icon" data-feather="check"></i></label> Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng hỗ trợ bạn với bất kỳ câu hỏi hoặc vấn đề mà bạn có thể gặp phải một cách nhanh chóng .</li>
							</ul>
							<div class="introduction__content--action">
								<a href="/auth/login" class="button button__purple"><span>Bắt Đầu</span></a>
							 
							</div>
						</div>
						<!-- End introduction content -->
					</div>
					<div class="col-lg-6">
						<!-- Start introduction image -->
						<div class="introduction__hero">
							<img src="/Landing-Lam/images/graphic/about.svg" class="introduction__hero--image" alt="">
						</div>
						<!-- End introduction image -->
					</div>
				</div>
			</div>
		</section><!-- End Introduction -->

		<!-- Start Pricing -->
		<section id="pricing" class="section section__light-purple">
			<div class="section__container">
				<div class="pricing">
					<div class="container pricing__container">
						<div class="row">
							<div class="col-lg-8">
								<div class="section__heading">
								 
									<h2 class="section__heading--title">Cấp bậc ưu đãi khách hàng.</h2>
								</div>
							</div>
						</div>
						<div class="pricing__main">
							<div class="row">
								<!-- Start pricing card 01 -->
								<div class="col-lg-4">
									<div class="pricing__card">
										<div class="pricing__card--icon">
											<div class="icon__circle icon__circle--lg icon__circle--light-purple">
												<i data-feather="bell"></i>
											</div>
										</div>
										<div class="pricing__card--price">
											<h5 class="pricing__card--price-title">Cộng tác viên</h5>
											<div class="pricing__card--price-currency">{{ number_format(DataSite('collaborator')) }}</div>
										</div>
										<div class="pricing__card--package">
											<ul>
												<li>Có ưu đãi giá dịch vụ cộng tác viên.</li>
											 
											</ul>
										</div>
										<div class="pricing__card--action">
											<button type="button" class="button"><span>Xem ngay</span></button>
										</div>
									</div>
								</div>
								<!-- End pricing card 01 -->

								<!-- Start pricing card 02 -->
								<div class="col-lg-4">
									<div class="pricing__card pricing__recommendation">
										<div class="pricing__card--icon">
											<div class="icon__circle icon__circle--lg icon__circle--green">
												<i data-feather="award"></i>
											</div>
										</div>
										<div class="pricing__card--price">
											<h5 class="pricing__card--price-title">Nhà phân phối</h5>
											<div class="pricing__card--price-currency">{{ number_format(DataSite('distributor')) }}</div>
										</div>
										<div class="pricing__card--package">
											<ul>
												<li>Có rất nhiều ưu đãi giá dịch vụ nhà phân phối.
</li>
											 
											</ul>
										</div>
										<div class="pricing__card--action">
											<button type="button" class="button button__green"><span>Xem ngay</span></button>
										</div>
									</div>
								</div>
								<!-- End pricing card 02 -->

								<!-- Start pricing card 03 -->
								<div class="col-lg-4">
									<div class="pricing__card">
										<div class="pricing__card--icon">
											<div class="icon__circle icon__circle--lg icon__circle--light-purple">
												<i data-feather="star"></i>
											</div>
										</div>
										<div class="pricing__card--price">
											<h5 class="pricing__card--price-title">Đại lí</h5>
											<div class="pricing__card--price-currency">{{ number_format(DataSite('agency')) }}</div>
										</div>
										<div class="pricing__card--package">
											<ul>
												<li>Có rất nhiều ưu đãi giá dịch vụ đại lí.
</li>
												 
											</ul>
										</div>
										<div class="pricing__card--action">
											<button type="button" class="button"><span>Xem ngay</span></button>
										</div>
									</div>
								</div>
								<!-- End pricing card 03 -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Pricing -->

	<!-- Start Footer -->
		<div class=" flex-fill">
					© 2024 <a href="#">{{DataSite('namesite')}}</a>. All Rights Reserved.
				</div>
	<!-- Jquery -->
	<script src="/Landing-Lam/scripts/jquery.min.js"></script>

	<!-- Plugins scripts -->
	<script src="/Landing-Lam/scripts/plugins.js"></script>

	<!-- Main scripts -->
	<script src="/Landing-Lam/scripts/main.js"></script>
</body>


</html>

@else

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="title" content="{{ DataSite('title') }}" />        
        <meta name="keywords" content="{{ DataSite('keyword') }}" />
        <meta name="description" content="{{ DataSite('description') }}" />
  
        <meta property="og:image" content="{{ DataSite('image_seo') }}" />
					<link rel="shortcut icon" type="image/ico" href="{{ DataSite('favicon') }}"/>

	<!-- Plugins styles -->
	<link rel="stylesheet" href="/Landing-Lam/styles/plugins.css">

	<!-- Main styles -->
	<link rel="stylesheet" href="/Landing-Lam/styles/main.css">
</head>

<body>
	<!-- Start Header -->
	<header id="header" class="header" data-section="header">
		<div class="container">
			<div class="header__nav d-flex">
				<div class="header__logo">
					<a href="/home" class="header__logo--link">
						<img src="{{ DataSite('logo')  }}" class="header__logo--img header__logo--img-default" alt="">
						<img src="{{ DataSite('logo')  }}" class="header__logo--img header__logo--img-scroll" alt="">
					</a>
				</div>
				<div class="header__right flex-fill align-self-center">
					<div class="header__right--wrapper d-flex">
						<div class="header__right--main flex-fill align-self-center js-navbar-main">
							<button type="button" class="header__right--main-close js-navbar-mobile-close" aria-label="Close"><i data-feather="x"></i></button>
							<ul class="header__lists">
							 
								<li class="header__lists--item"><a href="#about" class="header__lists--link js-anchor-link">Thông tin</a></li>
								
								<li class="header__lists--item"><a href="#pricing" class="header__lists--link js-anchor-link">Cấp bậc</a></li>
								 
							</ul>
						</div>
						<div class="header__action">
							<a href="/auth/register" class="button button__sm button__green"><span>Đăng kí ngay</span></a>
						</div>
						<button type="button" class="header__open--mobile js-navbar-mobile-open" aria-label="Open"><i data-feather="menu"></i></button>
					</div>
				</div>
			</div>
		</div>
	</header> <!-- End Header -->

	<!-- Start Main -->
	<main>
		<!-- Start Masthead -->
		<section class="masthead masthead__graphic--section">
			<div class="container masthead__container masthead__graphic--container">
				<div class="row">
					<div class="col-lg-6">
						<!-- Start Masthead Overview -->
						<div class="masthead__overview">
							<div class="masthead__overview--desc">
								<h1 class="masthead__overview--heading">Dịch vụ mạng xã hội Uy Tín</h1>
								<p class="text-medium">Hệ thống chuyên cung cấp các dịch vụ tăng Like, Follow, Share, Comment, View Video,... cho các Mạng xã hội như Facebook, Instagram, Tiktok....</p>
							</div>
							<div class="masthead__overview--action masthead__overview--action-inline">
								<a href="/auth/login" class="button button__purple"><span>Bắt đầu</span></a>
								 
							</div>
						</div>
						<!-- End Masthead Overview -->
					</div>
					<div class="col-lg-6">
						<!-- Start Masthead Graphic -->
						<div class="masthead__graphic">
							<img src="https://i.imgur.com/L7r3wdS.png" class="masthead__graphic--image" alt="">
						</div>
						<!-- End Masthead Graphic -->
					</div>
				</div>
				<div class="masthead__rocket"></div>
			</div>
		</section>
		<!-- Video modal -->
		<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl modal__video--dialog modal-dialog-centered" role="document">
				<div class="modal-content modal__video--content">
					<div class="modal-body modal__video--body">
						<button type="button" class="modal__video--close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
						<div class="js-video-player" data-plyr-provider="youtube" data-plyr-embed-id="zfbHCLpQ5sg"></div>
					</div>
				</div>
			</div>
		</div><!-- End Masthead -->


		<!-- Start Overview -->
		
		<!-- Start Introduction -->
		<section id="about" class="section introduction">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 align-self-center">
						<!-- Start introduction content -->
						<div class="introduction__content">
							<div class="section__heading">
							 
								<h2 class="section__heading--title">Lý do bạn nên chọn chúng tôi</h2>
							</div>
							<p>Trang web của chúng tôi cung cấp giải pháp SMM rẻ và hiệu quả, giúp bạn cải thiện tốt hơn trong việc quản lý và phát triển mạng xã hội của mình. Với những công cụ và dịch vụ được cung cấp, bạn có thể dễ dàng tăng lượng người theo dõi, thích, xem cho tài khoản của mình một cách hiệu quả.</p>
							<ul class="introduction__listing">
								<li><label class="introduction__listing--check"><i class="introduction__listing--check-icon" data-feather="check"></i></label>Bảng điều khiển của chúng tôi rất dễ sử dụng và dễ quản lý, giúp cho bạn dễ dàng quản lý các tài khoản mạng xã hội của mình.</li>
								<li><label class="introduction__listing--check"><i class="introduction__listing--check-icon" data-feather="check"></i></label> Bảng điều khiển SMM của chúng tôi cung cấp giải pháp tiết kiệm chi phí cho nhu cầu quảng bá mạng xã hội của bạn.</li>
								<li><label class="introduction__listing--check"><i class="introduction__listing--check-icon" data-feather="check"></i></label> Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng hỗ trợ bạn với bất kỳ câu hỏi hoặc vấn đề mà bạn có thể gặp phải một cách nhanh chóng .</li>
							</ul>
							<div class="introduction__content--action">
								<a href="/auth/login" class="button button__purple"><span>Bắt Đầu</span></a>
							 
							</div>
						</div>
						<!-- End introduction content -->
					</div>
					<div class="col-lg-6">
						<!-- Start introduction image -->
						<div class="introduction__hero">
							<img src="/Landing-Lam/images/graphic/about.svg" class="introduction__hero--image" alt="">
						</div>
						<!-- End introduction image -->
					</div>
				</div>
			</div>
		</section><!-- End Introduction -->

		<!-- Start Pricing -->
		<section id="pricing" class="section section__light-purple">
			<div class="section__container">
				<div class="pricing">
					<div class="container pricing__container">
						<div class="row">
							<div class="col-lg-8">
								<div class="section__heading">
								 
									<h2 class="section__heading--title">Cấp bậc ưu đãi khách hàng.</h2>
								</div>
							</div>
						</div>
						<div class="pricing__main">
							<div class="row">
								<!-- Start pricing card 01 -->
								<div class="col-lg-4">
									<div class="pricing__card">
										<div class="pricing__card--icon">
											<div class="icon__circle icon__circle--lg icon__circle--light-purple">
												<i data-feather="bell"></i>
											</div>
										</div>
										<div class="pricing__card--price">
											<h5 class="pricing__card--price-title">Cộng tác viên</h5>
											<div class="pricing__card--price-currency">{{ number_format(DataSite('collaborator')) }}</div>
										</div>
										<div class="pricing__card--package">
											<ul>
												<li>Có ưu đãi giá dịch vụ cộng tác viên.</li>
											 
											</ul>
										</div>
										<div class="pricing__card--action">
											<button type="button" class="button"><span>Xem ngay</span></button>
										</div>
									</div>
								</div>
								<!-- End pricing card 01 -->

								<!-- Start pricing card 02 -->
								<div class="col-lg-4">
									<div class="pricing__card pricing__recommendation">
										<div class="pricing__card--icon">
											<div class="icon__circle icon__circle--lg icon__circle--green">
												<i data-feather="award"></i>
											</div>
										</div>
										<div class="pricing__card--price">
											<h5 class="pricing__card--price-title">Nhà phân phối</h5>
											<div class="pricing__card--price-currency">{{ number_format(DataSite('distributor')) }}</div>
										</div>
										<div class="pricing__card--package">
											<ul>
												<li>Có rất nhiều ưu đãi giá dịch vụ nhà phân phối.
</li>
											 
											</ul>
										</div>
										<div class="pricing__card--action">
											<button type="button" class="button button__green"><span>Xem ngay</span></button>
										</div>
									</div>
								</div>
								<!-- End pricing card 02 -->

								<!-- Start pricing card 03 -->
								<div class="col-lg-4">
									<div class="pricing__card">
										<div class="pricing__card--icon">
											<div class="icon__circle icon__circle--lg icon__circle--light-purple">
												<i data-feather="star"></i>
											</div>
										</div>
										<div class="pricing__card--price">
											<h5 class="pricing__card--price-title">Đại lí</h5>
											<div class="pricing__card--price-currency">{{ number_format(DataSite('agency')) }}</div>
										</div>
										<div class="pricing__card--package">
											<ul>
												<li>Có rất nhiều ưu đãi giá dịch vụ đại lí.
</li>
												 
											</ul>
										</div>
										<div class="pricing__card--action">
											<button type="button" class="button"><span>Xem ngay</span></button>
										</div>
									</div>
								</div>
								<!-- End pricing card 03 -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Pricing -->

	<!-- Start Footer -->
		<div class=" flex-fill">
					© 2024 <a href="#">{{DataSite('namesite')}}</a>. All Rights Reserved.
				</div>
	<!-- Jquery -->
	<script src="/Landing-Lam/scripts/jquery.min.js"></script>

	<!-- Plugins scripts -->
	<script src="/Landing-Lam/scripts/plugins.js"></script>

	<!-- Main scripts -->
	<script src="/Landing-Lam/scripts/main.js"></script>
</body>


</html>
@endif