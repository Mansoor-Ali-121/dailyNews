@extends('webtemp')
@section('content')
    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">

        <!-- Section start 1 Breaking News -->
        <div class="section panel overflow-hidden swiper-parent border-top">
            <div class="section-outer panel py-2 lg:py-4 dark:text-white">
                <div class="container max-w-xl">
                    <div class="section-inner panel vstack gap-2">
                        <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                            <div class="block-content panel">
                             <h3 class="text-center">{{ __('messages.breaking_news') }}</h3>

                                <div class="swiper"
                                    data-uc-swiper="items: 1; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev; disable-class: d-none;"
                                    data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 4; gap: 24;">
                                    <div class="swiper-wrapper">
                                        @foreach ($breakingNews as $item)
                                            <div class="swiper-slide">
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle gap-2">
                                                        <div class="row child-cols g-2" data-uc-grid>
                                                            <div class="col-auto">
                                                                <div
                                                                    class="post-media panel overflow-hidden max-w-64px min-w-64px">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('breakingnews_images/images/' . $item->image) }}"
                                                                            data-src="{{ asset('breakingnews_images/images/' . $item->image) }}"
                                                                            alt="Hidden Gems: Underrated Travel Destinations Around the World"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{ route('single.breakingnews', $item->breakingnews_slug) }}"
                                                                        class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="post-header panel vstack justify-between gap-1">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="{{ route('single.breakingnews', $item->breakingnews_slug) }}">{{ $item->title }}</a>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div
                                    class="swiper-nav nav-prev position-absolute top-50 start-0 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                                    <i class="icon-1 unicon-chevron-left"></i>
                                </div>
                                <div
                                    class="swiper-nav nav-next position-absolute top-50 start-100 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px h-32px z-1">
                                    <i class="icon-1 unicon-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 2 -->
        <div class="section panel mb-4 lg:mb-6">
            <div class="section-outer panel">
                <div class="container max-w-xl">
                    <div class="section-inner panel vstack gap-4">
                        <div class="section-content">
                            <div class="row child-col-12 lg:child-cols g-4 lg:g-6 col-match">
                                <div class="lg:col-9">
                                    <div class="block-layout slider-layout swiper-parent uc-dark">
                                        <div class="block-content panel uc-visible-toggle">
                                            <div class="swiper"
                                                data-uc-swiper="items: 1; active: 1; gap: 4; prev: .nav-prev; next: .nav-next; autoplay: 6000; parallax: true; fade: true; effect: fade; disable-class: d-none;">
                                                <div class="swiper-wrapper">
                                                    @foreach ($activeNews as $item)
                                                        <div class="swiper-slide">
                                                            <article
                                                                class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                                                <div class="post-media panel overflow-hidden h-100">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                                        <canvas class="h-100 w-100"></canvas>
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('breakingnews_images/images/' . $item->image) }}"
                                                                            data-src="{{ asset('breakingnews_images/images/' . $item->image) }}"
                                                                            alt="Solo Travel: Some Tips and Destinations for the Adventurous Explorer"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9 d-block md:d-none">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('website/assets/images/demo-seven/common/logo.svg') }}"
                                                                            data-src="{{ asset('website/assets/images/demo-seven/posts/img-11.jpg') }}"
                                                                            alt="Solo Travel: Some Tips and Destinations for the Adventurous Explorer"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                                </div>
                                                                <div class="post-header panel vstack justify-end items-start gap-1 p-2 sm:p-4 position-cover text-white"
                                                                    data-swiper-parallax-y="-24">
                                                                    <div
                                                                        class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                                                    </div>
                                                                    <h3
                                                                        class="post-title h5 lg:h4 xl:h3 m-0 max-w-600px text-white text-truncate-2">
                                                                        <a class="text-none text-white"
                                                                            href="{{ route('single.breakingnews', $item->breakingnews_slug) }}">{{ $item->title }}</a>
                                                                    </h3>
                                                                    {{-- Author --}}
                                                                    <div>
                                                                        <div
                                                                            class="post-meta panel hstack justify-between fs-7 text-white text-opacity-60 mt-1">
                                                                            <div class="meta">
                                                                                <div class="hstack gap-2">
                                                                                    <div>
                                                                                        @if ($item->author)
                                                                                            <div
                                                                                                class="post-author hstack gap-1">

                                                                                                <a href="{{ route('author.profile', $item->author->user_slug) }}"
                                                                                                    data-uc-tooltip={{ $item->author->name }}><img
                                                                                                        src="{{ asset('images/users/' . $item->author->user_image) }}"
                                                                                                        alt="Peter Sawyer"
                                                                                                        class="w-24px h-24px rounded-circle"></a>
                                                                                                <a href="page-author.html"
                                                                                                    class="text-black dark:text-white text-none fw-bold">{{ $item->author->name }}</a>
                                                                                            </div>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div>
                                                                                        <a href="#post_comment"
                                                                                            class="post-comments text-none hstack gap-narrow">
                                                                                            <i
                                                                                                class="icon-narrow unicon-chat"></i>
                                                                                            <span>5</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="actions">
                                                                                <div class="hstack gap-1"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div
                                                class="swiper-nav nav-prev position-absolute top-50 start-0 translate-middle-y btn btn-alt-primary text-black rounded-circle p-0 mx-2 border-0 shadow-xs w-32px h-32px z-1 uc-hidden-hover">
                                                <i class="icon-1 unicon-chevron-left"></i>
                                            </div>
                                            <div
                                                class="swiper-nav nav-next position-absolute top-50 end-0 translate-middle-y btn btn-alt-primary text-black rounded-circle p-0 mx-2 border-0 shadow-xs w-32px h-32px z-1 uc-hidden-hover">
                                                <i class="icon-1 unicon-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Sidebar --}}
                                <div class="lg:col-3">
                                    <div class="panel cstack gap-2 h-100">
                                        <div>
                                            <div class="widget ad-widget vstack gap-2">
                                                <div class="widget-title text-center">
                                                    <h5 class="fs-7 ft-tertiary text-uppercase m-0">Sponsore</h5>
                                                </div>
                                                <div class="widget-content">
                                                    <a class="cstack max-w-300px mx-auto text-none"
                                                        href="{{ route('news.index') }}" rel="nofollow">
                                                        <img class="d-none sm:d-block"
                                                            src="{{ asset('website/assets/images/demo-seven/common/dailynews.webp') }}"
                                                            alt="Ad slot">
                                                        <img class="d-block sm:d-none"
                                                            src="{{ asset('website/assets/images/demo-seven/common/dailynews.webp') }}"
                                                            alt="Ad slot">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 3 -->
        {{-- Upper news category Sports News --}}
        <div class="section panel overflow-hidden">
            <div class="section-outer panel">
                <div class="container max-w-xl">
                    <div class="section-inner">
                        <div class="row child-cols-12 lg:child-cols g-4 lg:g-6 col-match" data-uc-grid>
                            <div class="lg:col-8">
                                <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name === 'Sports')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="panel row child-cols-12 md:child-cols g-2 lg:g-4 col-match sep-y"
                                            data-uc-grid>
                                            <div class="col-12 md:col-6 order-0 md:order-1">
                                                <div>
                                                    {{-- mid image breaking news --}}
                                                    <article
                                                        class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                                        <div class="post-media panel overflow-hidden h-100">
                                                            <div
                                                                class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                                <canvas class="h-100 w-100"></canvas>
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                    src="{{ asset('breakingnews_images/images/' . $singleLatestBreakingNews->image) }}"
                                                                    alt="The Importance of Sleep: Tips for Better Rest and Recovery"
                                                                    data-uc-img="loading: lazy">
                                                            </div>
                                                            <div
                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-16x9 d-block md:d-none">
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                    src="{{ asset('breakingews_images/images/' . $singleLatestBreakingNews->image) }}"
                                                                    alt="The Importance of Sleep: Tips for Better Rest and Recovery"
                                                                    data-uc-img="loading: lazy">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                        </div>
                                                        <div
                                                            class="post-header panel vstack justify-end items-start gap-1 p-2 sm:p-4 position-cover text-white">
                                                            <div
                                                                class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                <span>{{ $singleLatestBreakingNews->created_at->format('d M Y') }}</span>
                                                            </div>
                                                            <h3
                                                                class="post-title h5 lg:h4 m-0 max-w-600px text-white text-truncate-2">
                                                                <a class="text-none text-white"
                                                                    href="{{ route('single.breakingnews', $singleLatestBreakingNews->breakingnews_slug) }}">{{ $singleLatestBreakingNews->title }}</a>
                                                            </h3>
                                                            <div>
                                                                <div
                                                                    class="post-meta panel hstack justify-between fs-7 text-white text-opacity-60 mt-1">
                                                                    <div class="meta">
                                                                        <div class="hstack gap-2">
                                                                            @if ($singleLatestBreakingNews->author)
                                                                                <div>

                                                                                    <div class="post-author hstack gap-1">
                                                                                        <a href="{{ route('author.profile', $singleLatestBreakingNews->author->user_slug) }}"
                                                                                            data-uc-tooltip="{{ $singleLatestBreakingNews->author->name }}"><img
                                                                                                src="{{ asset('images/users/' . $singleLatestBreakingNews->author->user_image) }}"
                                                                                                alt="Sarah Eddrissi"
                                                                                                class="w-24px h-24px rounded-circle"></a>
                                                                                        <a href="page-author.html"
                                                                                            class="text-black dark:text-white text-none fw-bold">{{ $singleLatestBreakingNews->author->name }}</a>
                                                                                    </div>
                                                                                </div>
                                                                            @endif

                                                                            <div>
                                                                                <a href="#post_comment"
                                                                                    class="post-comments text-none hstack gap-narrow">
                                                                                    <i class="icon-narrow unicon-chat"></i>
                                                                                    <span>0</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="actions">
                                                                        <div class="hstack gap-1"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                    {{-- Mid breaking news image  --}}
                                                </div>
                                            </div>
                                            {{-- Start sports news --}}
                                            <div class="order-1 md:order-0">
                                                <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>
                                                    @forelse ($sportsNews as $sports)
                                                        <div>
                                                            <article class="post type-post panel uc-transition-toggle">
                                                                <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                                    <div>
                                                                        <div
                                                                            class="post-header panel vstack justify-between gap-1">
                                                                            <h3 class="post-title h6 m-0 text-truncate-2">
                                                                                <a class="text-none hover:text-primary duration-150"
                                                                                    href="{{ route('single.news', $sports->news_slug) }}">{{ $sports->news_title }}</a>
                                                                            </h3>
                                                                            <div
                                                                                class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                                <span data-bs-toggle="tooltip"
                                                                                    title=" {{ $sports->created_at->format('d M Y') }}">
                                                                                    {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                                    {{ $sports->created_at->diffForHumans() }}
                                                                                    <i class="bi bi-info-circle-fill"></i>

                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div
                                                                            class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                            <div
                                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                    src="{{ asset('news/news_images/' . $sports->news_image) }}"
                                                                                    alt="The Future of Sustainable Living: Driving Eco-Friendly Lifestyles"
                                                                                    data-uc-img="loading: lazy">
                                                                            </div>
                                                                            <a href="{{ route('single.news', $sports->news_slug) }}"
                                                                                class="position-cover"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    @empty
                                                        <div class="col-12 text-center py-5">
                                                            <p>No news available for this category at the moment.</p>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                            {{-- End sports news --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Upper news category Business News --}}
                            <div class="lg:col-4">
                                <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name == 'Business')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>
                                            @forelse ($businessnews as $business)
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                            <div>
                                                                <div
                                                                    class="post-header panel vstack justify-between gap-1">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href="{{ route('single.news', $business->news_slug) }}">{{ $business->news_title }}</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                        <span data-bs-toggle="tooltip"
                                                                            title=" {{ $business->created_at->format('d M Y') }}">
                                                                            {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                            {{ $business->created_at->diffForHumans() }}
                                                                            <i class="bi bi-info-circle-fill"></i>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div
                                                                    class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('news/news_images/' . $business->news_image) }}"
                                                                            alt="Solo Travel: Some Tips and Destinations for the Adventurous Explorer"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{ route('single.news', $business->news_slug) }}"
                                                                        class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            @empty
                                                <div class="col-12 text-center py-5">
                                                    <p>No news available for this category at the moment.</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 4 -->
        {{-- Latest News --}}
        <div class="section panel overflow-hidden swiper-parent">
            <div class="section-outer panel py-4 lg:py-6 dark:text-white">
                <div class="container max-w-xl">
                    <div class="section-inner panel vstack gap-2">
                        <div class="block-layout carousel-layout vstack gap-2 lg:gap-3 panel">
                            <div class="block-header panel pt-1 border-top">
                                <h2 class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                    Latest News</h2>
                            </div>
                            <div class="block-content panel">
                                <div class="swiper"
                                    data-uc-swiper="items: 2; gap: 16; dots: .dot-nav; next: .nav-next; prev: .nav-prev; disable-class: d-none;"
                                    data-uc-swiper-s="items: 3; gap: 24;" data-uc-swiper-l="items: 5; gap: 24;">
                                    <div class="swiper-wrapper">
                                        @foreach ($news as $item)
                                            <div class="swiper-slide">
                                                <div>
                                                    <article
                                                        class="post type-post panel uc-transition-toggle vstack gap-2">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div
                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-3x2">
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                    src="{{ asset('news/news_images/' . $item->news_image) }}"
                                                                    data-src="{{ asset('news/news_images/' . $item->news_image) }}"
                                                                    alt="Hidden Gems: Underrated Travel Destinations Around the World"
                                                                    data-uc-img="loading: lazy">
                                                            </div>
                                                            <a href="{{ route('single.news', $item->news_slug) }}"
                                                                class="position-cover"></a>
                                                        </div>
                                                        <div class="post-header panel vstack gap-1">
                                                            <h3 class="post-title h6 m-0 text-truncate-2">
                                                                <a class="text-none hover:text-primary duration-150"
                                                                    href="{{ route('single.news', $item->news_slug) }}">{{ $item->news_title }}</a>
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
                                        @endforeach
                                    </div>
                                </div>
                                <div
                                    class="swiper-nav nav-prev position-absolute top-50 start-0 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px lg:w-40px h-32px lg:h-40px z-1">
                                    <i class="icon-1 unicon-chevron-left"></i>
                                </div>
                                <div
                                    class="swiper-nav nav-next position-absolute top-50 start-100 translate-middle btn btn-alt-primary text-black rounded-circle p-0 border shadow-xs w-32px lg:w-40px h-32px lg:h-40px z-1">
                                    <i class="icon-1 unicon-chevron-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 5 -->
        {{-- Lower news category --}}
        <div class="section panel overflow-hidden">
            <div class="section-outer panel">
                <div class="container max-w-xl">
                    <div class="section-inner">
                        <div class="row child-cols-12 lg:child-cols g-4 lg:g-6 col-match" data-uc-grid>
                            <div class="lg:col-8 order-0 lg:order-2">
                                <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name == 'Entertainment')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="panel row child-cols-12 md:child-cols g-2 lg:g-4 col-match sep-y"
                                            data-uc-grid>
                                            {{-- right side breaking news --}}
                                            <div class="col-12 md:col-6 order-0 md:order-1">
                                                @if ($secondLatestBreakingNews->author)
                                                    <div>
                                                        <article
                                                            class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 h-100 overflow-hidden uc-dark">
                                                            <div class="post-media panel overflow-hidden h-100">
                                                                <div
                                                                    class="featured-image bg-gray-25 dark:bg-gray-800 h-100 d-none md:d-block">
                                                                    <canvas class="h-100 w-100"></canvas>
                                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                        src="{{ asset('breakingnews_images/images/' . $secondLatestBreakingNews->image) }}"
                                                                        data-src=""
                                                                        alt="The Rise of AI-Powered Personal Assistants: How They Manage"
                                                                        data-uc-img="loading: lazy">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                            </div>
                                                            <div
                                                                class="post-header panel vstack justify-end items-start gap-1 p-2 sm:p-4 position-cover text-white">
                                                                <div
                                                                    class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                    <span>{{ $secondLatestBreakingNews->created_at->format('M d Y') }}</span>
                                                                </div>
                                                                <h3
                                                                    class="post-title h5 lg:h4 m-0 max-w-600px text-white text-truncate-2">
                                                                    <a class="text-none text-white"
                                                                        href="{{ route('single.breakingnews', $secondLatestBreakingNews->breakingnews_slug) }}">{{ $secondLatestBreakingNews->title }}</a>
                                                                </h3>
                                                                <div>
                                                                    <div
                                                                        class="post-meta panel hstack justify-between fs-7 text-white text-opacity-60 mt-1">
                                                                        <div class="meta">
                                                                            <div class="hstack gap-2">
                                                                                <div>
                                                                                    <div class="post-author hstack gap-1">
                                                                                        <a href="{{ route('author.profile', $secondLatestBreakingNews->author->user_slug) }}"
                                                                                            data-uc-tooltip="{{ $secondLatestBreakingNews->author->name }}"><img
                                                                                                src="{{ asset('images/users/' . $secondLatestBreakingNews->author->user_image) }}"
                                                                                                alt="David Peterson"
                                                                                                class="w-24px h-24px rounded-circle"></a>
                                                                                        <a href=""
                                                                                            class="text-black dark:text-white text-none fw-bold">{{ $secondLatestBreakingNews->author->name }}</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                    <a href="#post_comment"
                                                                                        class="post-comments text-none hstack gap-narrow">
                                                                                        <i
                                                                                            class="icon-narrow unicon-chat"></i>
                                                                                        <span>2</span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="actions">
                                                                            <div class="hstack gap-1"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endif
                                            </div>
                                            {{-- right side breaking news and --}}

                                            {{-- Mid side Entertainment News --}}
                                            <div class="order-1 md:order-0">
                                                <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>
                                                    @foreach ($entertainmentnews as $item)
                                                        <div>
                                                            <article class="post type-post panel uc-transition-toggle">
                                                                <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                                    <div>
                                                                        <div
                                                                            class="post-header panel vstack justify-between gap-1">
                                                                            <h3 class="post-title h6 m-0 text-truncate-2">
                                                                                <a class="text-none hover:text-primary duration-150"
                                                                                    href={{ route('single.news', $item->news_slug) }}>{{ $item->news_title }}</a>
                                                                            </h3>
                                                                            <div
                                                                                class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                                <span data-bs-toggle="tooltip"
                                                                                    title=" {{ $item->created_at->format('d M Y') }}">
                                                                                    {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                                    {{ $item->created_at->diffForHumans() }}
                                                                                    <i class="bi bi-info-circle-fill"></i>

                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div
                                                                            class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                            <div
                                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                    src="{{ asset('news/news_images/' . $item->news_image) }}"
                                                                                    data-src="{{ asset('news/news_images/' . $item->news_image) }}"
                                                                                    alt="Business Agility the Digital Age: Leveraging AI and Automation"
                                                                                    data-uc-img="loading: lazy">
                                                                            </div>
                                                                            <a href="{{ route('single.news', $item->news_slug) }}"
                                                                                class="position-cover"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            {{-- Mid side Entertainment News end --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- left side Automobile news --}}
                            <div class="lg:col-4 order-1">
                                <div class="block-layout grid-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name == 'Auto')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>
                                            @foreach ($autonews as $auto)
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                            <div>
                                                                <div
                                                                    class="post-header panel vstack justify-between gap-1">
                                                                    <h3 class="post-title h6 m-0 text-truncate-2">
                                                                        <a class="text-none hover:text-primary duration-150"
                                                                            href={{ route('single.news', $auto->news_slug) }}>{{ $auto->news_title }}</a>
                                                                    </h3>
                                                                    <div
                                                                        class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                        <span data-bs-toggle="tooltip"
                                                                            title=" {{ $auto->created_at->format('d M Y') }}">
                                                                            {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                            {{ $auto->created_at->diffForHumans() }}
                                                                            <i class="bi bi-info-circle-fill"></i>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div
                                                                    class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                    <div
                                                                        class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                            src="{{ asset('news/news_images/' . $auto->news_image) }}"
                                                                            data-src="{{ asset('news/news_images/' . $auto->news_image) }}"
                                                                            alt="Tech Innovations Reshaping the Retail Landscape: AI Payments"
                                                                            data-uc-img="loading: lazy">
                                                                    </div>
                                                                    <a href="{{ route('single.news', $auto->news_slug) }}"
                                                                        class="position-cover"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- left side Automobile news end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 6 -->
        <div class="section panel overflow-hidden">
            <div class="section-outer panel py-4 lg:py-6 dark:text-white">
                <div class="container max-w-xl">
                    <div class="section-inner">
                        <div class="row child-cols-12 lg:child-cols g-4 lg:g-6 col-match" data-uc-grid>
                            {{-- Politics Section --}}
                            <div class="lg:col-4">
                                <div class="block-layout list-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name == 'Politics')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>

                                            {{-- Display the LATEST Politics news in one element --}}
                                            @if ($politicsnews->isNotEmpty())
                                                @php
                                                    $latestPoliticsNews = $politicsnews->first();
                                                @endphp
                                                <div>
                                                    <article
                                                        class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 overflow-hidden uc-dark">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div
                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-4x3">
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                    src="{{ asset('news/news_images/' . $latestPoliticsNews->news_image) }}"
                                                                    data-src="{{ asset('news/news_images/' . $latestPoliticsNews->news_image) }}"
                                                                    alt="{{ $latestPoliticsNews->news_title }}"
                                                                    data-uc-img="loading: lazy">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                        </div>
                                                        <div
                                                            class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                                            <div
                                                                class="post-meta panel hstack justify-between fs-7 text-white text-opacity-60 mt-1">
                                                                <div class="meta">
                                                                    <div class="hstack gap-2">
                                                                        <div>
                                                                            <div class="post-author hstack gap-1">
                                                                                <a href="page-author.html"
                                                                                    data-uc-tooltip="{{ $latestPoliticsNews->author->name ?? 'Author' }}">
                                                                                    <img src="{{ asset('images/users/' . ($latestPoliticsNews->author->user_image ?? 'default_user.png')) }}"
                                                                                        alt="{{ $latestPoliticsNews->author->name ?? 'Author' }}"
                                                                                        class="w-24px h-24px rounded-circle">
                                                                                </a>
                                                                                <a href="page-author.html"
                                                                                    class="text-black dark:text-white text-none fw-bold">{{ $latestPoliticsNews->author->name ?? 'Unknown Author' }}</a>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>0</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">
                                                                    <div class="hstack gap-1"></div>
                                                                </div>
                                                            </div>
                                                            <h3
                                                                class="post-title h6 lg:h5 m-0 m-0 max-w-600px text-white text-truncate-2">
                                                                <a class="text-none text-white"
                                                                    href="{{ route('single.news', $latestPoliticsNews->news_slug) }}">{{ $latestPoliticsNews->news_title }}</a>
                                                            </h3>
                                                            <div
                                                                class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                <span>{{ $latestPoliticsNews->created_at->format('d M Y') }}</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('single.news', $latestPoliticsNews->news_slug) }}"
                                                            class="position-cover"></a>
                                                    </article>
                                                </div>
                                            @endif

                                            {{-- Display the OTHER THREE Politics news in down 3 --}}
                                            @if ($politicsnews->count() > 1)
                                                @foreach ($politicsnews->skip(1) as $politics)
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                                <div>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="{{ route('single.news', $politics->news_slug) }}">{{ $politics->news_title }}</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <span data-bs-toggle="tooltip"
                                                                                title=" {{ $politics->created_at->format('d M Y') }}">
                                                                                {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                                {{ $politics->created_at->diffForHumans() }}
                                                                                <i class="bi bi-info-circle-fill"></i>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                        <div
                                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ asset('news/news_images/' . $politics->news_image) }}"
                                                                                data-src="{{ asset('news/news_images/' . $politics->news_image) }}"
                                                                                alt="{{ $politics->news_title }}"
                                                                                data-uc-img="loading: lazy">
                                                                        </div>
                                                                        <a href="{{ route('single.news', $politics->news_slug) }}"
                                                                            class="position-cover"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--  Politics end --}}

                            {{-- World news Section --}}
                            <div class="lg:col-4">
                                <div class="block-layout list-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name == 'World')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>

                                            {{-- Display the LATEST World news in one element --}}
                                            @if ($worldnews->isNotEmpty())
                                                @php
                                                    $latestWorldnews = $worldnews->first();
                                                @endphp
                                                <div>
                                                    <article
                                                        class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 overflow-hidden uc-dark">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div
                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-4x3">
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                    src="{{ asset('news/news_images/' . $latestWorldnews->news_image) }}"
                                                                    data-src="{{ asset('news/news_images/' . $latestWorldnews->news_image) }}"
                                                                    alt="{{ $latestWorldnews->news_title }}"
                                                                    data-uc-img="loading: lazy">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                        </div>
                                                        <div
                                                            class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                                            <div
                                                                class="post-meta panel hstack justify-between fs-7 text-white text-opacity-60 mt-1">
                                                                <div class="meta">
                                                                    <div class="hstack gap-2">
                                                                        <div>
                                                                            <div class="post-author hstack gap-1">
                                                                                <a href="page-author.html"
                                                                                    data-uc-tooltip="{{ $latestWorldnews->author->name ?? 'Author' }}">
                                                                                    <img src="{{ asset('images/users/' . ($latestWorldnews->author->user_image ?? 'default_user.png')) }}"
                                                                                        alt="{{ $latestWorldnews->author->name ?? 'Author' }}"
                                                                                        class="w-24px h-24px rounded-circle">
                                                                                </a>
                                                                                <a href="page-author.html"
                                                                                    class="text-black dark:text-white text-none fw-bold">{{ $latestWorldnews->author->name ?? 'Unknown Author' }}</a>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>0</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">
                                                                    <div class="hstack gap-1"></div>
                                                                </div>
                                                            </div>
                                                            <h3
                                                                class="post-title h6 lg:h5 m-0 m-0 max-w-600px text-white text-truncate-2">
                                                                <a class="text-none text-white"
                                                                    href="{{ route('single.news', $latestWorldnews->news_slug) }}">{{ $latestWorldnews->news_title }}</a>
                                                            </h3>
                                                            <div
                                                                class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                <span>{{ $latestWorldnews->created_at->format('d M Y') }}</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('single.news', $latestWorldnews->news_slug) }}"
                                                            class="position-cover"></a>
                                                    </article>
                                                </div>
                                            @endif

                                            {{-- Display the OTHER THREE Politics news in down 3 --}}
                                            @if ($worldnews->count() > 1)
                                                @foreach ($worldnews->skip(1) as $world)
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                                <div>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="{{ route('single.news', $world->news_slug) }}">{{ $world->news_title }}</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <span data-bs-toggle="tooltip"
                                                                                title=" {{ $world->created_at->format('d M Y') }}">
                                                                                {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                                {{ $world->created_at->diffForHumans() }}
                                                                                <i class="bi bi-info-circle-fill"></i>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                        <div
                                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ asset('news/news_images/' . $world->news_image) }}"
                                                                                data-src="{{ asset('news/news_images/' . $world->news_image) }}"
                                                                                alt="{{ $world->news_title }}"
                                                                                data-uc-img="loading: lazy">
                                                                        </div>
                                                                        <a href="{{ route('single.news', $world->news_slug) }}"
                                                                            class="position-cover"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- World news Section end --}}

                            {{-- Health news Section --}}
                            <div class="lg:col-4">
                                <div class="block-layout list-layout vstack gap-2 lg:gap-3 panel overflow-hidden">
                                    <div class="block-header panel pt-1 border-top">
                                        <h2
                                            class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                            @foreach ($categories as $category)
                                                @if ($category->category_name == 'Health')
                                                    <a class="hstack d-inline-flex gap-0 text-none hover:text-primary duration-150"
                                                        href="{{ route('single.category', $category->category_slug) }}">
                                                        <span>{{ $category->category_name }}</span>
                                                        <i class="icon-1 fw-bold unicon-chevron-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <div class="block-content">
                                        <div class="row child-cols-12 g-2 lg:g-4 sep-x" data-uc-grid>

                                            {{-- Display the LATEST World news in one element --}}
                                            @if ($healthnews->isNotEmpty())
                                                @php
                                                    $latestHealthnews = $healthnews->first();
                                                @endphp
                                                <div>
                                                    <article
                                                        class="post type-post panel uc-transition-toggle vstack gap-2 lg:gap-3 overflow-hidden uc-dark">
                                                        <div class="post-media panel overflow-hidden">
                                                            <div
                                                                class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-4x3">
                                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                    src="{{ asset('news/news_images/' . $latestHealthnews->news_image) }}"
                                                                    data-src="{{ asset('news/news_images/' . $latestHealthnews->news_image) }}"
                                                                    alt="{{ $latestHealthnews->news_title }}"
                                                                    data-uc-img="loading: lazy">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="position-cover bg-gradient-to-t from-black to-transparent opacity-90">
                                                        </div>
                                                        <div
                                                            class="post-header panel vstack justify-start items-start flex-column-reverse gap-1 p-2 position-cover text-white">
                                                            <div
                                                                class="post-meta panel hstack justify-between fs-7 text-white text-opacity-60 mt-1">
                                                                <div class="meta">
                                                                    <div class="hstack gap-2">
                                                                        <div>
                                                                            <div class="post-author hstack gap-1">
                                                                                <a href="page-author.html"
                                                                                    data-uc-tooltip="{{ $latestHealthnews->author->name ?? 'Author' }}">
                                                                                    <img src="{{ asset('images/users/' . ($latestHealthnews->author->user_image ?? 'default_user.png')) }}"
                                                                                        alt="{{ $latestHealthnews->author->name ?? 'Author' }}"
                                                                                        class="w-24px h-24px rounded-circle">
                                                                                </a>
                                                                                <a href="page-author.html"
                                                                                    class="text-black dark:text-white text-none fw-bold">{{ $latestHealthnews->author->name ?? 'Unknown Author' }}</a>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>0</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="actions">
                                                                    <div class="hstack gap-1"></div>
                                                                </div>
                                                            </div>
                                                            <h3
                                                                class="post-title h6 lg:h5 m-0 m-0 max-w-600px text-white text-truncate-2">
                                                                <a class="text-none text-white"
                                                                    href="{{ route('single.news', $latestHealthnews->news_slug) }}">{{ $latestHealthnews->news_title }}</a>
                                                            </h3>
                                                            <div
                                                                class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                <span>{{ $latestHealthnews->created_at->format('d M Y') }}</span>
                                                            </div>
                                                        </div>
                                                        <a href="{{ route('single.news', $latestHealthnews->news_slug) }}"
                                                            class="position-cover"></a>
                                                    </article>
                                                </div>
                                            @endif

                                            {{-- Display the OTHER THREE Politics news in down 3 --}}
                                            @if ($healthnews->count() > 1)
                                                @foreach ($healthnews->skip(1) as $health)
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                                <div>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0 text-truncate-2">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="{{ route('single.news', $health->news_slug) }}">{{ $health->news_title }}</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-date hstack gap-narrow fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <span data-bs-toggle="tooltip"
                                                                                title=" {{ $health->created_at->format('d M Y') }}">
                                                                                {{-- You might want to display a short, static value here if the tooltip provides the dynamic one --}}

                                                                                {{ $health->created_at->diffForHumans() }}
                                                                                <i class="bi bi-info-circle-fill"></i>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="post-media panel overflow-hidden max-w-72px min-w-72px">
                                                                        <div
                                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-1x1">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ asset('news/news_images/' . $health->news_image) }}"
                                                                                data-src="{{ asset('news/news_images/' . $health->news_image) }}"
                                                                                alt="{{ $health->news_title }}"
                                                                                data-uc-img="loading: lazy">
                                                                        </div>
                                                                        <a href="{{ route('single.news', $health->news_slug) }}"
                                                                            class="position-cover"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Health news Section end --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 7 -->
        <div id="live_now" class="live_now section panel uc-dark swiper-parent">
            <div class="section-outer panel py-4 lg:py-6 bg-gray-900 text-white">
                <div class="container max-w-xl">
                    <div
                        class="block-layout slider-thumbs-layout slider-thumbs panel vstack gap-2 lg:gap-3 panel overflow-hidden">
                        <div class="block-header panel">
                            <h2
                                class="h6 ft-tertiary fw-bold ls-0 text-uppercase hstack gap-narrow m-0 text-black dark:text-white">
                                <i class="icon-1 fw-bold unicon-dot-mark text-red" data-uc-animate="flash"></i>
                                <span>Live now</span>
                            </h2>
                        </div>
                        <div class="block-content">
                            <div class="row child-cols-12 g-2" data-uc-grid>
                                <div class="md:col-8 lg:col-9">
                                    <div class="panel overflow-hidden rounded">
                                        <div class="swiper swiper-main"
                                            data-uc-swiper="connect: .swiper-thumbs; items: 1; gap: 8; autoplay: 7000; parallax: true; fade: true; effect: fade; dots: .swiper-pagination; disable-class: last-slide;">
                                            {{-- left side videos --}}
                                            <div class="swiper-wrapper">
                                                @foreach ($livevideos as $livevideo)
                                                    <div class="swiper-slide">
                                                        <article
                                                            class="post type-post h-250px md:h-350px lg:h-500px bg-black uc-dark">
                                                            <div class="post-media panel overflow-hidden position-cover">
                                                                <div class="featured-video bg-gray-700 ratio ratio-3x2">
                                                                    {{-- Check if video_url (which should be the ID) exists and is not empty --}}
                                                                    @if (!empty($livevideo->video_url))
                                                                        <iframe class="video-cover"
                                                                            src="http://www.youtube.com/embed/{{ $livevideo->video_url }}?autoplay=1&mute=1&controls=0&loop=1&playlist={{ $livevideo->video_url }}"
                                                                            title="{{ $livevideo->video_title ?? 'Live YouTube Video' }}"
                                                                            frameborder="0"
                                                                            allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                            referrerpolicy="strict-origin-when-cross-origin"
                                                                            allowfullscreen>
                                                                        </iframe>
                                                                    @else
                                                                        {{-- Fallback for when no video ID is present --}}
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-center h-100 text-white-50">
                                                                            Video not available. Please check the URL.
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="position-cover bg-gradient-to-t from-black to-transparent z-1 opacity-80">
                                                            </div>

                                                            <div
                                                                class="post-header panel position-absolute bottom-0 vstack justify-between gap-2 xl:gap-4 max-300px lg:max-w-600px p-2 md:p-4 xl:p-6 z-1">
                                                                <h3 class="post-title h4 lg:h3 xl:h2 m-0 text-truncate-2"
                                                                    data-swiper-parallax-x="-8">
                                                                    <a class="text-none" href="#">
                                                                        {{ $livevideo->video_title ?? 'Live Video' }}
                                                                    </a>
                                                                </h3>

                                                                <div data-swiper-parallax-x="8">
                                                                    <div
                                                                        class="post-meta panel hstack justify-between fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                        <div class="meta">
                                                                            <div class="hstack gap-2">

                                                                                {{-- Author info --}}
                                                                                @if ($livevideo->author)
                                                                                    <div class="post-author hstack gap-1">
                                                                                        <a href="{{ route('author.profile', $livevideo->author->user_slug) }}"
                                                                                            data-uc-tooltip="{{ $livevideo->author->name }}">
                                                                                            <img src="{{ asset('images/users/' . $livevideo->author->user_image) }}"
                                                                                                alt="{{ $livevideo->author->name }}"
                                                                                                class="w-24px h-24px rounded-circle">
                                                                                        </a>
                                                                                        <a href="{{ route('author.profile', $livevideo->author->user_slug) }}"
                                                                                            class="text-black dark:text-white text-none fw-bold">
                                                                                            {{ $livevideo->author->name }}
                                                                                        </a>
                                                                                    </div>
                                                                                @endif

                                                                                {{-- Date --}}
                                                                                <div class="post-date hstack gap-narrow">
                                                                                    <span>{{ $livevideo->created_at->format('M d, Y') }}</span>
                                                                                </div>

                                                                                {{-- Comments placeholder --}}
                                                                                <div>
                                                                                    <a href="#post_comment"
                                                                                        class="post-comments text-none hstack gap-narrow">
                                                                                        <i
                                                                                            class="icon-narrow unicon-chat"></i>
                                                                                        <span>0</span>
                                                                                    </a>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="actions">
                                                                            <div class="hstack gap-1"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div
                                                class="swiper-pagination top-auto start-auto bottom-0 end-0 m-2 md:m-4 xl:m-6 text-white d-none md:d-inline-flex justify-end w-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:col-4 lg:col-3">
                                    <div class="panel md:vstack gap-1 h-100">

                                        <div class="swiper swiper-thumbs swiper-thumbs-progress rounded order-2"
                                            data-uc-swiper="items: 2;
                                gap: 4;
                                disable-class: last-slide;"
                                            data-uc-swiper-s="items: auto;
                                direction: vertical;
                                autoHeight: true;
                                mousewheel: true;
                                freeMode: false;
                                watchSlidesVisibility: true;
                                watchSlidesProgress: true;
                                watchOverflow: true">
                                            {{-- right side videos --}}
                                            <div class="swiper-wrapper md:flex-1">
                                                @foreach ($livevideos as $livevideo)
                                                    <div
                                                        class="swiper-slide overflow-hidden rounded min-h-64px lg:min-h-100px">
                                                        <div class="swiper-slide-progress position-cover z-0">
                                                            <span></span>
                                                        </div>
                                                        <article class="post type-post panel uc-transition-toggle p-1 z-1">
                                                            <div class="row gx-1">
                                                                <div class="col-auto post-media-wrap">
                                                                    <div
                                                                        class="post-media panel overflow-hidden w-40px lg:w-64px rounded">
                                                                        <div
                                                                            class="featured-video bg-gray-700 ratio ratio-3x4">
                                                                            {{-- Use YouTube thumbnail if video_url exists, otherwise a placeholder --}}
                                                                            @if (!empty($livevideo->video_url))
                                                                                <img src="https://img.youtube.com/vi/{{ $livevideo->video_url }}/mqdefault.jpg"
                                                                                    alt="{{ $livevideo->video_title ?? 'Video Thumbnail' }}"
                                                                                    class="video-cover min-h-100px">
                                                                            @else
                                                                                <img src="{{ asset('images/common/img-fallback.png') }}"
                                                                                    alt="Video Thumbnail"
                                                                                    class="video-cover min-h-100px">
                                                                            @endif
                                                                        </div>
                                                                        <div
                                                                            class="has-video-overlay position-absolute top-0 end-0 w-40px h-40px lg:w-64px lg:h-64px bg-gradient-45 from-transparent via-transparent to-black opacity-50">
                                                                        </div>
                                                                        <span
                                                                            class="cstack has-video-icon position-absolute top-50 start-50 translate-middle fs-6 w-40px h-40px text-white">
                                                                            <i
                                                                                class="icon-narrow unicon-play-filled-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <p
                                                                        class="fs-6 m-0 text-truncate-2 text-gray-900 dark:text-white">
                                                                        {{ $livevideo->video_title ?? 'Video Title Not Available' }}
                                                                    </p>
                                                                    @if ($livevideo->author)
                                                                        <div
                                                                            class="post-author hstack gap-1 fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                                            <img src="{{ asset('images/users/' . $livevideo->author->user_image) }}"
                                                                                alt="{{ $livevideo->author->name }}"
                                                                                class="w-16px h-16px rounded-circle">
                                                                            <span>{{ $livevideo->author->name }}</span>
                                                                        </div>
                                                                    @endif
                                                                    <div
                                                                        class="post-date hstack gap-narrow fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60">
                                                                        <span>{{ $livevideo->created_at->format('M d, Y') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div
                                            class="swiper-prev btn btn-2xs lg:btn-xs btn-primary w-100 d-none md:d-flex order-1">
                                            Prev</div>
                                        <div
                                            class="swiper-next btn btn-2xs lg:btn-xs btn-primary w-100 d-none md:d-flex order-3">
                                            Next</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

        <!-- Section start 8 -->
        <div id="latest_news" class="latest-news section panel">
            <div class="section-outer panel py-4 lg:py-6">
                <div class="container max-w-xl">
                    <div class="section-inner">
                        <div class="content-wrap row child-cols-12 g-4 lg:g-6" data-uc-grid>
                            {{-- Left side blog --}}
                            <div class="md:col-9">
                                <div class="main-wrap panel vstack gap-3 lg:gap-6">
                                    <div class="block-layout grid-layout vstack gap-2 panel overflow-hidden">
                                        <div class="block-header panel pt-1 border-top">
                                            <h2
                                                class="h6 ft-tertiary fw-bold ls-0 text-uppercase m-0 text-black dark:text-white">
                                                Latest Blogs
                                            </h2>
                                        </div>
                                        <div class="block-content">
                                            <div class="row child-cols-12 g-2 lg:g-4 sep-x">
                                                @foreach ($blogs as $item)
                                                    <div>
                                                        <article class="post type-post panel uc-transition-toggle">
                                                            <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="post-media panel overflow-hidden max-w-150px min-w-100px lg:min-w-250px">
                                                                        <div
                                                                            class="featured-image bg-gray-25 dark:bg-gray-800 ratio ratio-3x2">
                                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                                src="{{ asset('Blogs/blog_images/' . $item->blog_image) }}"
                                                                                data-src="{{ asset('Blogs/blog_images/' . $item->blog_image) }}"
                                                                                alt="The Rise of AI-Powered Personal Assistants: How They Manage"
                                                                                data-uc-img="loading: lazy">
                                                                        </div>
                                                                        <a href="{{ route('single.blog', $item->blog_slug) }}"
                                                                            class="position-cover"></a>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3
                                                                            class="post-title h5 lg:h4 m-0 text-truncate-2">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href={{ route('single.blog', $item->blog_slug) }}>{{ $item->blog_title }}</a>
                                                                        </h3>
                                                                    </div>
                                                                    <p
                                                                        class="post-excrept ft-tertiary fs-6 text-gray-900 dark:text-white text-opacity-60 text-truncate-2 my-1">
                                                                        {{ $item->blog_description }}
                                                                    </p>
                                                                    <div class="post-link">
                                                                        <a href="{{ route('single.blog', $item->blog_slug) }}"
                                                                            class="link fs-7 fw-bold text-uppercase text-none mt-1 pb-narrow p-0 border-bottom dark:text-white">
                                                                            <span>Read more</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="block-footer cstack lg:mt-2">
                                            <a href="   " {{-- Assuming you have a route named 'all.blogs' for the main blog listing page --}}
                                                class="animate-btn gap-0 btn btn-sm btn-alt-primary bg-transparent text-black dark:text-white border w-100">
                                                <span>Load more posts</span>
                                                <i class="icon icon-1 unicon-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Left side blog --}}
                            <div class="md:col-3">
                                <div class="sidebar-wrap panel vstack gap-2 pb-2"
                                    data-uc-sticky="end: .content-wrap; offset: 150; media: @m;">
                                    <div class="widget ad-widget vstack gap-2 text-center p-2 border">
                                        <div class="widgt-content">
                                            <a class="cstack max-w-300px mx-auto text-none"
                                                href="{{ route('news.index') }}" rel="nofollow">
                                                <img class="d-block dark:d-none"
                                                    src="{{ asset('website/assets/images/demo-seven/common/dailynews.webp') }}"
                                                    alt="Ad slot">
                                                <img class="d-none dark:d-block"
                                                    src="{{ asset('website/assets/images/demo-seven/common/dailynews.webp') }}"
                                                    alt="Ad slot">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="widget popular-widget vstack gap-2 p-2 border">
                                        <div class="widget-title text-center">
                                            <h5 class="fs-7 ft-tertiary text-uppercase m-0">Popular now</h5>
                                        </div>
                                        <div class="widget-content">
                                            <div class="row child-cols-12 gx-4 gy-3 sep-x" data-uc-grid>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                            <div>
                                                                <div class="hstack items-start gap-3">
                                                                    <span
                                                                        class="h3 lg:h2 ft-tertiary fst-italic text-center text-primary m-0 min-w-24px">1</span>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="blog-details.html">Virtual Reality
                                                                                and Mental Health: Exploring the
                                                                                Therapeutic</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-meta panel hstack justify-between fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <div class="meta">
                                                                                <div class="hstack gap-2">
                                                                                    <div>
                                                                                        <div
                                                                                            class="post-date hstack gap-narrow">
                                                                                            <span>2mo ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <a href="#post_comment"
                                                                                            class="post-comments text-none hstack gap-narrow">
                                                                                            <i
                                                                                                class="icon-narrow unicon-chat"></i>
                                                                                            <span>290</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="actions">
                                                                                <div class="hstack gap-1"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                            <div>
                                                                <div class="hstack items-start gap-3">
                                                                    <span
                                                                        class="h3 lg:h2 ft-tertiary fst-italic text-center text-primary m-0 min-w-24px">2</span>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="blog-details.html">The Future of
                                                                                Sustainable Living: Driving Eco-Friendly
                                                                                Lifestyles</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-meta panel hstack justify-between fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <div class="meta">
                                                                                <div class="hstack gap-2">
                                                                                    <div>
                                                                                        <div
                                                                                            class="post-date hstack gap-narrow">
                                                                                            <span>2mo ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <a href="#post_comment"
                                                                                            class="post-comments text-none hstack gap-narrow">
                                                                                            <i
                                                                                                class="icon-narrow unicon-chat"></i>
                                                                                            <span>1</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="actions">
                                                                                <div class="hstack gap-1"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                            <div>
                                                                <div class="hstack items-start gap-3">
                                                                    <span
                                                                        class="h3 lg:h2 ft-tertiary fst-italic text-center text-primary m-0 min-w-24px">3</span>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="blog-details.html">Smart Homes,
                                                                                Smarter Living: Exploring IoT and AI</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-meta panel hstack justify-between fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <div class="meta">
                                                                                <div class="hstack gap-2">
                                                                                    <div>
                                                                                        <div
                                                                                            class="post-date hstack gap-narrow">
                                                                                            <span>23d ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <a href="#post_comment"
                                                                                            class="post-comments text-none hstack gap-narrow">
                                                                                            <i
                                                                                                class="icon-narrow unicon-chat"></i>
                                                                                            <span>15</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="actions">
                                                                                <div class="hstack gap-1"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                                <div>
                                                    <article class="post type-post panel uc-transition-toggle">
                                                        <div class="row child-cols g-2 lg:g-3" data-uc-grid>
                                                            <div>
                                                                <div class="hstack items-start gap-3">
                                                                    <span
                                                                        class="h3 lg:h2 ft-tertiary fst-italic text-center text-primary m-0 min-w-24px">4</span>
                                                                    <div
                                                                        class="post-header panel vstack justify-between gap-1">
                                                                        <h3 class="post-title h6 m-0">
                                                                            <a class="text-none hover:text-primary duration-150"
                                                                                href="blog-details.html">How Businesses
                                                                                Are Adapting to E-Commerce and AI
                                                                                Integration</a>
                                                                        </h3>
                                                                        <div
                                                                            class="post-meta panel hstack justify-between fs-7 text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                            <div class="meta">
                                                                                <div class="hstack gap-2">
                                                                                    <div>
                                                                                        <div
                                                                                            class="post-date hstack gap-narrow">
                                                                                            <span>29d ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <a href="#post_comment"
                                                                                            class="post-comments text-none hstack gap-narrow">
                                                                                            <i
                                                                                                class="icon-narrow unicon-chat"></i>
                                                                                            <span>20</span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="actions">
                                                                                <div class="hstack gap-1"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- User mail --}}
                                    {{-- <div class="widget social-widget vstack gap-2 text-center p-2 border">
                                        <div class="widgt-title">
                                            <h4 class="fs-7 ft-tertiary text-uppercase m-0">Follow @News5</h4>
                                        </div>
                                        <div class="widgt-content">
                                            <form class="vstack gap-1">
                                                <input
                                                    class="form-control form-control-sm fs-6 fw-medium h-40px w-full bg-white dark:bg-gray-800 dark:bg-gray-800 dark:border-white dark:border-opacity-15 dark:border-opacity-15"
                                                    type="email" placeholder="Your email" required="">
                                                <button class="btn btn-sm btn-primary" type="submit">Sign up</button>
                                            </form>
                                            <ul class="nav-x justify-center gap-1 mt-3">
                                                <li>
                                                    <a href="#fb"
                                                        class="cstack w-32px h-32px border rounded-circle hover:text-black dark:hover:text-white hover:scale-110 transition-all duration-150"><i
                                                            class="icon icon-1 unicon-logo-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#x"
                                                        class="cstack w-32px h-32px border rounded-circle hover:text-black dark:hover:text-white hover:scale-110 transition-all duration-150"><i
                                                            class="icon icon-1 unicon-logo-x-filled"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#in"
                                                        class="cstack w-32px h-32px border rounded-circle hover:text-black dark:hover:text-white hover:scale-110 transition-all duration-150"><i
                                                            class="icon icon-1 unicon-logo-instagram"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#yt"
                                                        class="cstack w-32px h-32px border rounded-circle hover:text-black dark:hover:text-white hover:scale-110 transition-all duration-150"><i
                                                            class="icon icon-1 unicon-logo-youtube"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section end -->

    </div>
    <!-- Wrapper end -->
@endsection
