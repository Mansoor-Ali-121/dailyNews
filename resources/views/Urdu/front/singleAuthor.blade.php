@extends('webtemp')
@section('content')

    <div id="wrapper" class="wrap overflow-hidden-x">

        <div class="section py-3 sm:py-6 lg:py-9">
            <div class="container max-w-xl">
                <div class="panel vstack gap-3 sm:gap-6 lg:gap-9">
                    <header class="page-header panel vstack text-center gap-3">
                        {{-- Premium Profile Card --}}
                        <div class="profile-container">
                            <div class="profile-container-img">
                                <img src="{{ asset('images/users/' . $author->user_image) }}" alt="Profile Image">
                            </div>
                            <div class="profile-container-info">
                                <h2 class="profile-container-name">{{ $author->name }}</h2>
                                <p class="profile-container-bio">{{ $author->user_description }}</p>
                            </div>

                        </div>

                        {{-- News count by this author (kept outside the premium card for separate styling as per your original structure) --}}
                        <span class="m-0 opacity-60">Showing {{ $authorNews->firstItem() }} to {{ $authorNews->lastItem() }}
                            of
                            {{ $authorNews->total() }} total News by this author</span>
                    </header>

                    @if ($authorNews->isEmpty())
                        <div class="panel text-center bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                            <p class="text-xl text-gray-600 dark:text-gray-300">This author has not published any news
                                articles yet.</p>
                            <a href="{{ url('/') }}"
                                class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 shadow-md">
                                Back to Homepage
                            </a>
                        </div>
                    @else
                        <div class="row g-4 xl:g-8">
                            <div class="col">
                                <div class="panel text-center">
                                    <div
                                        class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match gy-4 xl:gy-6 gx-2 sm:gx-4">
                                        @foreach ($authorNews as $newsItem)
                                            <div>
                                                <article class="post type-post panel vstack gap-2">
                                                    <div class="post-image panel overflow-hidden">
                                                        <figure
                                                            class="featured-image m-0 ratio ratio-16x9 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                            <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                                src="{{ asset('news/news_images/' . $newsItem->news_image) }}"
                                                                alt="{{ $newsItem->news_title }}"
                                                                data-uc-img="loading: lazy">
                                                            <a href="{{ route('single.news', $newsItem->news_slug) }}"
                                                                class="position-cover"
                                                                data-caption="{{ $newsItem->news_title }}"></a>
                                                        </figure>
                                                        @if ($newsItem->category)
                                                            <div
                                                                class="post-category hstack gap-narrow position-absolute top-0 start-0 m-1 fs-7 fw-bold h-24px px-1 rounded-1 shadow-xs bg-white text-primary">
                                                                <span
                                                                    class="text-none">{{ $newsItem->category->category_name }}</span>
                                                            </div>
                                                        @endif
                                                        <div
                                                            class="position-absolute top-0 end-0 w-150px h-150px rounded-top-end bg-gradient-45 from-transparent via-transparent to-black opacity-50">
                                                        </div>
                                                    </div>
                                                    <div class="post-header panel vstack gap-1 lg:gap-2">
                                                        <h3 class="post-title h6 sm:h5 xl:h4 m-0 text-truncate-2 m-0">
                                                            <a class="text-none"
                                                                href="{{ route('single.news', $newsItem->news_slug) }}">{{ $newsItem->news_title }}</a>
                                                        </h3>
                                                        <div>
                                                            <div
                                                                class="post-meta panel hstack justify-center fs-7 fw-medium text-gray-900 dark:text-white text-opacity-60 d-none md:d-flex">
                                                                <div class="meta">
                                                                    <div class="hstack gap-2">
                                                                        <div>
                                                                            @if ($newsItem->author)
                                                                                <div class="post-author hstack gap-1">
                                                                                    <a href="{{ route('author.profile', $newsItem->author->user_slug) }}"
                                                                                        data-uc-tooltip="{{ $newsItem->author->name }}">
                                                                                        <img src="{{ asset('images/users/' . $newsItem->author->user_image) }}"
                                                                                            onerror="this.onerror=null;this.src='[https://placehold.co/24x24/cccccc/333333?text=A](https://placehold.co/24x24/cccccc/333333?text=A)';"
                                                                                            alt="{{ $newsItem->author->name ?? 'Author' }}"
                                                                                            class="w-24px h-24px rounded-circle">
                                                                                    </a>
                                                                                    <span>{{ $newsItem->author->name }}</span>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div>
                                                                            <div class="post-date hstack gap-narrow">
                                                                                <span>{{ $newsItem->created_at->diffForHumans() }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <a href="#post_comment"
                                                                                class="post-comments text-none hstack gap-narrow">
                                                                                <i class="icon-narrow unicon-chat"></i>
                                                                                <span>{{ $newsItem->comments_count ?? 0 }}</span>
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

                                    {{-- Custom Pagination Links --}}
                                    @if ($authorNews->hasPages())
                                        <div
                                            class="nav-pagination pt-3 mt-6 lg:mt-9 border-top border-gray-100 dark:border-gray-800">
                                            <ul class="nav-x uc-pagination hstack gap-1 justify-center ft-secondary"
                                                data-uc-margin="">

                                                {{-- Previous Page Link --}}
                                                @if ($authorNews->onFirstPage())
                                                    <li class="uc-disabled"><span><span
                                                                class="icon icon-1 unicon-chevron-left"></span></span></li>
                                                @else
                                                    <li><a href="{{ $authorNews->previousPageUrl() }}"><span
                                                                class="icon icon-1 unicon-chevron-left"></span></a></li>
                                                @endif

                                                {{-- Pagination Elements --}}
                                                @foreach ($authorNews->getUrlRange(1, $authorNews->lastPage()) as $page => $url)
                                                    @if ($page == $authorNews->currentPage())
                                                        <li><a href="{{ $url }}"
                                                                class="uc-active">{{ $page }}</a></li>
                                                    @else
                                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach

                                                {{-- Next Page Link --}}
                                                @if ($authorNews->hasMorePages())
                                                    <li><a href="{{ $authorNews->nextPageUrl() }}"><span
                                                                class="icon icon-1 unicon-chevron-right"></span></a></li>
                                                @else
                                                    <li class="uc-disabled"><span><span
                                                                class="icon icon-1 unicon-chevron-right"></span></span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif {{-- End if ($authorNews->isEmpty()) --}}
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            width: 100%;
            background-color: #bcd4e6;
            padding: 50px;
            border-radius: 15px;
        }

        .profile-container-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            object-fit: cover;
            border: 5px solid #f2faff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

        }

        .profile-container-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-container-name {
            color: #284b63;
        }

        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
                padding: 50px;
            }

            .profile-container-img {
                width: 150px;
                height: 150px;
            }
        }
    </style>
@endsection
