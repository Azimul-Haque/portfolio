<!-- sidebar  -->
<!-- widget  -->
<div class="widget">
    <form>
        <i class="fa fa-search close-search search-button"></i>
        <input type="text" placeholder="Search..." class="search-input" name="search">
    </form>
</div>
<!-- end widget  -->
<!-- widget  -->
<div class="widget">
    <h5 class="widget-title font-alt">Similar Contents</h5>
    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
    <div class="widget-body">
        <ul class="widget-posts">
            @foreach($similars as $similar)
            <li class="clearfix">
                <a href="{{ route('index.multimedia.single', $similar->slug) }}">
                    @if(!empty($similar->featured_image))
                    <img src="{{ asset('images/blogs/'.$similar->featured_image) }}" alt=""/>
                    @else
                    <img src="{{ asset('images/multimedia.jpg') }}" alt=""/>
                    @endif
                </a>
                <div class="widget-posts-details">
                    <a href="{{ route('index.multimedia.single', $similar->slug) }}" class="overflowellipsis">{{ $similar->title }}</a>
                    <span class="overflowellipsis">{{ $similar->user->name }} - {{ date('F d', strtotime($similar->created_at)) }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- end widget  -->