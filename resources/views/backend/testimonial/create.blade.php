@extends('backend.layouts.master')
@section('content')

<!--site header ends -->    
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class=""> <span class="btn btn-white-translucent">
                                <i class="icon-placeholder mdi mdi-chart-pie  "></i></span> Create Testimonials
                     
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-lg-12">

                    <!--widget card begin-->
                    <form role="form" action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card m-b-30">
                        <div class="card-header">
                              <div class="form-row">
                               <div class="form-group col-md-6">
                                    <label>Author Name</label>
                                    <input type="text" name="author_name" class="form-control" placeholder="Enter Author Name">
                                    <div class="text-danger">{{ $errors->first('author_name') }}</div>
                                  </div>
                                <div class="form-group col-md-6">
                                      <div>Select Image</div>
                                      <div class="upload-btn-wrapper">
                                        <button class="upload-btn">Upload a file</button>
                                        <input type="file" name="image" />
                                      </div>
                                      <div class="text-danger">{{ $errors->first('image') }}</div>
                                </div>
                                    <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" 
                                              placeholder="    Write  description here"></textarea>
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                </div>
                            </div>
                          </div>
                      </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('testimonial.index')}}" class="button
                            btn btn-danger">Back</a>
                        </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
@endsection