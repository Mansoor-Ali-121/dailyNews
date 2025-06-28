@extends('webtemp')
@section('content')
    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">

        <div class="section py-3 sm:py-6 lg:py-9">
            <div class="container max-w-xl">
                <div class="panel vstack gap-3 sm:gap-6 lg:gap-9">
                    <header class="page-header panel vstack text-center">
                        <h1 class="h3 lg:h1">Category: {{ $categoryname }}</h1>
                        <span class="m-0 opacity-60">Showing {{ $news->count() }} news out of {{ $totalNewsCount }} total
                            News</span>
                    </header>
                    <div class="row g-4 xl:g-8">
                        <div class="col">
                            <div class="panel text-center">
                                <div
                                    class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match gy-4 xl:gy-6 gx-2 sm:gx-4">
                                    @foreach ($news as $item)
                                        <div>
                                            <article class="post type-post panel vstack gap-2">
                                                <div class="post-image panel overflow-hidden">
                                                    <figure
                                                        class="featured-image m-0 ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset ('news/news_images/'.$item->news_image) }}"
                                                            data-src="{{ asset ('news/news_images/'.$item->news_image) }}"
                                                            alt="Tech Innovations Reshaping the Retail Landscape: AI Payments"
                                                            data-uc-img="loading: lazy">
                                                        <a href="{{ route('single.news', $item->news_slug) }}" class="position-cover"
                                                            data-caption="Tech Innovations Reshaping the Retail Landscape: AI Payments"></a>
                                                    </figure>
                                                    <div
                                                        class="post-category hstack gap-narrow position-absolute top-0 start-0 m-1 fs-7 fw-bold h-24px px-1 rounded-1 shadow-xs bg-white text-primary">
                                                        <span class="text-none">{{ $categoryname }}</span>
                                                    </div>
                                                    <div
                                                        class="position-absolute top-0 end-0 w-150px h-150px rounded-top-end bg-gradient-45 from-transparent via-transparent to-black opacity-50">
                                                    </div>
                                                   
                                                </div>
                                                <div class="post-header panel vstack gap-1 lg:gap-2">
                                                    <h3 class="post-title h6 sm:h5 xl:h4 m-0 text-truncate-2 m-0">
                                                        <a class="text-none" href="{{ route('single.news', $item->news_slug) }}">{{$item->news_title}}</a>
                                                    </h3>
                                                    <div>
                                                        <div
                                                            class="post-meta panel hstack justify-center fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                            <div class="meta">
                                                                <div class="hstack gap-2">
                                                                    <div>
                                                                        <div class="post-author hstack gap-1">
                                                                            <a href="page-author.html"
                                                                                data-uc-tooltip="{{$item->author->name}}"><img
                                                                                    src="{{ asset('images/users/'.$item->author->user_image) }}"
                                                                                    alt="Jason Blake"
                                                                                    class="w-24px h-24px rounded-circle"></a>
                                                                            <span>{{$item->author->name}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <div class="post-date hstack gap-narrow">
                                                                            <span>{{$item->created_at->diffForHumans()}}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <a href="#post_comment"
                                                                            class="post-comments text-none hstack gap-narrow">
                                                                            <i class="icon-narrow unicon-chat"></i>
                                                                            <span>100</span>
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
                                    class="nav-pagination pt-3 mt-6 lg:mt-9 border-top border-gray-100 dark:border-gray-800">
                                    <ul class="nav-x uc-pagination hstack gap-1 justify-center ft-secondary"
                                        data-uc-margin="">
                                        <li>
                                            <a href="#"><span class="icon icon-1 unicon-chevron-left"></span></a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#" class="uc-active">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="uc-disabled"><span>…</span></li>
                                        <li><a href="#">8</a></li>
                                        <li><a href="#">9</a></li>
                                        <li>
                                            <a href="#"><span class="icon icon-1 unicon-chevron-right"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->
    </div>

    <!-- Wrapper end -->
    >
@endsection
