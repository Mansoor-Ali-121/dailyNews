@extends('webtemp')
@section('content')
    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">

        <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
            <div class="container max-w-xl">
                <div class="post-header">
                    <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                        <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                            <h1 class="h4 sm:h2 lg:h1 xl:display-6">{{ $blog->blog_title }}</h1>
                            <ul class="post-share-icons nav-x gap-1 dark:text-white">
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-facebook icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-x-filled icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-linkedin icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-logo-pinterest icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-email icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md p-0 border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                        href="#"><i class="unicon-link icon-1"></i></a>
                                </li>
                            </ul>
                        </div>
                        <figure class="featured-image m-0">
                            <figure
                                class="featured-image m-0 ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                    src="{{ asset('Blogs/blog_images/' . $blog->blog_image) }}"
                                    data-src="{{ asset('Blogs/blog_images/' . $blog->blog_image) }}"
                                    alt="{{ $blog->blog_title }}" data-uc-img="loading: lazy">
                            </figure>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="panel position-relative mt-4 lg:mt-6 xl:mt-9">
                <div class="container">
                    <div class="content-wrap row child-col-12 lg:child-cols g-4 lg:g-6">
                        <div class="lg:col-8 uc-first-column">
                            <div class="max-w-lg">
                                <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                                    {!! $blog->blog_content !!}
                                </div>
                                {{-- Author section --}}
                                @if ($blog->author)
                                    <div
                                        class="post-author panel py-4 px-3 sm:p-3 xl:p-4 bg-gray-25 dark:bg-opacity-10 rounded lg:rounded-2">
                                        <div class="row g-4 items-center">
                                            <div class="col-12 sm:col-5 xl:col-3">
                                                <figure
                                                    class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('images/users/' . $blog->author->user_image) }}"
                                                        data-src="{{ asset('images/users/' . $blog->author->user_image) }}"
                                                        alt="Amir Nisi" data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                            <div class="col">
                                                <div class="panel vstack items-start gap-2 md:gap-3">
                                                    <h4 class="h5 lg:h4 m-0">{{ $blog->author->name }}</h4>
                                                    <p class="fs-6 lg:fs-5">{{ $blog->author->user_description }}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- Author section end --}}

                                {{-- Previous Post and Next Post --}}
                                <div
                                    class="post-navigation panel vstack sm:hstack gap-2 mt-8 xl:mt-9
    @if ($previousPost && $nextPost) justify-between
    @elseif ($previousPost) justify-start
    @elseif ($nextPost) justify-end @endif
">

                                    {{-- Previous Post Navigation --}}
                                    @if ($previousPost)
                                        <div
                                            class="new-post panel hstack
            @if ($nextPost) w-100 sm:w-1/2
            @else w-full @endif
        ">
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <figure
                                                    class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('Blogs/blog_images/' . $previousPost->blog_image) }}"
                                                        data-src="{{ asset('Blogs/blog_images/' . $previousPost->blog_image) }}"
                                                        alt="{{ $previousPost->blog_title }}" data-uc-img="loading: lazy">
                                                    <a href="{{ route('single.blog', $previousPost->blog_slug) }}"
                                                        class="position-cover"
                                                        data-caption="{{ $previousPost->blog_title }}"></a>
                                                </figure>
                                            </div>
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3">
                                                <span class="fs-7 opacity-60"><i class="unicon-arrow-left"></i>Prev
                                                    BLog</span>
                                                <h6 class="h6 lg:h5 m-0 text-truncate-2">
                                                    <a href="{{ route('single.blog', $previousPost->blog_slug) }}"
                                                        class="text-none">
                                                        {{ $previousPost->blog_title }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <a href="{{ route('single.blog', $previousPost->blog_slug) }}"
                                                class="position-cover"></a>
                                        </div>
                                    @endif

                                    {{-- Next Post Navigation --}}
                                    @if ($nextPost)
                                        <div
                                            class="new-post panel hstack
            @if ($previousPost) w-100 sm:w-1/2
            @else w-full {{-- Take full width when only next BLog is present --}} @endif
        ">
                                            {{-- This inner div for content and image needs to be reversed for the 'next' BLog --}}
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3 text-end">
                                                <span class="fs-7 opacity-60">Next BLog <i
                                                        class="unicon-arrow-right"></i></span>
                                                <h6 class="h6 lg:h5 m-0 text-truncate-2">
                                                    <a href="{{ route('single.blog', $nextPost->blog_slug) }}"
                                                        class="text-none">
                                                        {{ $nextPost->blog_title }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <figure
                                                    class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('Blogs/blog_images/' . $nextPost->blog_image) }}"
                                                        data-src="{{ asset('Blogs/blog_images/' . $nextPost->blog_image) }}"
                                                        alt="{{ $nextPost->blog_title }}" data-uc-img="loading: lazy">
                                                    <a href="{{ route('single.blog', $nextPost->blog_slug) }}"
                                                        class="position-cover"
                                                        data-caption="{{ $nextPost->blog_title }}"></a>
                                                </figure>
                                            </div>
                                            <a href="{{ route('single.blog', $nextPost->blog_slug) }}"
                                                class="position-cover"></a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="lg:col-4">
                            <div class="sidebar-wrap panel vstack gap-2" data-uc-sticky="end: true;">
                                <div class="right-sidebar">
                                    <div class="recent-widget widget">
                                        <h2 class="widget-title">Recent Posts</h2>
                                        <div class="recent-post-widget clearfix">
                                            @foreach ($latestnews as $recentnews)
                                                <div class="show-featured clearfix">
                                                    <div class="post-img">
                                                        <a href="{{ route('single.news', $recentnews->news_slug) }}">
                                                            <img width="1200" height="700"
                                                                src="{{ asset('news/news_images/' . $recentnews->news_image) }}"
                                                                class="attachment-full size-full wp-post-image"
                                                                alt="" decoding="async"
                                                                srcset="{{ asset('news/news_images/' . $recentnews->news_image) }}"
                                                                sizes="(max-width: 1200px) 100vw, 1200px"> </a>
                                                    </div>
                                                    <div class="post-item">
                                                        <div class="post-desc">
                                                            <div class="rt-site-mega">
                                                                <span class="author-post">
                                                                    {{ $recentnews->created_at->diffForHumans() }} </span>

                                                                </span>
                                                            </div>
                                                            <a href="{{ route('single.news', $recentnews->news_slug) }}">
                                                                {{ Str::limit($recentnews->news_title, 50) }} </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="recent-widget widget">
                                        <h2 class="widget-title">Category</h2>
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li><a
                                                        href="{{ route('single.category', $category->category_slug) }}">{{ $category->category_name }}</a>
                                                    <span>{{ $category->news_count }}</span>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    {{-- <section id="media_image-1" class="widget widget_media_image"><img width="600"
                                            height="700"
                                            src="https://reactheme.com/news5/news-magazine/wp-content/uploads/sites/26/2025/04/add__image.png"
                                            class="image wp-image-10098 attachment-full size-full" alt=""
                                            decoding="async"
                                            srcset="https://reactheme.com/news5/news-magazine/wp-content/uploads/sites/26/2025/04/add__image.png 600w, https://reactheme.com/news5/news-magazine/wp-content/uploads/sites/26/2025/04/add__image-257x300.png 257w"
                                            sizes="(max-width: 600px) 100vw, 600px"></section> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Newsletter -->
    </div>

    <!-- Wrapper end -->
@endsection
