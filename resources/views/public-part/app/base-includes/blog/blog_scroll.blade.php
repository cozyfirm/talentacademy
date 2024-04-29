<div class="news">
    <div class="news__container">
        <div class="news__title-container">
            <h2 class="news__title">{{ __('Vijesti') }}</h2>
            <a href="{{ route('public-part.blog.blog') }}" class="news__all-news-button">{{ __('Sve vijesti') }}</a>
        </div>
        <div class="news__list slider_w_2">
            @foreach($blogPosts as $post)
                <div class="news__list-item" uri="{{ route('public-part.blog.preview', ['id' => $post->id]) }}">
                    <img src="{{ asset($post->mainImg->getFile()) }}" alt="{{ __('News image') }}" class="news__list-item-image">
                    <div class="news__list-item-info">
                        <a href="#" class="news__list-item-info-category">{{ $post->getCategory() }}</a>
{{--                        <div class="news__list-item-info-reading-time">{{ $post->getDateTime() }}</div>--}}
                    </div>
                    <h2 class="news__list-item-heading"> {{ $post->title }} </h2>
                    <p class="news__list-item-content"> {{ $post->short_desc }} </p>
                </div>
            @endforeach
        </div>
        <div class="news__navigation">
            <div class="news__navigation-dots">
                <div class="news__navigation-dot"></div>
                <div class="news__navigation-dot"></div>
                <div class="news__navigation-dot"></div>
                <div class="news__navigation-dot"></div>
                <div class="news__navigation-dot"></div>
                <div class="news__navigation-dot"></div>
            </div>
            <div class="news__navigation-buttons">
                <button class="news__navigation-button blog_scroll_previous">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                        <path d="M9.32 5.0516L1 9.77621L9.32 14.06M9.32 9.93879C11.0656 10.0969 10.958 9.96669 12.7084 10.1248C13.2561 10.1759 13.8184 10.2224 14.3415 10.0643C14.9723 9.87369 15.4661 9.40871 15.9306 8.95768C18.6835 6.26079 19.9009 4.31717 22.4582 1.44824C21.5829 5.79116 18.8693 12.8589 18.8693 12.8589H33" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="news__navigation-button blog_scroll_next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="16" viewBox="0 0 34 16" fill="none">
                        <path d="M24.68 5.0516L33 9.77621L24.68 14.06M24.68 9.93879C22.9344 10.0969 23.042 9.96669 21.2916 10.1248C20.7439 10.1759 20.1816 10.2224 19.6585 10.0643C19.0277 9.87369 18.5339 9.40871 18.0694 8.95768C15.3165 6.26079 14.0991 4.31717 11.5418 1.44824C12.4171 5.79116 15.1307 12.8589 15.1307 12.8589H0.999999" stroke="#070600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
