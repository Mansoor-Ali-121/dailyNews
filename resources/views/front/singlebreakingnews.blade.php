@extends('webtemp')
@section('content')
    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">

        <article class="post type-post single-post py-4 lg:py-6 xl:py-9">
            <div class="container max-w-xl">
                <div class="post-header">
                    <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                        <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                            <h1 class="h4 sm:h2 lg:h1 xl:display-6">{{ $breakingnews->title }}</h1>
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
                                    src="{{ asset('breakingnews_images/images/' . $breakingnews->image) }}"
                                    data-src="{{ asset('breakingnews_images/images/' . $breakingnews->image) }}"
                                    alt="The Rise of Gourmet Street Food: Trends and Top Picks" data-uc-img="loading: lazy">
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
                                    {!! $breakingnews->description !!}
                                </div>
                                {{-- Tags --}}
                                <div
                                    class="post-footer panel vstack sm:hstack gap-3 justify-between justifybetween border-top py-4 mt-4 xl:py-9 xl:mt-9">
                                    <ul class="nav-x gap-narrow text-primary">
                                        <li><span
                                                class="text-black dark:text-white me-narrow">{{ __('messages.related_news') }}:</span>
                                        <li><a href="{{ route(app()->getLocale() === 'ur' ? 'urdu.single.news' : 'single.news', $breakingnews->news->news_slug) }}"
                                                class="uc-link gap-0 dark:text-white">{{ $breakingnews->news->news_slug }}</a>
                                        </li>
                                        </li>
                                        {{-- <li><a href="#"
                                                class="uc-link gap-0 dark:text-white">{{ $breakingnews->category->category_name }}</a> --}}
                                        </li>
                                    </ul>
                                    <ul class="post-share-icons nav-x gap-narrow" style="width: 180px">
                                        {{-- <li class="me-1"><span class="text-black dark:text-white">Share:</span></li> --}}
                                        <li>
                                            <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                                href="#"><i class="unicon-logo-facebook icon-1"></i></a>
                                        </li>
                                        {{-- <li>
                                            <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                                href="#"><i class="unicon-logo-x-filled icon-1"></i></a>
                                        </li> --}}
                                        <li>
                                            <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                                href="#"><i class="unicon-email icon-1"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-md btn-outline-gray-100 p-0 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle"
                                                href="#"><i class="unicon-link icon-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- Tags end --}}

                                {{-- Author section --}}
                                @if ($breakingnews->author)
                                    <div
                                        class="post-author panel py-4 px-3 sm:p-3 xl:p-4 bg-gray-25 dark:bg-opacity-10 rounded lg:rounded-2">
                                        <div class="row g-4 items-center">
                                            <div class="col-12 sm:col-5 xl:col-3">
                                                <figure
                                                    class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('images/users/' . $breakingnews->author->user_image) }}"
                                                        data-src="{{ asset('images/users/' . $breakingnews->author->user_image) }}"
                                                        alt="Amir Nisi" data-uc-img="loading: lazy">
                                                </figure>
                                            </div>
                                            <div class="col">
                                                <div class="panel vstack items-start gap-2 md:gap-3">
                                                    <h4 class="h5 lg:h4 m-0">{{ $breakingnews->author->name }}</h4>
                                                    <p class="fs-6 lg:fs-5">{{ $breakingnews->author->user_description }}
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- Author section end --}}
                                {{-- Previous and next breaking news --}}
                                <div
                                    class="post-navigation panel vstack sm:hstack gap-2 mt-8 xl:mt-9
    @if ($previousPost && $nextPost) justify-between
    @elseif ($previousPost)
        justify-start
    @elseif ($nextPost)
        justify-end @endif
