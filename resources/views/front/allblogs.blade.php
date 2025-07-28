@extends('webtemp')

@section('content')
<div id="wrapper" class="wrap overflow-hidden-x">
    <div class="section py-3 sm:py-6 lg:py-9">
        <div class="container max-w-xl">
            <div class="panel vstack gap-3 sm:gap-6 lg:gap-9">
                <header class="page-header panel vstack text-center">
                    <h1 class="h3 lg:h1">{{ __('messages.all_blogs') }}</h1>
                    <span class="m-0 opacity-60">
                        Showing {{ count($blogs) }} Blogs
                    </span>
                </header>

                <div class="row g-4 xl:g-8">
                    <div class="col">
                        <div class="panel text-center">
                            <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match gy-4 xl:gy-6 gx-2 sm:gx-4">
                                @foreach ($blogs as $blog)
                                    <div>
                                        <article class="post type-post panel vstack gap-2">
                                            <div class="post-image panel overflow-hidden">
                                                <figure class="featured-image m-0 ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('Blogs/blog_images/' . ($blog->blog_image ?? 'default.png')) }}"
                                                        alt="{{ $blog->title }}"
                                                        data-uc-img="loading: lazy">
                                                    <a href="{{ route(app()->getLocale() == 'ur' ? 'urdu.single.blog' : 'single.blog', $blog->blog_slug) }}"
                                                        class="position-cover"></a>
                                                </figure>

                                                <div class="post-category hstack gap-narrow position-absolute top-0 start-0 m-1 fs-7 fw-bold h-24px px-1 rounded-1 shadow-xs bg-white text-primary">
                                                    <span class="text-none">
                                                        {{ $blog->category->category_name ?? 'Blog' }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="post-header panel vstack gap-1 lg:gap-2">
                                                <h3 class="post-title h6 sm:h5 xl:h4 m-0 text-truncate-2">
                                                    <a class="text-none"
                                                        href="{{ route(app()->getLocale() == 'ur' ? 'urdu.single.blog' : 'single.blog', $blog->blog_slug) }}">
                                                        {{ $blog->blog_title }}
                                                    </a>
                                                </h3>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

               {{-- Custom Pagination Links --}}
                                <div class="nav-pagination pt-3 mt-6 lg:mt-9 border-top border-gray-100 dark:border-gray-800">
                                    <ul class="nav-x uc-pagination hstack gap-1 justify-center ft-secondary" data-uc-margin="">
                                        {{-- Previous --}}
                                        @if ($blogs->onFirstPage())
                                            <li class="uc-disabled">
                                                <span><span class="icon icon-1 unicon-chevron-left"></span></span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $blogs->previousPageUrl() }}">
                                                    <span class="icon icon-1 unicon-chevron-left"></span>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Pages --}}
                                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                            @if ($page == $blogs->currentPage())
                                                <li><a href="{{ $url }}" class="uc-active">{{ $page }}</a></li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        {{-- Next --}}
                                        @if ($blogs->hasMorePages())
                                            <li>
                                                <a href="{{ $blogs->nextPageUrl() }}">
                                                    <span class="icon icon-1 unicon-chevron-right"></span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="uc-disabled">
                                                <span><span class="icon icon-1 unicon-chevron-right"></span></span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>

            </div>
        </div>
    </div>
</div>
@endsection
