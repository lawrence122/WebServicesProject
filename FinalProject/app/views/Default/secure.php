<html>

<head>
	<!--Bootsrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--Fontawesome-->
	<script src="https://kit.fontawesome.com/00b6f97ff2.js" crossorigin="anonymous"></script>

	<!--Stylesheet-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>This is the default page</title>
</head>

<body style="background-color: #D6D6D6;">
	<ul class="nav nav-pills bg-light mb-5">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Anime</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='#'>Anime Search</a>
				<a class="nav-item nav-link" href='#'>Top Anime</a>
				<a class="nav-item nav-link" href='#'>Seasonal Anime</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Manga</a>
			<div class="dropdown-menu">
				<a class="nav-item nav-link" href='#'>Manga Search</a>
				<a class="nav-item nav-link" href='#'>Top Manga</a>
				<a class="nav-item nav-link" href='#'>Manga Store??</a>
			</div>
		</li>
		<li class="nav-item"><a class="nav-item text-dark" href='<?= BASE ?>/User/login/'>Login</a></li>
		<li class="nav-item"><a class="nav-item text-dark" href='<?= BASE ?>/User/register/'>Register</a></li>
		<!-- <li class="nav-item"><a class='btn btn-danger register' data-toggle='modal' data-target='#deleteUserModal' 
                                    data-action='<?= BASE ?>/User/register/'>Sign Up</a></li> -->
	</ul>

	<article>
		<div class="widget seasonal left">
			<div class="widget-header">
				<span style="float: right;">
					<a href="#" style="font-weight: normal; font-size: 11px;">View More</a>
				</span>
				<h2 class="index_h2_seo"><a href="#">Fall 2021 Anime</a></h2>
			</div>
			<div class="widget-content">
				<div class="widget-slide-block " id="widget-seasonal-video">
					<div class="btn-widget-slide-side left"><span class="btn-inner"></span></div>
					<div class="btn-widget-slide-side right"><span class="btn-inner"></span></div>
					<div class="widget-slide-outer">
						<ul class="widget-slide js-widget-slide" data-slide="4">
							<li class="btn-anime"><a href="#" class="link">
									<h3 class="h3_character_name"><span class="title">Mushoku Tensei: Isekai Ittara Honki Dasu Part 2</span></h3><img width="160" height="220" alt="Mushoku Tensei: Isekai Ittara Honki Dasu Part 2" data-src="https://cdn.myanimelist.net/r/160x220/images/anime/1028/117777.webp?s=c5049358214f7bdddcc5eabc9151de13" data-srcset="https://cdn.myanimelist.net/r/160x220/images/anime/1028/117777.webp?s=c5049358214f7bdddcc5eabc9151de13 1x, https://cdn.myanimelist.net/r/320x440/images/anime/1028/117777.webp?s=6b2ffe3461b09201e03c4df73e33bc56 2x" class="lazyload" />
								</a></li>
							<li class="btn-anime"><a href="#" class="link">
									<h3 class="h3_character_name"><span class="title">Komi-san wa, Comyushou desu.</span></h3><img width="160" height="220" alt="Komi-san wa, Comyushou desu." data-src="https://cdn.myanimelist.net/r/160x220/images/anime/1899/117237.webp?s=2e9ab2c71312e8c4f88d51cb36da5941" data-srcset="https://cdn.myanimelist.net/r/160x220/images/anime/1899/117237.webp?s=2e9ab2c71312e8c4f88d51cb36da5941 1x, https://cdn.myanimelist.net/r/320x440/images/anime/1899/117237.webp?s=a162d36797c3bd78bddbbb29feaf026b 2x" class="lazyload" />
								</a></li>
							<li class="btn-anime"><a href="#" class="link">
									<h3 class="h3_character_name"><span class="title">Platinum End</span></h3><img width="160" height="220" alt="Platinum End" data-src="https://cdn.myanimelist.net/r/160x220/images/anime/1992/116576.webp?s=251394e43d5d4cda0ad19a2465ccae09" data-srcset="https://cdn.myanimelist.net/r/160x220/images/anime/1992/116576.webp?s=251394e43d5d4cda0ad19a2465ccae09 1x, https://cdn.myanimelist.net/r/320x440/images/anime/1992/116576.webp?s=00f642fd3aedb0d7003bde462612bfce 2x" class="lazyload" />
								</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</article>

	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title text-center mr-4" id="registerModalTitle">Create an account</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="well form-horizontal" id="registerForm" action="" method="post">
						<div class="form-outline form-black mb-4">
							<input name="username" type="text" class="form-control form-control-lg" placeholder="Username" />
						</div>

						<div class="form-outline form-black mb-4">
							<input type="password" name="password" placeholder="Password" class="form-control form-control-lg" />
						</div>

						<div class="form-outline form-black mb-4">
							<input type="password" name="password_confirm" placeholder="Confirm Password" class="form-control form-control-lg" />
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label"></label>
							<div class="col-md-4 mxy-5"><br>
								<input class="btn btn-warning" type="submit" name="action" value="Submit" />

							</div>
						</div>

					</form>

					<!-- <form class="well form-horizontal" id="registerForm" action="" method="post">
						<div class="form-group">
							<label class="control-label">Input the user's username to proceed:</label>
							<input type="text" name="username" />
						</div>

						<div class="modal-footer">
							<input class="btn btn-success" type="submit" name="action" value="Register" />
						</div>
					</form> -->
				</div>

			</div>
		</div>
	</div>

	<!-- Example of MAL widget -->
	<!-- <article>
		<div class="widget store_popular_comics left">
			<div class="widget-header">
				<span style="float: right;">
					<a href="https://myanimelist.net/store?_location=mal_mid_slider" style="font-weight: normal; font-size: 11px;">View More</a>
				</span>
				Manga Store
			</div>
			<div class="widget-content">
				<div class="di-ib widget-slide-block " id="widget-manga-store">
					<div class="btn-widget-slide-side left"><span class="btn-inner"></span></div>
					<div class="btn-widget-slide-side right"><span class="btn-inner"></span></div>
					<div class="widget-slide-outer">
						<ul class="widget-slide js-widget-slide" data-slide="4">
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/34/Sankarea?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Sankarea" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/535/aa598b1d37e6ef3467432ae292e5fe692f049e312c455fb22c6a6b612df1dc35/l.jpg?s=bed932259b19528716305b39f184b0af" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/535/aa598b1d37e6ef3467432ae292e5fe692f049e312c455fb22c6a6b612df1dc35/l.jpg?s=bed932259b19528716305b39f184b0af 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/535/aa598b1d37e6ef3467432ae292e5fe692f049e312c455fb22c6a6b612df1dc35/l.jpg?s=675afa265d2db7b0d17c816d036d27e6 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/34/Sankarea?_location=mal_mid_slider" title="Sankarea">Sankarea</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/26/Missions_of_Love?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Missions of Love" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/510/d79a125d45a3a80ff602432b3a3100395dc13d6bb17cef53d60455d80c151b76/l.jpg?s=d0cf8c938c558ed2c108176c83945af0" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/510/d79a125d45a3a80ff602432b3a3100395dc13d6bb17cef53d60455d80c151b76/l.jpg?s=d0cf8c938c558ed2c108176c83945af0 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/510/d79a125d45a3a80ff602432b3a3100395dc13d6bb17cef53d60455d80c151b76/l.jpg?s=ecaa5db1bd13821a567f35961fa4c333 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/26/Missions_of_Love?_location=mal_mid_slider" title="Missions of Love">Missions of Love</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/595/DIVE?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="DIVE!!" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/4894/0333137e5b93c79e353723e520908206d9670f92a1b9c8f52dbeece5ad7c3103/l.jpg?s=07e3928307336cb21dea35dbc551f670" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/4894/0333137e5b93c79e353723e520908206d9670f92a1b9c8f52dbeece5ad7c3103/l.jpg?s=07e3928307336cb21dea35dbc551f670 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/4894/0333137e5b93c79e353723e520908206d9670f92a1b9c8f52dbeece5ad7c3103/l.jpg?s=3fa5c2268367c270fb275818803e9066 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/595/DIVE?_location=mal_mid_slider" title="DIVE!!">DIVE!!</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/798/ROMANCE?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="ROMANCE" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/7362/ef43e7f7e81d779a9768680e0e2125bd9933a13ac362b528834d9a1a40894d5d/l.jpg?s=c5dab06fa40b2f6ac231b2d5116b5aa5" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/7362/ef43e7f7e81d779a9768680e0e2125bd9933a13ac362b528834d9a1a40894d5d/l.jpg?s=c5dab06fa40b2f6ac231b2d5116b5aa5 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/7362/ef43e7f7e81d779a9768680e0e2125bd9933a13ac362b528834d9a1a40894d5d/l.jpg?s=af0ef6ff2b162d119a096f9bd65668c9 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/798/ROMANCE?_location=mal_mid_slider" title="ROMANCE">ROMANCE</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/981/Life_Lessons_with_Uramichi_Oniisan?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Life Lessons with Uramichi Oniisan" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/8982/b0fe93b4078afcae6cc778719c1cf76a42ea9100dfc5f08276663e1a6c950afe/l.jpg?s=c295a7cfebb4c83f9afd231745d811ab" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/8982/b0fe93b4078afcae6cc778719c1cf76a42ea9100dfc5f08276663e1a6c950afe/l.jpg?s=c295a7cfebb4c83f9afd231745d811ab 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/8982/b0fe93b4078afcae6cc778719c1cf76a42ea9100dfc5f08276663e1a6c950afe/l.jpg?s=db1be389009b8c73790cd816db10d43b 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/981/Life_Lessons_with_Uramichi_Oniisan?_location=mal_mid_slider" title="Life Lessons with Uramichi Oniisan">Life Lessons with Uramichi Oniisan</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/686/Overlord__The_Undead_King_Oh?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Overlord: The Undead King Oh!" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/5729/888c70d7dcd01dedc515390baa1b85d1c8f1bbc085a044401878d74a158fb6f2/l.jpg?s=7a305de3fb26290f7141d6324cf23ea6" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/5729/888c70d7dcd01dedc515390baa1b85d1c8f1bbc085a044401878d74a158fb6f2/l.jpg?s=7a305de3fb26290f7141d6324cf23ea6 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/5729/888c70d7dcd01dedc515390baa1b85d1c8f1bbc085a044401878d74a158fb6f2/l.jpg?s=105f86d6ba47b08481b5d6348583009d 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/686/Overlord__The_Undead_King_Oh?_location=mal_mid_slider" title="Overlord: The Undead King Oh!">Overlord: The Undead King Oh!</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/916/Wandering_Witch__The_Journey_of_Elaina_light_novel?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Wandering Witch: The Journey of Elaina (light novel)" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/7792/ed39858fb11156a38aafc78a6cc7a4a3794ca0b8231ce8f3354173550e288223/l.jpg?s=77406da0df5a00b91c4fa026e9274369" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/7792/ed39858fb11156a38aafc78a6cc7a4a3794ca0b8231ce8f3354173550e288223/l.jpg?s=77406da0df5a00b91c4fa026e9274369 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/7792/ed39858fb11156a38aafc78a6cc7a4a3794ca0b8231ce8f3354173550e288223/l.jpg?s=edf482348950ac83ea4587c66742017d 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/916/Wandering_Witch__The_Journey_of_Elaina_light_novel?_location=mal_mid_slider" title="Wandering Witch: The Journey of Elaina (light novel)">Wandering Witch: The Journey of Elaina (light novel)</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/178/Space_Brothers?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Space Brothers" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/1757/3398628072d12cb75575d25270ee79d0cb30c5c83783494ff907585c0c9a7892/l.jpg?s=26d2f08a12e89839715cd2a6938ec1c9" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/1757/3398628072d12cb75575d25270ee79d0cb30c5c83783494ff907585c0c9a7892/l.jpg?s=26d2f08a12e89839715cd2a6938ec1c9 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/1757/3398628072d12cb75575d25270ee79d0cb30c5c83783494ff907585c0c9a7892/l.jpg?s=5e014d16ffddf838bd79d93fb63b7db8 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/178/Space_Brothers?_location=mal_mid_slider" title="Space Brothers">Space Brothers</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/359/Puella_Magi_Madoka_Magica__Homuras_Revenge?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Puella Magi Madoka Magica: Homura&#039;s Revenge" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/2450/11ceef5ae25a0308f07668fe7e1a331c116ee066d805247e87493faf58949a22/l.jpg?s=7e2cb47343f7bb2f3605a615277bc302" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/2450/11ceef5ae25a0308f07668fe7e1a331c116ee066d805247e87493faf58949a22/l.jpg?s=7e2cb47343f7bb2f3605a615277bc302 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/2450/11ceef5ae25a0308f07668fe7e1a331c116ee066d805247e87493faf58949a22/l.jpg?s=8c52edfd0ac1f0cdbf003247210c3b28 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/359/Puella_Magi_Madoka_Magica__Homuras_Revenge?_location=mal_mid_slider" title="Puella Magi Madoka Magica: Homura&#039;s Revenge">Puella Magi Madoka Magica: Homura&#039;s Revenge</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/510/Kinos_Journey?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Kino&#039;s Journey" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/3766/067aac8a86c002c71d87b02dd2913d3580880977208d65162dbac9c996fe7d43/l.jpg?s=c060a121b87a19ec98c4e26575893f15" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/3766/067aac8a86c002c71d87b02dd2913d3580880977208d65162dbac9c996fe7d43/l.jpg?s=c060a121b87a19ec98c4e26575893f15 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/3766/067aac8a86c002c71d87b02dd2913d3580880977208d65162dbac9c996fe7d43/l.jpg?s=6e7e582418e25e589bf1a6ca47311a1b 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/510/Kinos_Journey?_location=mal_mid_slider" title="Kino&#039;s Journey">Kino&#039;s Journey</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/926/Book_Girl?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Book Girl" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/7804/45f5f010c6c1e2a7ad6a3035aa23059dcf9af2f201eea7e0eb37808e5f2955af/l.jpg?s=cab806c24d7f6038741a399a6b492c56" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/7804/45f5f010c6c1e2a7ad6a3035aa23059dcf9af2f201eea7e0eb37808e5f2955af/l.jpg?s=cab806c24d7f6038741a399a6b492c56 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/7804/45f5f010c6c1e2a7ad6a3035aa23059dcf9af2f201eea7e0eb37808e5f2955af/l.jpg?s=848fb88d386a1025e3833eec9a8cd7d4 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/926/Book_Girl?_location=mal_mid_slider" title="Book Girl">Book Girl</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/646/Woof_Woof_Story__I_Told_You_to_Turn_Me_Into_a_Pampered_Pooch_Not_Fenrir?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Woof Woof Story: I Told You to Turn Me Into a Pampered Pooch, Not Fenrir!" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/5204/2fc2b6da4f840f060525fa8626f95533300692635ec70dae0f3087f8bd31667b/l.jpg?s=f6daa008491e8a9f15c25ff61e6473bc" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/5204/2fc2b6da4f840f060525fa8626f95533300692635ec70dae0f3087f8bd31667b/l.jpg?s=f6daa008491e8a9f15c25ff61e6473bc 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/5204/2fc2b6da4f840f060525fa8626f95533300692635ec70dae0f3087f8bd31667b/l.jpg?s=e406dc5d128951fcbd89dc544e478069 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/646/Woof_Woof_Story__I_Told_You_to_Turn_Me_Into_a_Pampered_Pooch_Not_Fenrir?_location=mal_mid_slider" title="Woof Woof Story: I Told You to Turn Me Into a Pampered Pooch, Not Fenrir!">Woof Woof Story: I Told You to Turn Me Into a Pampered Pooch, Not Fenrir!</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/515/Love_Massage__Melting_Beauty_Treatment?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Love Massage: Melting Beauty Treatment" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/3773/4fa1595fb84095c06751de4c5ced48a57e8718d90a324cea56cc2e553b0f0358/l.jpg?s=1ae84153db603a59996831ebd6637893" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/3773/4fa1595fb84095c06751de4c5ced48a57e8718d90a324cea56cc2e553b0f0358/l.jpg?s=1ae84153db603a59996831ebd6637893 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/3773/4fa1595fb84095c06751de4c5ced48a57e8718d90a324cea56cc2e553b0f0358/l.jpg?s=fc4b12580954bfcc0980a5708054a714 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/515/Love_Massage__Melting_Beauty_Treatment?_location=mal_mid_slider" title="Love Massage: Melting Beauty Treatment">Love Massage: Melting Beauty Treatment</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/258/Angels_of_Death?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="Angels of Death" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/2049/c59aa422eaa73a8a9eac990dc930c2eba57772d601f2cf7a7414def53b70e7bb/l.jpg?s=0ee6c995a661889cc1abe9370f9551f6" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/2049/c59aa422eaa73a8a9eac990dc930c2eba57772d601f2cf7a7414def53b70e7bb/l.jpg?s=0ee6c995a661889cc1abe9370f9551f6 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/2049/c59aa422eaa73a8a9eac990dc930c2eba57772d601f2cf7a7414def53b70e7bb/l.jpg?s=d5922495b9789df5d8fdff43f71d42d8 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/258/Angels_of_Death?_location=mal_mid_slider" title="Angels of Death">Angels of Death</a></span></li>
							<li class="btn-anime"><a href="https://myanimelist.net/store/manga/469/The_Princes_Romance_Gambit?_location=mal_mid_slider" class="link"><img width="108" height="163" alt="The Prince&#039;s Romance Gambit" data-src="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/3337/21df577ed1eba9ad9195d2d16e027b89f7e33060bb690f7e828486173dc135e9/l.jpg?s=b94bd5bc7c420f10e721973ca0f928fb" data-srcset="https://cdn.myanimelist.net/r/108x163/s/common/store/cover/3337/21df577ed1eba9ad9195d2d16e027b89f7e33060bb690f7e828486173dc135e9/l.jpg?s=b94bd5bc7c420f10e721973ca0f928fb 1x, https://cdn.myanimelist.net/r/216x326/s/common/store/cover/3337/21df577ed1eba9ad9195d2d16e027b89f7e33060bb690f7e828486173dc135e9/l.jpg?s=1b855b66fb60e9d529a97ddb6cdd3a01 2x" class="lazyload" /></a><span class="external-link"><a href="https://myanimelist.net/store/manga/469/The_Princes_Romance_Gambit?_location=mal_mid_slider" title="The Prince&#039;s Romance Gambit">The Prince&#039;s Romance Gambit</a></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</article> -->

</body>

</html>