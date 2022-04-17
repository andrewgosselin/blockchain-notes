
<!DOCTYPE html>
<html lang="en" style="overflow: hidden;">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blockchain Notes</title>
		
        <script src="https://kit.fontawesome.com/1f288f322f.js" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>

.jumbotron {
    padding: 2rem 1rem;
    margin-bottom: 2rem;
    background-color: #e9ecef;
    border-radius: 0.3rem;
}

@import url('https://fonts.googleapis.com/css?family=Roboto');

html, body, #content {
	height: 100%;
}

body{
	font-family: 'Roboto', sans-serif;
}
* {
	margin: 0;
	padding: 0;
}
i {
	margin-right: 10px;
}
/*----------bootstrap-navbar-css------------*/
.navbar-logo{
	padding: 15px;
	color: #fff;
}
.navbar-mainbg{
	background-color: #5161ce;
	padding: 0px;
}
#navbarSupportedContent{
	overflow: hidden;
	position: relative;
}
#navbarSupportedContent ul{
	padding: 0px;
	margin: 0px;
}
#navbarSupportedContent ul li a i{
	margin-right: 10px;
}
#navbarSupportedContent li {
	list-style-type: none;
	float: left;
}
#navbarSupportedContent ul li a{
	color: rgba(255,255,255,0.5);
    text-decoration: none;
    font-size: 15px;
    display: block;
    padding: 20px 20px;
    transition-duration:0.6s;
	transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}
#navbarSupportedContent>ul>li.active>a{
	color: #5161ce;
	background-color: transparent;
	transition: all 0.7s;
}
#navbarSupportedContent a:not(:only-child):after {
	content: "\f105";
	position: absolute;
	right: 20px;
	top: 10px;
	font-size: 14px;
	font-family: "Font Awesome 5 Free";
	display: inline-block;
	padding-right: 3px;
	vertical-align: middle;
	font-weight: 900;
	transition: 0.5s;
}
#navbarSupportedContent .active>a:not(:only-child):after {
	transform: rotate(90deg);
}
.hori-selector{
	display:inline-block;
	position:absolute;
	height: 100%;
	top: 0px;
	left: 0px;
	transition-duration:0.6s;
	transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
	background-color: #fff;
	border-top-left-radius: 15px;
	border-top-right-radius: 15px;
	margin-top: 10px;
}
.hori-selector .right,
.hori-selector .left{
	position: absolute;
	width: 25px;
	height: 25px;
	background-color: #fff;
	bottom: 10px;
}
.hori-selector .right{
	right: -25px;
}
.hori-selector .left{
	left: -25px;
}
.hori-selector .right:before,
.hori-selector .left:before{
	content: '';
    position: absolute;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #5161ce;
}
.hori-selector .right:before{
	bottom: 0;
    right: -25px;
}
.hori-selector .left:before{
	bottom: 0;
    left: -25px;
}


@media(min-width: 992px){
	.navbar-expand-custom {
	    -ms-flex-flow: row nowrap;
	    flex-flow: row nowrap;
	    -ms-flex-pack: start;
	    justify-content: flex-start;
	}
	.navbar-expand-custom .navbar-nav {
	    -ms-flex-direction: row;
	    flex-direction: row;
	}
	.navbar-expand-custom .navbar-toggler {
	    display: none;
	}
	.navbar-expand-custom .navbar-collapse {
	    display: -ms-flexbox!important;
	    display: flex!important;
	    -ms-flex-preferred-size: auto;
	    flex-basis: auto;
	}
}


@media (max-width: 991px){
	#navbarSupportedContent ul li a{
		padding: 12px 30px;
	}
	.hori-selector{
		margin-top: 0px;
		margin-left: 10px;
		border-radius: 0;
		border-top-left-radius: 25px;
		border-bottom-left-radius: 25px;
	}
	.hori-selector .left,
	.hori-selector .right{
		right: 10px;
	}
	.hori-selector .left{
		top: -25px;
		left: auto;
	}
	.hori-selector .right{
		bottom: -25px;
	}
	.hori-selector .left:before{
		left: -25px;
		top: -25px;
	}
	.hori-selector .right:before{
		bottom: -25px;
		left: -25px;
	}
}
.navbar-brand:hover {
	color: white;
}

#pageLoader {
	width: 100%;
	position: absolute;
	z-index: 99;
	top: 40%;
    transform: translateY(-50%);
	display: none;
	font-weight: 550;
}

#pageLoader.active {
  display: initial;
}

.loader {
  position: relative;
  height: 50px;
  width: 50px;
  margin: auto;
  margin-top: 20px;
}




.loader::after,
.loader::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 0; /* creating the triangle shape */
  height: 0;
  border: 20px solid transparent;
  border-bottom-color: black;
  animation: rotateA 2s linear infinite 0.5s;
}

.loader::before {
  transform: rotate(90deg);
  animation: rotateB 2s linear infinite;
}

