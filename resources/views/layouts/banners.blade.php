
    <div class="owl-carousel owl-theme banner-carousel">
        @foreach($banners as $banner)
            <div class="item">
                <a href="{{ $banner->link }}">
                    <img src="{{ asset('banner/image/' . $banner->image) }}" alt="{{ $banner->title }}" height="750">
                </a>
            </div>
        @endforeach
    </div>
