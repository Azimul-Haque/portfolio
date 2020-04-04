@extends('layouts.index')
@section('title')
    Member Application
@endsection

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/DateTimePicker.css') }}">
  {!!Html::style('css/parsley.css')!!}
@stop

@section('content')
    <section class="wow fadeIn bg-gray content-top-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-xs-11 center-col login-box">
                    <h1 style="text-align: center">Registration Form</h1><br/>
                    <form action="{{ route('index.storeapplication') }}" method="post" enctype='multipart/form-data' data-parsley-validate="">
                        {!! csrf_field() !!}
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="name" class="text-uppercase">Name</label>
                                <input type="text" name="name" id="name" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="email" class="text-uppercase">Email</label>
                                <input type="text" name="email" id="email" required="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="phone" class="text-uppercase">Phone</label>
                                <input type="text" name="phone" id="phone" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="dob" class="text-uppercase">Date of Birth</label>
                                <input type="text" name="dob" id="dob" data-field="date" readonly autocomplete="off"  required="" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase">Degree</label>
                                <select name="degree" required="">
                                    <option value="" selected="" disabled="">Select one</option>
                                    <option value="BSSE">BSSE</option>
                                    <option value="MIT">MIT</option>
                                    <option value="PGDIT">PGDIT</option>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="passing_year" class="text-uppercase">Passing Year</label>
                                <select name="passing_year" required="">
                                    <option value="" selected="" disabled="">Select one</option>
                                    @for($yr = date('Y'); $yr >= 1985; $yr--)
                                    <option value="{{ $yr }}">{{ $yr }}</option>
                                    @endfor
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="batch" class="text-uppercase">Batch</label>
                                <select name="batch" required="">
                                    <option value="" selected="" disabled="">Select one</option>
                                    @for($i = 1; $i <= 50; $i++)
                                      <option value="{{ $i }}">{{ ordinal($i) }}</option>
                                    @endfor
                                </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="roll" class="text-uppercase">Roll</label>
                                <input type="text" name="roll" id="roll"  required="">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="current_job" class="text-uppercase">Current Job</label>
                                <input type="text" name="current_job" id="current_job">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="designation" class="text-uppercase">Job Designation</label>
                                <input type="text" name="designation" id="designation">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="text-uppercase">Address</label>
                                <input type="text" id="address" name="address" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="fb" class="text-uppercase">Facebook Url</label>
                                <input type="text" name="fb" id="fb">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="twitter" class="text-uppercase">Twitter Url</label>
                                <input type="text" name="twitter" id="twitter">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="gplus" class="text-uppercase">Google plus Url</label>
                                <input type="text" name="gplus" id="gplus">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="linkedin" class="text-uppercase">Linkedin Url</label>
                                <input type="text" name="linkedin" id="linkedin">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-8">
                                  <div class="form-group no-margin-bottom">
                                      <label><strong>Photo (300 X 300 &amp; 200Kb Max):</strong></label>
                                      <input type="file" id="image" name="image" required="">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <img src="{{ asset('images/user.png')}}" id='img-upload' style="height: 120px; width: auto; padding: 5px;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="password" class="text-uppercase">Password</label>
                                <input type="password" name="password" id="password" required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group no-margin-bottom">
                                <label for="password_confirmation" class="text-uppercase">Retype Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required="">
                            </div>
                          </div>
                        </div>
                        <button class="btn highlight-button-dark btn-bg btn-round margin-five no-margin-right" type="submit">Next</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    {{-- datebox --}}
    <div id="dtBox"></div>
    {{-- datebox --}}
@endsection

@section('js')
  <script type="text/javascript" src="{{ asset('js/DateTimePicker.min.js') }}"></script>
  {!!Html::script('js/parsley.min.js')!!}
    <script type="text/javascript">
        $(document).ready(function() {
            $("#dtBox").DateTimePicker({
                mode:"date",
                dateFormat: "dd-MM-yyyy",
                titleContentDate: 'Select Date of Birth'
            }); 
        });
    </script>
    <script type="text/javascript">
    var _URL = window.URL || window.webkitURL;
    $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
      });

      $('.btn-file :file').on('fileselect', function(event, label) {
          var input = $(this).parents('.input-group').find(':text'),
              log = label;
          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }
      });
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#img-upload').attr('src', e.target.result);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#image").change(function(){
        readURL(this);
        var file, img;

        if ((file = this.files[0])) {
          img = new Image();
          img.onload = function() {
            var imagewidth = this.width;
            var imageheight = this.height;
            filesize = parseInt((file.size / 1024));
            if(filesize > 300) {
              $("#image").val('');
              toastr.warning('Filesize: '+filesize+' KB. Please upload within 300KB', 'WARNING').css('width', '400px;');
              setTimeout(function() {
                $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
              }, 1000);
            }
            console.log(imagewidth/imageheight);
            if(((imagewidth/imageheight) < 0.9375) || ((imagewidth/imageheight) > 1.07142)) {
              $("#image").val('');
              toastr.warning('Raio of the photograph should be 1:1', 'WARNING').css('width', '400px;');
              setTimeout(function() {
                $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
              }, 1000);
            }
          };
          img.onerror = function() {
            $("#image").val('');
            toastr.warning('Select a photograph please', 'WARNING').css('width', '400px;');
            setTimeout(function() {
              $("#img-upload").attr('src', '{{ asset('images/user.png') }}');
            }, 1000);
          };
          img.src = _URL.createObjectURL(file);
        }
      });
    });
  </script>
@endsection