/* rotation animation */
@keyframes rotateA {
  0%,
  25% {
    transform: rotate(0deg);
  }
  50%,
  75% {
    transform: rotate(180deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes rotateB {
  0%,
  25% {
    transform: rotate(90deg);
  }
  50%,
  75% {
    transform: rotate(270deg);
  }
  100% {
    transform: rotate(450deg);
  }
}

        </style>
		@yield('styles')
    </head>
    <body id="main">
		<div id="pageLoader" class="text-center">
			Loading page...
			<div class="loader"></div>
		</div>
        <nav class="navbar navbar-expand-custom navbar-mainbg">
            <a class="navbar-brand navbar-logo" href="/">Blockchain Notes</a>
            <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <div class="hori-selector" style="display: none;"><div class="left"></div><div class="right"></div></div>
                    <li class="nav-item @if(isset($page) && $page == 'create') active @endif" value="create">
                        <a class="nav-link link-ajax" href="/create"><i class="fa fa-circle-plus"></i>Create Note</a>
                    </li>
                    <li class="nav-item @if(isset($page) && $page == 'api') active @endif" value="api">
                        <a class="nav-link link-ajax" href="/api"><i class="fa-solid fa-book"></i>API Docs</a>
                    </li>
                    <li class="nav-item @if(isset($page) && $page == 'how') active @endif" value="how">
                        <a class="nav-link link-ajax" href="/how"><i class="fa-solid fa-info"></i>How it works</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="content">
			@yield("content")
		</div>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
		<script>
            
            $(document).ready(function(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
                setTimeout(function(){ test(); }, 200);
				setupLoaders();
            });
            $(window).on('resize', function(){
                setTimeout(function(){ test(); }, 500);
            });
            $(".navbar-toggler").click(function(){
                $(".navbar-collapse").slideToggle(300);
                setTimeout(function(){ test(); });
            });

			// ---------Responsive-navbar-active-animation-----------
            function test(){
                var tabsNewAnim = $('#navbarSupportedContent');
                var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
                var activeItemNewAnim = tabsNewAnim.find('.active');
                var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
                var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
                var itemPosNewAnimTop = activeItemNewAnim.position();
                var itemPosNewAnimLeft = activeItemNewAnim.position();
				if(activeItemNewAnim.length > 0) {
					$(".hori-selector").css("display", "initial");
					$(".hori-selector").css({
						"top":itemPosNewAnimTop.top + "px", 
						"left":itemPosNewAnimLeft.left + "px",
						"height": activeWidthNewAnimHeight + "px",
						"width": activeWidthNewAnimWidth + "px"
					});
				}
                $("#navbarSupportedContent").on("click","li",function(e){
					$(".hori-selector").css("display", "initial");
                    $('#navbarSupportedContent ul li').removeClass("active");
                    $(this).addClass('active');
                    var activeWidthNewAnimHeight = $(this).innerHeight();
                    var activeWidthNewAnimWidth = $(this).innerWidth();
                    var itemPosNewAnimTop = $(this).position();
                    var itemPosNewAnimLeft = $(this).position();
                    $(".hori-selector").css({
                        "top":itemPosNewAnimTop.top + "px", 
                        "left":itemPosNewAnimLeft.left + "px",
                        "height": activeWidthNewAnimHeight + "px",
                        "width": activeWidthNewAnimWidth + "px"
                    });
                });
            }

			function setupLoaders() {
				$('.link-ajax').click(function (event) {
					$("#pageLoader").addClass("active");
					$("#content").css("display", "none");
                    // Avoid the link click from loading a new page
                    event.preventDefault();
					let title = $(this).attr('title') ? $(this).attr('title') : "Andrew Gosselin";
                    window.history.pushState('page2', title, $(this).attr('href'));
					$("#currentPage").html("/home/root/" + title.toLowerCase());
					$("#currentPage").attr("href", $(this).attr('href'));
                    // Load the content from the link's href attribute
                    $('#main #content').load("/pages" + $(this).attr('href'), function () {
						setTimeout(function() {
							$("#pageLoader").removeClass("active");
							$("#content").css("display", "initial");
							setupLoaders();
						}, 500);
					});
                });
			}



            // --------------add active class-on another-page move----------
            jQuery(document).ready(function($){
                // Get current path and find target link
                var path = window.location.pathname.split("/").pop();

                // Account for home page with empty path
                if ( path == '' ) {
                    path = 'index.html';
                }

                var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
                // Add active class to target link
                target.parent().addClass('active');
            });




            // Add active class on another page linked
            // ==========================================
            // $(window).on('load',function () {
            //     var current = location.pathname;
            //     console.log(current);
            //     $('#navbarSupportedContent ul li a').each(function(){
            //         var $this = $(this);
            //         // if the current path is like this link, make it active
            //         if($this.attr('href').indexOf(current) !== -1){
            //             $this.parent().addClass('active');
            //             $this.parents('.menu-submenu').addClass('show-dropdown');
            //             $this.parents('.menu-submenu').parent().addClass('active');
            //         }else{
            //             $this.parent().removeClass('active');
            //         }
            //     })
            // });
		</script>

		@hasSection('linkPreview')
			@yield('linkPreview')
		@else
			<meta property="og:url"                content="{{url('/')}}" />
			<meta property="og:type"               content="website" />
			<meta property="og:title"              content="Blockchain Notes" />
			<meta property="og:description"        content="Anonymous notes that are stored on the blockchain for further anomynity and redundancy." />
			<meta property="og:image"              content="{{url('https://cyrexag.com/assets/branding/logo.png')}}" />
		@endif
		@yield('scripts')
    </body>
</html>