
@extends('backend.layouts.master')
@section('content')
<!-- /.row -->

<!--site header ends -->    
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class=""> <span class="btn btn-white-translucent">
                                <i class="mdi mdi-heart"></i></span> Interests
                        </h4>


                    </div>
                </div>
            </div>
        </div>
<div class="container pull-up">
            <div class="row">

                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                          {{--<form action="{{route('users.interest', $interests->user_id)}}" method="get">
                            <input name="search" type="text" placeholder="Search.." >                   
                            <button type="submit"><i class="fa fa-search"></i></button>
                          </form>--}}
                          
                        </div>
         
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($interests))
                                <table class="table table-hover ">
                                    <thead>
                                      <tr>
                                        <th>Sr.No.</th>
                                          <th>Interest Title</th>
                                          <th>Image</th>
                                          <th>Created Date</th>
                                          <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                      $i =1;
                                      @endphp
                                      @foreach($interests as $interest)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{ucwords($interest->name)}}</td>
                                        @if(file_exists(public_path().'/'.env('BOOK_IMAGE_PATH').$interest->image) && $interest->image)
                                        <td><img src="{{ asset(env('BOOK_IMAGE_PATH').$interest->image)}}" alt="Book Cover" class="image" height="50px" width="60"></td>
                                        @else
                                        <td><img src="{{ asset(env('DEFAULT_IMAGE_PATH'))}}" alt="profile pic" class="image" height="60px"></td>
                                        @endif 
                                        
                                        <td>{{$interest->created_at}}</td>
                                        <td> 
                                              {!! Form::open(['method'=>'DELETE', 'route'=>['interest.delete',
                                              $interest->interest_id]]) !!}

                                               <button  title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');"><span class="mdi mdi-delete"></span></button>
                                               {!! Form::close() !!}
                                        </td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                     @else
                                    <div><h2>No interest Found.</h2></div>
                                     @endif
                                  </div>

                            <!-- /.box-body -->
                          </div>

                        </div>
                <a href="{{route('users.index')}}" class="button btn btn-danger">Back</a>
                      </div>
                    </section>
                  @endsection