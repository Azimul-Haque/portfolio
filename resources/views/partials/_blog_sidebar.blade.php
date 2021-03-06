<!-- sidebar  -->
<!-- widget  -->
<div class="widget">
    {!! Form::open(['route' => 'index.search', 'method' => 'get',]) !!}
        <button class="fa fa-search close-search search-button" type="submit"></button>
        <input type="text" placeholder="Search..." class="search-input" name="search" required="">
    {!! Form::close() !!}
</div>
<!-- end widget  -->
<!-- widget  -->
<div class="widget">
    <h5 class="widget-title font-alt">Popular posts</h5>
    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
    <div class="widget-body">
        <ul class="widget-posts">
            @foreach($populars as $popular)
            <li class="clearfix">
                <a href="{{ route('blog.single', $popular->slug) }}">
                    @if($popular->featured_image != null && file_exists(public_path('images/blogs/' . $popular->featured_image)))
                        <img src="{{ asset('images/blogs/'.$popular->featured_image) }}" alt=""/>
                    @else
                        <img src="{{ asset('images/blogs/default.jpg') }}" alt=""/>
                    @endif
                </a>
                <div class="widget-posts-details">
                    <a href="{{ route('blog.single', $popular->slug) }}" class="overflowellipsis">{{ $popular->title }}</a>
                    <span class="overflowellipsis">{{ $popular->user->name }} - {{ date('F d', strtotime($popular->created_at)) }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- end widget  -->
<!-- widget  -->
<div class="widget">
    <h5 class="widget-title font-alt">Categories</h5>
    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
    <div class="widget-body">
        <ul class="category-list">
            @foreach($categories as $category)
                @php
                    $totalblogscat = 0;
                    foreach ($category->blogs as $blog) {
                        if($blog->status == 1) {
                            $totalblogscat++;
                        }
                    }
                @endphp
                <li><a href="{{ route('blog.categorywise', $category->name) }}">{{ $category->name }} <span>{{ $totalblogscat }}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- end widget  -->
<!-- widget  -->
<div class="widget">
    <h5 class="widget-title font-alt">Archive</h5>
    <div class="thin-separator-line bg-dark-gray no-margin-lr"></div>
    <div class="widget-body">
        <ul class="category-list">
            @foreach($archives as $archive)
            <li>
                <a href="{{ route('blog.monthwise', date('Y-m', strtotime($archive->created_at))) }}">{{ date('F Y', strtotime($archive->created_at)) }}
                    <span>{{ $archive->total }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- end widget  -->
<!-- end sidebar  -->