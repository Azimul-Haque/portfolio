@extends('layouts.index')
@section('title')
    {{ Auth::user()->name }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
@endsection

@section('content')
    <section id="features" class="border-bottom no-padding-bottom xs-onepage-section">
        <div class="container">
            <div class="row margin-four">
                <div class="col-md-12 text-center">
                    <h2 class="section-title no-padding">{{ $user->name }}</h2>
                </div>
            </div>
            @if($user->payment_status == 0)
            <div class="row margin-two">
                <div class="col-md-12 text-center">
                    <span>Please Pay tk. {{ $user->amount }} to get the membership.</span><br/>
                    {{-- <button class="btn highlight-button-dark btn-small btn-round margin-two"><i class="fa fa-pencil"></i> Pay Via AAMARPAY</button> --}}
                    <h4>Please make the payment against this Rocket Number: 01********* and send a sms to the same number</h4>
                    <h5>SMS Format: &#60;UserID&#62; &#60;Amount&#62; &#60;your mobile number&#62; </h5>
                </div>
            </div>
            @endif
            <div class="row margin-three no-margin-bottom">
                <div class="col-md-6 col-sm-6 text-center xs-margin-bottom-ten">
                    <center>
                        <img src="{{ asset('images/users/'.$user->image) }}" alt="image of {{ $user->name }}" class="img-responsive shadow" style="width: 250px; height: auto;" /><br/>
                        <button class="btn highlight-button-dark btn-small btn-round margin-two"><i class="fa fa-pencil"></i> Edit Profile</button>
                    </center>
                </div>
                <div class="col-md-6 col-sm-6 sm-margin-bottom-ten">
                    <div class="col-md-12 col-sm-12 no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <td width="30%">Batch</td>
                                <td>: {{ $user->degree }} {{ ordinal($user->batch) }}</td>
                            </tr>
                            <tr>
                                <td>Passing Year</td>
                                <td>: {{ $user->passing_year }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>: {{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>: {{ date('F d, Y', strtotime($user->dob)) }}</td>
                            </tr>
                            <tr>
                                <td>Job(Company)</td>
                                <td>: {{ $user->current_job }}</td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td>: {{ $user->designation }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>: {{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>Payable Amount</td>
                                <td>: {{ $user->amount }}</td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td>: 
                                    @if($user->payment_status == 0)
                                    <span style="color:red;">Not Paid</span>
                                    @else
                                    <span style="color: green;">Paid</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Social</td>
                                <td>: 
                                    @if($user->fb != null)
                                    <a href="{{ $user->fb }}" style="font-size: 25px;" target="_blank"><i class="fa fa-facebook-official" style="color: #4267B0;"></i></a>
                                    @endif

                                    @if($user->twitter != null)
                                    <a href="{{ $user->twitter }}" style="font-size: 25px" target="_blank"><i class="fa fa-twitter-square" style="color: #20A1F0;"></i></a>
                                    @endif

                                    @if($user->gplus != null)
                                    <a href="{{ $user->gplus }}" style="font-size: 25px" target="_blank"><i class="fa fa-google-plus-square" style="color: #DB473B;"></i></a>
                                    @endif

                                    @if($user->linkedin != null)
                                    <a href="{{ $user->linkedin }}" style="font-size: 25px" target="_blank"><i class="fa fa-linkedin-square" style="color: #0874B1;"></i></a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wow fadeIn bg-gray">
        <div class="container">
            @if($user->payment_status == 0)
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="">After the successfull payment, you will get access to your blogger profile to create blogs and stuffs!</h4>
                    </div>
                </div>
            @else
                {{-- blog part --}}
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title no-padding">Blog</h2>
                    </div>
                </div>
                <div class="row margin-three no-margin-bottom">
                    <div class="col-md-12">
                        <div class="row margin-one">
                            <div class="col-md-6">
                                <span style="font-size: 20px;"><b>Your Blogs</b></span>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('blogs.create') }}" style="float: right; padding: 5px; margin-left: 10px; border: 1px solid #000">
                                    <h3><i class="fa fa-plus"></i> Create New Blog</h3>
                                </a>
                                <a href="{{ route('blogger.profile', $user->unique_key) }}" style="float: right; padding: 5px; margin-left: 10px; border: 1px solid #000" target="_blank">
                                    <h3><i class="fa fa-user"></i> Your Blogger Profile</h3>
                                </a>
                            </div>
                        </div>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td><a href="{{ route('blog.single', $blog->slug) }}">{{ $blog->title }}</a></td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>
                                        <button class="btn highlight-button-dark btn-small btn-round margin-two"><i class="fa fa-pencil"></i></button>
                                        <button class="btn highlight-button-dark btn-small btn-round margin-two"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- blog part --}}
            @endif
        </div>
    </section>
@endsection

@section('js')

@endsection