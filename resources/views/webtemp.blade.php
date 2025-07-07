<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News5</title>
    <meta name="description"
        content="News5 a clean, modern and pixel-perfect multipurpose blogging HTML5 website template.">
    <meta name="keywords"
        content="saas, saas template, site template, software, startup, digital product, html5, landing, marketing, bootstrap, uikit3, agency, ai, digital agency, it solutions, nodejs">
    <link rel="canonical" href="https://unistudio.co/html/News5">
    <meta name="theme-color" content="#2757fd">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="News5">
    <meta property="og:description"
        content="Full-featured, professional-looking news, editorial and magazine website template.">
    <meta property="og:url" content="https://unistudio.co/html/news5/">
    <meta property="og:site_name" content="News5">
    <meta property="og:image" content="https://unistudio.co/html/news5/assets/images/common/seo-image.jpg">
    <meta property="og:image:width" content="1180">
    <meta property="og:image:height" content="600">
    <meta property="og:image:type" content="image/png">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="News5">
    <meta name="twitter:description"
        content="Full-featured, professional-looking news, editorial and magazine website template.">
    <meta name="twitter:image" content="https://unistudio.co/html/news5/assets/images/common/seo-image.jpg">

    <link rel="canonical" href="https://unistudio.co/html/news5/">

    <link rel="preload" href="{{ asset('website/assets/css/unicons.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}" as="style">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preload" href="{{ asset('website/assets/js/libs/jquery.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/libs/scrollmagic.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/libs/swiper-bundle.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/libs/anime.min.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/helpers/data-attr-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/helpers/swiper-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/helpers/anime-helper.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/helpers/anime-helper-defined-timelines.js') }}"
        as="script">
        <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    <link rel="preload" href="{{ asset('website/assets/js/uikit-components-bs.js') }}" as="script">
    <link rel="preload" href="{{ asset('website/assets/js/app.js') }}" as="script">

    <script src="{{ asset('website/assets/js/app-head-bs.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('website/assets/js/uni-core/css/uni-core.min.css') }}">

    <link rel="stylesheet" href="{{ asset('website/assets/css/unicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/prettify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/swiper-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('website/assets/css/theme/demo-seven.min.css') }}">

    <script src="{{ asset('website/assets/js/uni-core/js/uni-core-bundle.min.js') }}"></script>
</head>

