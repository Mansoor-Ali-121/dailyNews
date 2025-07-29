@extends('webtemp')
@section('content')
    <!-- Wrapper start -->
    <div id="wrapper" class="wrap overflow-hidden-x">
        <div class="section py-4 lg:py-6 xl:py-8">
            <div class="container max-w-lg">
                <div class="page-wrap panel vstack gap-4 lg:gap-6 xl:gap-8">
                    <header class="page-header panel vstack justify-center gap-2 lg:gap-4 text-center">
                        <div class="panel">
                            <h1 class="h3 lg:h1 m-0">{{ __('messages.terms_of_use') }}</h1>
                        </div>
                    </header>
                    <div class="page-content panel fs-6 md:fs-5">
                        <p>{!! $terms->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wrapper end -->
@endsection