">

                                    {{-- Previous Breaking News --}}
                                    @if ($previousPost)
                                        <div class="new-post panel hstack {{ $nextPost ? 'w-100 sm:w-1/2' : 'w-full' }}">
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <figure
                                                    class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('breakingnews_images/images/' . $previousPost->image) }}"
                                                        alt="{{ $previousPost->title }}" loading="lazy">
                                                    <a href="{{ route(app()->getLocale() === 'ur' ? 'urdu.single.breakingnews' : 'single.breakingnews', $previousPost->breakingnews_slug) }}"
                                                        class="position-cover"></a>
                                                </figure>
                                            </div>
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3">
                                                <span class="fs-7 opacity-60">
                                                    @if (app()->getLocale() === 'ur')
                                                        {{ __('messages.prev_article') }} <i
                                                            class="unicon-arrow-right"></i>
                                                    @else
                                                        <i class="unicon-arrow-left"></i> {{ __('messages.prev_article') }}
                                                    @endif
                                                </span>
                                                <h6 class="h6 lg:h5 m-0 text-truncate-2">
                                                    <a
                                                        href="{{ route(app()->getLocale() === 'ur' ? 'urdu.single.breakingnews' : 'single.breakingnews', $previousPost->breakingnews_slug) }}">
                                                        {{ Str::limit($previousPost->title, 50) }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Next Breaking News --}}
                                    @if ($nextPost)
                                        <div
                                            class="new-post panel hstack {{ $previousPost ? 'w-100 sm:w-1/2' : 'w-full' }}">
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3 text-end">
                                                <span class="fs-7 opacity-60">
                                                    @if (app()->getLocale() === 'ur')
                                                        <i class="unicon-arrow-left"></i> {{ __('messages.next_article') }}
                                                    @else
                                                        {{ __('messages.next_article') }} <i
                                                            class="unicon-arrow-right"></i>
                                                    @endif
                                                </span>
                                                <h6 class="h6 lg:h5 m-0 text-truncate-2">
                                                    <a
                                                        href="{{ route(app()->getLocale() === 'ur' ? 'urdu.single.breakingnews' : 'single.breakingnews', $nextPost->breakingnews_slug) }}">
                                                        {{ Str::limit($nextPost->title, 50) }}
                                                    </a>
                                                </h6>
                                            </div>
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <figure
                                                    class="featured-image m-0 ratio ratio-1x1 rounded uc-transition-toggle overflow-hidden bg-gray-25 dark:bg-gray-800">
                                                    <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                        src="{{ asset('breakingnews_images/images/' . $nextPost->image) }}"
                                                        alt="{{ $nextPost->title }}" loading="lazy">
                                                    <a href="{{ route(app()->getLocale() === 'ur' ? 'urdu.single.breakingnews' : 'single.breakingnews', $nextPost->breakingnews_slug) }}"
                                                        class="position-cover"></a>
                                                </figure>
                                            </div>
                                        </div>
                                    @endif

                                </div>


                                {{-- Comment section  --}}
                                {{-- <div id="blog-comment" class="panel border-top pt-2 mt-8 xl:mt-9">
                                    <h4 class="h5 xl:h4 mb-5 xl:mb-6">Comments (5)</h4>

                                    <div class="spacer-half"></div>

                                    <ol>
                                        <li>
                                            <div class="avatar">
                                                <img src="../assets/images/avatars/01.png" alt="">
                                            </div>
                                            <div class="comment-info">
                                                <span class="c_name">Merrill Rayos</span>
                                                <span class="c_date id-color">2 days ago</span>
                                                <span class="c_reply"><a href="#">Reply</a></span>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem
                                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                                illo
                                                inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.</div>
                                            <ol>
                                                <li>
                                                    <div class="avatar">
                                                        <img src="../assets/images/avatars/02.png" alt="">
                                                    </div>
                                                    <div class="comment-info">
                                                        <span class="c_name">Jackqueline Sprang</span>
                                                        <span class="c_date id-color">2 days ago</span>
                                                        <span class="c_reply"><a href="#">Reply</a></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="comment">Sed ut perspiciatis unde omnis iste natus error
                                                        sit
                                                        voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                                        eaque ipsa
                                                        quae ab illo inventore veritatis et quasi architecto beatae
                                                        vitae dicta sunt
                                                        explicabo.</div>
                                                </li>
                                            </ol>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="../assets/images/avatars/03.png" alt="">
                                            </div>
                                            <div class="comment-info">
                                                <span class="c_name">Sanford Crowley</span>
                                                <span class="c_date id-color">2 days ago</span>
                                                <span class="c_reply"><a href="#">Reply</a></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem
                                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                                illo
                                                inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.</div>
                                            <ol>
                                                <li>
                                                    <div class="avatar">
                                                        <img src="../assets/images/avatars/04.png" alt="">
                                                    </div>
                                                    <div class="comment-info">
                                                        <span class="c_name">Lyndon Pocekay</span>
                                                        <span class="c_date id-color">2 days ago</span>
                                                        <span class="c_reply"><a href="#">Reply</a></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="comment">Sed ut perspiciatis unde omnis iste natus error
                                                        sit
                                                        voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                                        eaque ipsa
                                                        quae ab illo inventore veritatis et quasi architecto beatae
                                                        vitae dicta sunt
                                                        explicabo.</div>
                                                </li>
                                            </ol>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="../assets/images/avatars/05.png" alt="">
                                            </div>
                                            <div class="comment-info">
                                                <span class="c_name">Aleen Crigger</span>
                                                <span class="c_date id-color">2 days ago</span>
                                                <span class="c_reply"><a href="#">Reply</a></span>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem
                                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                                illo
                                                inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.</div>
                                        </li>
                                    </ol>

                                    <div class="spacer-single"></div>

                                    <div id="comment-form-wrapper" class="panel pt-2 mt-8 xl:mt-9">
                                        <h4 class="h5 xl:h4 mb-5 xl:mb-6">Leave a Comment</h4>
                                        <div class="comment_form_holder">
                                            <form class="vstack gap-2">
                                                <input
                                                    class="form-control form-control-sm h-40px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                                    type="text" placeholder="First name" required>
                                                <input
                                                    class="form-control form-control-sm h-40px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                                    type="text" placeholder="Last name" required>
                                                <input
                                                    class="form-control form-control-sm h-40px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                                    type="email" placeholder="Your email" required>
                                                <textarea
                                                    class="form-control h-250px w-full fs-6 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                                    type="text" placeholder="Your comment" required></textarea>
                                                <button class="btn btn-primary btn-sm mt-1" type="submit">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- Comment section end --}}
                            </div>
                        </div>
                        {{-- REcent breaking news  --}}
                        <div class="lg:col-4">
                            <div class="sidebar-wrap panel vstack gap-2" data-uc-sticky="end: true;">
                                <div class="right-sidebar">
                                    <div class="recent-widget widget">
                                        <h2 class="widget-title">{{__('messages.recent_breaking_news')}}</h2>
                                        <div class="recent-post-widget clearfix">
                                            @foreach ($relatedNews as $item)
                                                <div class="show-featured clearfix">
                                                    <div class="post-img">
                                                        <a
                                                            href="{{ route('single.breakingnews', $item->breakingnews_slug) }}">
                                                            <img width="1200" height="700"
                                                                src="{{ asset('breakingnews_images/images/' . $item->image) }}"
                                                                class="attachment-full size-full wp-post-image"
                                                                alt="" decoding="async"
                                                                srcset="{{ asset('breakingnews_images/images/' . $item->image) }}"
                                                                sizes="(max-width: 1200px) 100vw, 1200px"> </a>
                                                    </div>
                                                    <div class="post-item">
                                                        <div class="post-desc">
                                                            <div class="rt-site-mega">
                                                                <span class="author-post">
                                                                    {{ $item->created_at->diffForHumans() }} </span>

                                                                </span>
                                                            </div>
                                                            <a
                                                                href="{{ route('single.breakingnews', $item->breakingnews_slug) }}">
                                                                {{ Str::Limit($item->title, 50) }} </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