<body class="uni-body panel bg-white text-gray-900 dark:bg-black dark:text-white text-opacity-50 overflow-x-hidden">

    <!--  Search modal -->
    <div id="uc-search-modal" class="uc-modal-full uc-modal" data-uc-modal="overlay: true">
        <div class="uc-modal-dialog d-flex justify-center bg-white text-dark dark:bg-gray-900 dark:text-white"
            data-uc-height-viewport="">
            <button
                class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
                type="button">
                <i class="unicon-close"></i>
            </button>
            <div class="panel w-100 sm:w-500px px-2 py-10">
                <h3 class="h1 text-center">Search</h3>
                <form class="hstack gap-1 mt-4 border-bottom p-narrow dark:border-gray-700" action="?">
                    <span
                        class="d-inline-flex justify-center items-center w-24px sm:w-40 h-24px sm:h-40px opacity-50"><i
                            class="unicon-search icon-3"></i></span>
                    <input type="search" name="q"
                        class="form-control-plaintext ms-1 fs-6 sm:fs-5 w-full dark:text-white"
                        placeholder="Type your keyword.." aria-label="Search" autofocus>
                </form>
            </div>
        </div>
    </div>

    <!--  Sidebar panel -->
    <div id="uc-menu-panel" data-uc-offcanvas="overlay: true;">
        <div class="uc-offcanvas-bar bg-white text-dark dark:bg-gray-900 dark:text-white">
            <header class="uc-offcanvas-header hstack justify-between items-center pb-4 bg-white dark:bg-gray-900">
                <div class="uc-logo">
                    <a href="index.html" class="h5 text-none text-gray-900 dark:text-white">
                        <img class="w-32px" src="{{ asset('website/assets/images/common/logo-icon.svg') }}"
                            alt="News5" data-uc-svg>
                    </a>
                </div>
                <button
                    class="uc-offcanvas-close p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
                    type="button">
                    <i class="unicon-close"></i>
                </button>
            </header>

            <div class="panel">
                <form id="search-panel" class="form-icon-group vstack gap-1 mb-3" data-uc-sticky="">
                    <input type="email" class="form-control form-control-md fs-6" placeholder="Search..">
                    <span class="form-icon text-gray">
                        <i class="unicon-search icon-1"></i>
                    </span>
                </form>
                <ul class="nav-y gap-narrow fw-bold fs-5" data-uc-nav>
                    <li class="uc-parent">
                        <a href="#">Homepages</a>
                        <ul class="uc-nav-sub" data-uc-nav="">
                            <li><a href="../main/index.html">Main</a></li>
                            <li><a href="../demo-two/index.html">Classic News</a></li>
                            <li><a href="../demo-three/index.html">Tech</a></li>
                            <li><a href="../demo-four/index.html">Classic Blog</a></li>
                            <li><a href="../demo-five/index.html">Gaming</a></li>
                            <li><a href="../demo-six/index.html">Sports</a></li>
                            <li><a href="../demo-seven/index.html">Newspaper</a></li>
                            <li><a href="../demo-eight/index.html">Magazine</a></li>
                            <li><a href="../demo-nine/index.html">Travel</a></li>
                            <li><a href="../demo-ten/index.html">Food</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Latest</a></li>
                    <li><a href="#">Trending</a></li>
                    <li class="uc-parent">
                        <a href="#">Inner Pages</a>
                        <ul class="uc-nav-sub" data-uc-nav="">
                            <li class="uc-parent">
                                <a href="blog-details.html">Blog - detail</a>
                                <ul class="uc-nav-sub">
                                    <li><a href="blog-details.html">Blog detail</a></li>
                                </ul>
                            </li>
                            <li class="uc-parent">
                                <a href="#">Other pages</a>
                                <ul class="uc-nav-sub">
                                    <li><a href="page-faq.html">FAQ</a></li>
                                    <li><a href="page-terms.html">Terms of use</a></li>
                                    <li><a href="page-privacy.html">Privacy policy</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="social-icons nav-x mt-4">
                    <li>
                        <a href="#"><i class="unicon-logo-medium icon-2"></i></a>
                        <a href="#"><i class="unicon-logo-x-filled icon-2"></i></a>
                        <a href="#"><i class="unicon-logo-instagram icon-2"></i></a>
                        <a href="#"><i class="unicon-logo-pinterest icon-2"></i></a>
                    </li>
                </ul>
                <div class="py-2 hstack gap-2 mt-4 bg-white dark:bg-gray-900" data-uc-sticky="position: bottom">
                    <div class="vstack gap-1">
                        <span class="fs-7 opacity-60">Select theme:</span>
                        <div class="darkmode-trigger" data-darkmode-switch="">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider fs-5"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Favorites modal -->
    <div id="uc-favorites-modal" data-uc-modal="overlay: true">
        <div class="uc-modal-dialog lg:max-w-500px bg-white text-dark dark:bg-gray-800 dark:text-white rounded">
            <button
                class="uc-modal-close-default p-0 icon-3 btn border-0 dark:text-white dark:text-opacity-50 hover:text-primary hover:rotate-90 duration-150 transition-all"
                type="button">
                <i class="unicon-close"></i>
            </button>
            <div class="panel vstack justify-center items-center gap-2 text-center px-3 py-8">
                <i class="icon icon-4 unicon-bookmark mb-2 text-primary dark:text-white"></i>
                <h2 class="h4 md:h3 m-0">Saved articles</h2>
                <p class="fs-5 opacity-60">You have not yet added any article to your bookmarks!</p>
                <a href="index.html" class="btn btn-sm btn-primary mt-2 uc-modal-close">Browse articles</a>
            </div>
        </div>
    </div>

    <!--  Bottom Actions Sticky and back to top -->
    <div class="backtotop-wrap position-fixed bottom-0 end-0 z-99 m-2 vstack">
        <div class="darkmode-trigger cstack w-40px h-40px rounded-circle text-none bg-gray-100 dark:bg-gray-700 dark:text-white"
            data-darkmode-toggle="">
            <label class="switch">
                <span class="sr-only">Dark mode toggle</span>
                <input type="checkbox">
                <span class="slider fs-5"></span>
            </label>
        </div>
        <a class="btn btn-sm bg-primary text-white w-40px h-40px rounded-circle" href="to_top" data-uc-backtotop>
            <i class="icon-2 unicon-chevron-up"></i>
        </a>
    </div>

    <!-- Header start -->
    <header class="uc-header header-seven uc-navbar-sticky-wrap z-999"
        data-uc-sticky="sel-target: .uc-navbar-container; cls-active: uc-navbar-sticky; cls-inactive: uc-navbar-transparent; end: !*;">
        <nav class="uc-navbar-container text-gray-900 dark:text-white fs-6 z-1">
            <div class="uc-top-navbar panel z-3 overflow-hidden bg-primary-600 swiper-parent"
                style="--uc-nav-height: 32px"
                data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                <div class="container container-full">
                    <div class="uc-navbar-item">
                        <div class="swiper swiper-ticker swiper-ticker-sep px-2" style="--uc-ticker-gap: 32px"
                            data-uc-swiper="items: auto; gap: 32; center: true; center-bounds: true; autoplay: 10000; speed: 10000; autoplay-delay: 0.1; loop: true; allowTouchMove: false; freeMode: true; autoplay-disableOnInteraction: true;">
                            <div class="swiper-wrapper">
                                @foreach ($livebreakingnews as $item )
                                    
                                <div class="swiper-slide text-white">
                                    <div class="type-post post panel">
                                        <a href="{{ route('single.breakingnews', $item->breakingnews_slug) }}" class="fs-7 fw-normal text-none text-inherit">{{ $item->title }}</a>
                                    </div>
                                </div>
                                @endforeach

                                {{-- <div class="swiper-slide text-white">
                                    <div class="type-post post panel">
                                        <a href="blog-details.html" class="fs-7 fw-normal text-none text-inherit">Tech
                                            Innovations Reshaping the Retail Landscape: AI Payments</a>
                                    </div>
                                </div>
                                <div class="swiper-slide text-white">
                                    <div class="type-post post panel">
                                        <a href="blog-details.html"
                                            class="fs-7 fw-normal text-none text-inherit">Balancing Work and Wellness:
                                            Tech Solutions for Healthy</a>
                                    </div>
                                </div>
                                <div class="swiper-slide text-white">
                                    <div class="type-post post panel">
                                        <a href="blog-details.html" class="fs-7 fw-normal text-none text-inherit">The
                                            Importance of Sleep: Tips for Better Rest and Recovery</a>
                                    </div>
                                </div>
                                <div class="swiper-slide text-white">
                                    <div class="type-post post panel">
                                        <a href="blog-details.html" class="fs-7 fw-normal text-none text-inherit">The
                                            Future of Sustainable Living: Driving Eco-Friendly Lifestyles</a>
                                    </div>
                                </div>
                                <div class="swiper-slide text-white">
                                    <div class="type-post post panel">
                                        <a href="blog-details.html"
                                            class="fs-7 fw-normal text-none text-inherit">Business Agility the Digital
                                            Age: Leveraging AI and Automation</a>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uc-center-navbar panel hstack z-2 min-h-48px d-none lg:d-flex"
                data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                <div class="container max-w-xl">
                    <div class="navbar-container hstack border-bottom">
                        <div class="uc-navbar-center gap-2 lg:gap-3 flex-1">
                            <ul class="uc-navbar-nav gap-3 justify-between flex-1 fs-6 fw-bold"
                                style="--uc-nav-height: 48px">
                                <li>
                                    <a href="{{ url('/') }}"><span class="icon-1 unicon-finance"></span></a>
                                    <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 rounded-0 hide-scrollbar"
                                        data-uc-drop=" offset: 0; boundary: !.navbar-container; stretch: x; animation: uc-animation-slide-top-small; duration: 150;">
                                        <div class="row child-cols col-match g-2">
                                            <div class="col-2">
                                                <ul class="uc-nav uc-navbar-dropdown-nav">
                                                    <li><a href="blog-category.html">Trending</a></li>
                                                    <li><a href="blog-category.html">Politics</a></li>
                                                    <li><a href="blog-category.html">Opinions</a></li>
                                                    <li><a href="blog-category.html">World</a></li>
                                                    <li><a href="blog-category.html">Media</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-2">
                                                <ul class="uc-nav uc-navbar-dropdown-nav">
                                                    <li><a href="blog-category.html">Tech</a></li>
                                                    <li><a href="blog-category.html">Business</a></li>
                                                    <li><a href="blog-category.html">Fashion</a></li>
                                                    <li><a href="blog-category.html">Arts</a></li>
                                                    <li><a href="blog-category.html">Food</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-2">
                                                <ul class="uc-nav uc-navbar-dropdown-nav">
                                                    <li><a href="blog-category.html">Economy</a></li>
                                                    <li><a href="blog-category.html">Finance</a></li>
                                                    <li><a href="blog-category.html">Education</a></li>
                                                    <li><a href="blog-category.html">Health</a></li>
                                                    <li><a href="blog-category.html">National</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-2">
                                                <ul class="uc-nav uc-navbar-dropdown-nav">
                                                    <li><a href="blog-category.html">E-Books</a></li>
                                                    <li><a href="blog-category.html">Press</a></li>
                                                    <li><a href="blog-category.html">Podcasts</a></li>
                                                    <li><a href="blog-category.html">Entertainments</a></li>
                                                    <li><a href="blog-category.html">Weather</a></li>
                                                </ul>
                                            </div>
                                            <div>
                                                <div class="uc-navbar-newsletter panel vstack">
                                                    <h6 class="fs-6 ft-tertiary fw-medium">Newsletter</h6>
                                                    <form class="hstack gap-1 bg-gray-300 bg-opacity-10">
                                                        <input type="email"
                                                            class="form-control-plaintext form-control-xs fs-6 dark:text-white"
                                                            placeholder="Your email address..">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary fs-6 rounded-0">Subscribe</button>
                                                    </form>
                                                    <p class="fs-7 mt-1">Do not worry, we don't spam!</p>
                                                    <ul class="nav-x gap-2 mt-3">
                                                        <li>
                                                            <a href="#fb"><i
                                                                    class="icon icon-2 unicon-logo-facebook"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#x"><i
                                                                    class="icon icon-2 unicon-logo-x-filled"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#in"><i
                                                                    class="icon icon-2 unicon-logo-instagram"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#yt"><i
                                                                    class="icon icon-2 unicon-logo-youtube"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Latest <span data-uc-navbar-parent-icon></span></a>
                                    <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 rounded-0 hide-scrollbar"
                                        data-uc-drop=" offset: 0; boundary: !.navbar-container; stretch: x; animation: uc-animation-slide-top-small; duration: 150;">
                                        <div class="row col-match g-2">
                                            <div class="w-1/5">
                                                <div class="uc-navbar-switcher-nav border-end">
                                                    <ul class="uc-tab-left fs-6 text-end"
                                                        data-uc-tab="connect: #uc-navbar-switcher-tending; animation: uc-animation-slide-right-small, uc-animation-slide-left-small">
                                                        <li><a href="#">All</a></li>
                                                        <li><a href="#">Politics</a></li>
                                                        <li><a href="#">Opinions</a></li>
                                                        <li><a href="#">World</a></li>
                                                        <li><a href="#">Media</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="w-4/5">
                                                <div id="uc-navbar-switcher-tending"
                                                    class="uc-navbar-switcher uc-switcher">
                                                    <div class="row child-cols col-match g-2">
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="../assets/images/demo-seven/posts/img-19.jpg"
                                                                            alt="The Future of Sustainable Living: Driving Eco-Friendly Lifestyles"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">The Future of
                                                                            Sustainable Living: Driving Eco-Friendly
                                                                            Lifestyles</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>2mo</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>1</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="../assets/images/demo-seven/posts/img-20.jpg"
                                                                            alt="Smart Homes, Smarter Living: Exploring IoT and AI"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Smart Homes,
                                                                            Smarter Living: Exploring IoT and AI</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>23d</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>15</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-21.jpg') }}"
                                                                            alt="How Businesses Are Adapting to E-Commerce and AI Integration"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">How Businesses Are
                                                                            Adapting to E-Commerce and AI
                                                                            Integration</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>29d</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>20</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-22.jpg') }}"
                                                                            alt="Technology: Wearables, AR, and AI in the Apparel Industry"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Technology:
                                                                            Wearables, AR, and AI in the Apparel
                                                                            Industry</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>2mo</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>5</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </div>
                                                    <div class="row child-cols g-2">
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-04.jpg') }}"
                                                                            alt="The Importance of Sleep: Tips for Better Rest and Recovery"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">The Importance of
                                                                            Sleep: Tips for Better Rest and Recovery</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>2h</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>0</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-05.jpg') }}"
                                                                            alt="The Future of Sustainable Living: Driving Eco-Friendly Lifestyles"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">The Future of
                                                                            Sustainable Living: Driving Eco-Friendly
                                                                            Lifestyles</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>12h</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>1</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-10.jpg') }}"
                                                                            alt="Eco-Tourism: Traveling Responsibly and Sustainably"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Eco-Tourism:
                                                                            Traveling Responsibly and Sustainably</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>29d</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>20</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-13.jpg') }}"
                                                                            alt="Tech Tools for your Time Management: Enhancing Productivity"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Tech Tools for
                                                                            your Time Management: Enhancing
                                                                            Productivity</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>3mo</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>19</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </div>
                                                    <div class="row child-cols g-2">
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-03.jpg') }}"
                                                                            alt="Balancing Work and Wellness: Tech Solutions for Healthy"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Balancing Work and
                                                                            Wellness: Tech Solutions for Healthy</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>1h</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>0</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-06.jpg') }}"
                                                                            alt="Business Agility the Digital Age: Leveraging AI and Automation"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Business Agility
                                                                            the Digital Age: Leveraging AI and
                                                                            Automation</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>7d</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>23</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-14.jpg') }}"
                                                                            alt="A Guide to The Rise of Gourmet Street Food: Trends and Top Picks"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">A Guide to The
                                                                            Rise of Gourmet Street Food: Trends and Top
                                                                            Picks</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>6mo</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>2</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-16.jpg') }}"
                                                                            alt="Top Independent Contractors to Invest in Best of Startups"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Top Independent
                                                                            Contractors to Invest in Best of
                                                                            Startups</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>1yr</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>12</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </div>
                                                    <div class="row child-cols g-2">
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-01.jpg') }}"
                                                                            alt="The Rise of AI-Powered Personal Assistants: How They Manage"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">The Rise of
                                                                            AI-Powered Personal Assistants: How They
                                                                            Manage</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>1min</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>2</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-02.jpg') }}"
                                                                            alt="Tech Innovations Reshaping the Retail Landscape: AI Payments"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Tech Innovations
                                                                            Reshaping the Retail Landscape: AI
                                                                            Payments</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>55min</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>100</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-07.jpg') }}"
                                                                            alt="The Art of Baking: From Classic Bread to Artisan Pastries"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">The Art of Baking:
                                                                            From Classic Bread to Artisan Pastries</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>9d</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>112</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div>
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-1">
                                                                <div class="post-media panel overflow-hidden">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-09.jpg') }}"
                                                                            alt="Hidden Gems: Underrated Travel Destinations Around the World"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="blog-details.html"
                                                                        class="position-cover"></a>
                                                                </div>
                                                                <div class="post-header panel vstack gap-narrow">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="blog-details.html">Hidden Gems:
                                                                            Underrated Travel Destinations Around the
                                                                            World</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>23d</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>·</div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>7</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Politics <span data-uc-navbar-parent-icon></span></a>
                                    <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 rounded-0 hide-scrollbar"
                                        data-uc-drop=" offset: 0; boundary: !.navbar-container; stretch: x; animation: uc-animation-slide-top-small; duration: 150;">
                                        <div class="row child-cols col-match g-2">

                                            {{-- Post 1 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-04.jpg') }}"
                                                                alt="The Importance of Sleep: Tips for Better Rest and Recovery"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                The Importance of Sleep: Tips for Better Rest and
                                                                Recovery
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>2h</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>0</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 2 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-05.jpg') }}"
                                                                alt="The Future of Sustainable Living: Driving Eco-Friendly Lifestyles"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                The Future of Sustainable Living: Driving Eco-Friendly
                                                                Lifestyles
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>12h</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>1</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 3 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-10.jpg') }}"
                                                                alt="Eco-Tourism: Traveling Responsibly and Sustainably"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                Eco-Tourism: Traveling Responsibly and Sustainably
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>29d</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>20</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 4 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-13.jpg') }}"
                                                                alt="Tech Tools for your Time Management: Enhancing Productivity"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                Tech Tools for your Time Management: Enhancing
                                                                Productivity
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>3mo</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>19</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 5 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-17.jpg') }}"
                                                                alt="Potential of Immersive Technologies help your Business Grow"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                Potential of Immersive Technologies help your Business
                                                                Grow
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>1yr</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>45</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Opinions <span data-uc-navbar-parent-icon></span></a>
                                    <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 rounded-0 hide-scrollbar"
                                        data-uc-drop=" offset: 0; boundary: !.navbar-container; stretch: x; animation: uc-animation-slide-top-small; duration: 150;">
                                        <div class="row child-cols col-match g-2">

                                            {{-- Post 1 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-03.jpg') }}"
                                                                alt="Balancing Work and Wellness: Tech Solutions for Healthy"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                Balancing Work and Wellness: Tech Solutions for Healthy
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>1h</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>0</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 2 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-06.jpg') }}"
                                                                alt="Business Agility the Digital Age: Leveraging AI and Automation"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                Business Agility the Digital Age: Leveraging AI and
                                                                Automation
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>7d</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>23</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 3 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-14.jpg') }}"
                                                                alt="A Guide to The Rise of Gourmet Street Food: Trends and Top Picks"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                A Guide to The Rise of Gourmet Street Food: Trends and
                                                                Top Picks
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>6mo</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>2</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 4 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-16.jpg') }}"
                                                                alt="Top Independent Contractors to Invest in Best of Startups"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                Top Independent Contractors to Invest in Best of
                                                                Startups
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>1yr</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>12</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                            {{-- Post 5 --}}
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('website/assets/images/common/img-fallback.png') }}"
                                                                data-src="{{ asset('website/assets/images/demo-seven/posts/img-19.jpg') }}"
                                                                alt="The Future of Sustainable Living: Driving Eco-Friendly Lifestyles"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="{{ asset('blog-details.html') }}"
                                                            class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="{{ asset('blog-details.html') }}">
                                                                The Future of Sustainable Living: Driving Eco-Friendly
                                                                Lifestyles
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1">
                                                            <div class="post-date hstack gap-narrow"><span>2mo</span>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i
                                                                        class="icon-narrow unicon-chat"></i><span>1</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">World <span data-uc-navbar-parent-icon></span></a>
                                    <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 rounded-0 hide-scrollbar"
                                        data-uc-drop=" offset: 0; boundary: !.navbar-container; stretch: x; animation: uc-animation-slide-top-small; duration: 150;">
                                        <div class="row child-cols col-match g-2">
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-01.jpg"
                                                                alt="The Rise of AI-Powered Personal Assistants: How They Manage"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">The Rise of AI-Powered
                                                                Personal Assistants: How They Manage</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>1min</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>2</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-02.jpg"
                                                                alt="Tech Innovations Reshaping the Retail Landscape: AI Payments"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">Tech Innovations Reshaping
                                                                the Retail Landscape: AI Payments</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>55min</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>100</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-07.jpg"
                                                                alt="The Art of Baking: From Classic Bread to Artisan Pastries"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">The Art of Baking: From
                                                                Classic Bread to Artisan Pastries</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>9d</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>112</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-09.jpg"
                                                                alt="Hidden Gems: Underrated Travel Destinations Around the World"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">Hidden Gems: Underrated
                                                                Travel Destinations Around the World</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>23d</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>15</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-12.jpg"
                                                                alt="AI-Powered Financial Planning: How Algorithms Revolutionizing"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">AI-Powered Financial
                                                                Planning: How Algorithms Revolutionizing</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>2mo</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>2</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Media <span data-uc-navbar-parent-icon></span></a>
                                    <div class="uc-navbar-dropdown ft-primary text-unset p-3 pb-4 rounded-0 hide-scrollbar"
                                        data-uc-drop=" offset: 0; boundary: !.navbar-container; stretch: x; animation: uc-animation-slide-top-small; duration: 150;">
                                        <div class="row child-cols col-match g-2">
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-08.jpg"
                                                                alt="AI and Marketing: Unlocking Customer Insights"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">AI and Marketing: Unlocking
                                                                Customer Insights</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>15d</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>2</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-11.jpg"
                                                                alt="Solo Travel: Some Tips and Destinations for the Adventurous Explorer"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">Solo Travel: Some Tips and
                                                                Destinations for the Adventurous Explorer</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>2mo</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>5</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-15.jpg"
                                                                alt="Gaming in the Age of AI: Strategies for Startups"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">Gaming in the Age of AI:
                                                                Strategies for Startups</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>9mo</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>19</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-18.jpg"
                                                                alt="Virtual Reality and Mental Health: Exploring the Therapeutic"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">Virtual Reality and Mental
                                                                Health: Exploring the Therapeutic</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>2mo</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>290</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                            <div>
                                                <article
                                                    class="post type-post panel uc-transition-toggle vstack gap-1">
                                                    <div class="post-media panel overflow-hidden">
                                                        <div
                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="../assets/images/common/img-fallback.png"
                                                                data-src="../assets/images/demo-seven/posts/img-20.jpg"
                                                                alt="Smart Homes, Smarter Living: Exploring IoT and AI"
                                                                data-uc-img="loading: lazy">
                                                        </div>
                                                        <a href="blog-details.html" class="position-cover"></a>
                                                    </div>
                                                    <div class="post-header panel vstack gap-narrow">
                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                            <a class="text-none hover:text-primary duration-150"
                                                                href="blog-details.html">Smart Homes, Smarter Living:
                                                                Exploring IoT and AI</a>
                                                        </h3>
                                                        <div
                                                            class="post-meta panel hstack justify-start gap-1 fs-7 ft-tertiary fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex z-1 d-none md:d-block">
                                                            <div>
                                                                <div class="post-date hstack gap-narrow">
                                                                    <span>23d</span>
                                                                </div>
                                                            </div>
                                                            <div>·</div>
                                                            <div>
                                                                <a href="#post_comment"
                                                                    class="post-comments text-none hstack gap-narrow">
                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                    <span>15</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="blog-category.html">Tech</a>
                                </li>
                                <li>
                                    <a href="blog-category.html">Business</a>
                                </li>
                                <li>
                                    <a href="blog-category.html">Fashion</a>
                                </li>
                                <li>
                                    <a href="blog-category.html">Arts & Entertainments</a>
                                </li>
                                <li>
                                    <a href="blog-category.html">Food</a>
                                </li>
                                <li>
                                    <a href="blog-category.html">E-Books</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uc-bottom-navbar panel z-1">
                <div class="container max-w-xl">
                    <div class="uc-navbar min-h-72px lg:min-h-100px"
                        data-uc-navbar=" animation: uc-animation-slide-top-small; duration: 150;">
                        <div class="uc-navbar-left">
                            <div>
                                <a class="uc-menu-trigger icon-2" href="#uc-menu-panel" data-uc-toggle></a>
                            </div>
                            <div class="uc-navbar-item d-none lg:d-inline-flex">
                                <a class="btn btn-xs gap-narrow ps-1 border rounded-pill fw-bold dark:text-white hover:bg-gray-25 dark:hover:bg-gray-900"
                                    href="#live_now" data-uc-scroll="offset: 128">
                                    <i class="icon icon-narrow unicon-dot-mark text-red"
                                        data-uc-animate="flash"></i>
                                    <span>Live</span>
                                </a>
                            </div>
                            <div class="uc-logo d-block md:d-none">
                                <a href="{{ route('news.index') }}">
                                    <img class="w-100px text-dark dark:text-white"
                                        src="{{ asset('website/assets/images/demo-seven/common/dailynews.webp')}}" alt="News5"
                                        data-uc-svg>
                                </a>
                            </div>
                        </div>
                        <div class="uc-navbar-center">
                            <div class="uc-logo d-none md:d-block">
                                <a href="{{ route('news.index') }}">
                                    <img class="text-dark dark:text-white main-logo"
                                        src="{{ asset('website/assets/images/demo-seven/common/dailynews.webp')}}" alt="News5"
                                        data-uc-svg>
                                </a>
                            </div>
                        </div>
                        <div class="uc-navbar-right gap-2 lg:gap-3">
                            <div class="uc-navbar-item d-inline-flex lg:d-none">
                                <a class="btn btn-xs gap-narrow ps-1 border rounded-pill fw-bold dark:text-white hover:bg-gray-25 dark:hover:bg-gray-900"
                                    href="#live_now" data-uc-scroll="offset: 128">
                                    <i class="icon icon-narrow unicon-dot-mark text-red"
                                        data-uc-animate="flash"></i>
                                    <span>Live</span>
                                </a>
                            </div>
                            <div class="uc-navbar-item d-none lg:d-inline-flex">
                                <a class="uc-search-trigger cstack text-none text-dark dark:text-white"
                                    href="#uc-search-modal" data-uc-toggle>
                                    <i class="icon icon-2 fw-medium unicon-search"></i>
                                </a>
                            </div>
                            <div class="uc-navbar-item d-none lg:d-inline-flex">
                                <div class="uc-modes-trigger btn btn-xs w-32px h-32px p-0 border fw-normal rounded-circle dark:text-white hover:bg-gray-25 dark:hover:bg-gray-900"
                                    data-darkmode-toggle="">
                                    <label class="switch">
                                        <span class="sr-only">Dark toggle</span>
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- Content Start --}}
    @yield('content')
    {{-- Content End --}}

    <!-- Footer start -->
    <footer id="uc-footer" class="uc-footer panel uc-dark">
        <div
            class="footer-outer py-4 lg:py-6 bg-white dark:bg-gray-900 text-gray-900 dark:text-white text-opacity-50">
            <div class="container max-w-xl">
                <div class="footer-inner vstack gap-6 xl:gap-8">
                    <div class="uc-footer-bottom panel vstack gap-4 justify-center lg:fs-5">
                        <nav class="footer-nav">
                            <ul class="nav-x gap-2 lg:gap-4 justify-center text-center text-uppercase fw-medium">
                                <li><a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="blog-category.html">Politics</a></li>
                                <li><a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="blog-category.html">Opinions</a></li>
                                <li><a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="blog-category.html">World</a></li>
                                <li><a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="blog-category.html">Media</a></li>
                            </ul>
                        </nav>
                        <div class="footer-social hstack justify-center gap-2 lg:gap-3">
                            <ul class="nav-x gap-2">
                                <li>
                                    <a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="#ln"><i class="icon icon-2 unicon-logo-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="#fb"><i class="icon icon-2 unicon-logo-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="#x"><i class="icon icon-2 unicon-logo-x-filled"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="#in"><i class="icon icon-2 unicon-logo-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="#yt"><i class="icon icon-2 unicon-logo-youtube"></i></a>
                                </li>
                            </ul>
                            <div class="vr"></div>
                            <div class="d-inline-block">
                                <a href="#" class="hstack gap-1 text-none fw-medium">
                                    <i class="icon icon-1 unicon-earth-filled"></i>
                                    <span>English</span>
                                    <span data-uc-drop-parent-icon=""></span>
                                </a>
                                <div class="p-2 bg-white dark:bg-gray-800 shadow-xs w-150px"
                                    data-uc-drop="mode: click; boundary: !.uc-footer-bottom; animation: uc-animation-slide-top-small; duration: 150;">
                                    <ul class="nav-y gap-1 fw-medium items-end">
                                        <li><a href="#en">English</a></li>
                                        <li><a href="#ar">العربية</a></li>
                                        <li><a href="#ch">中文</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer-copyright vstack sm:hstack justify-center items-center gap-1 lg:gap-2">
                            <p>News5 ©
                                <script>
                                    document.write(
                                        new Date().getFullYear()
                                    )
                                </script>, All rights reserved.
                            </p>
                            <ul class="nav-x gap-2 fw-medium">
                                <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="page-privacy.html">Privacy notice</a></li>
                                <li><a class="uc-link text-underline hover:text-gray-900 dark:hover:text-white duration-150"
                                        href="page-terms.html">Terms of condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer end -->

<script defer src="{{ asset('website/assets/js/libs/jquery.min.js')}}"></script>
<script defer src="{{ asset('website/assets/js/libs/bootstrap.min.js')}}"></script>

<script defer src="{{ asset('website/assets/js/libs/anime.min.js')}}"></script>
<script defer src="{{ asset('website/assets/js/libs/swiper-bundle.min.js')}}"></script>
<script defer src="{{ asset('website/assets/js/libs/scrollmagic.min.js')}}"></script>
<script defer src="{{ asset('website/assets/js/helpers/data-attr-helper.js')}}"></script>
<script defer src="{{ asset('website/assets/js/helpers/swiper-helper.js')}}"></script>
<script defer src="{{ asset('website/assets/js/helpers/anime-helper.js')}}"></script>
<script defer src="{{ asset('website/assets/js/helpers/anime-helper-defined-timelines.js')}}"></script>
<script defer src="{{ asset('website/assets/js/uikit-components-bs.js')}}"></script>

<script defer src="{{ asset('website/assets/js/app.js')}}"></script>

    <script>
        // Schema toggle via URL
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const getSchema = urlParams.get("schema");
        if (getSchema === "dark") {
            setDarkMode(1);
        } else if (getSchema === "light") {
            setDarkMode(0);
        }
    </script>
</body>

</html>
