
@extends('backend.layouts.master')
@section('content')
@php
use App\Model\Publisher;
@endphp
<!-- /.row -->

<!--site header ends -->    
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class=""> <span class="btn btn-white-translucent">
                                <i class="icon-placeholder mdi mdi-book-open "></i></span> Books
                        </h4>
                        <div class="form-dark">
                            <div class="input-group input-group-flush mb-3">
                              <form action="{{route('book.index')}}" method="get">
                                <input placeholder="Search Books" type="search" name="search" 
                                       class="form-control form-control-lg search form-control-prepended">
                              </form>
                              <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="mdi mdi-magnify"></i>
                                    </div>
                              </div>  
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<div class="container pull-up">
            <div class="row">

                <div class="col-md-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                          <a href="{{route('book.create')}}">
                            <button class="btn btn-success" style="float: right;"> <i class="fa fa-plus"></i> Add New Books</button>
                          </a>
                          
                          
                        </div>
         
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(count($books))
                                <table class="table table-hover ">
                                    <thead>
                                      <tr>
                                        <th>Sr.No.</th>
                                          <th>Book Name</th>
                                          <th>Cover Image</th>
                                           <th>Price</th>
                                          <th>Author Name</th>
                                          <!-- <th>Publisher Name</th> -->
                                         <th>Type</th>
                                         <th>Status</th>
                                          <th>Released Date</th>
                                          <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php
                                      $i =1;
                                      @endphp
                                      @foreach($books as $book)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{str_limit(ucwords($book->book_name), 15)}}</td>
                                        @if(file_exists(public_path().'/'.env('BOOK_IMAGE_PATH').$book->book_image) && $book->book_image)
                                        <td><img src="{{ asset(env('BOOK_IMAGE_PATH').$book->book_image)}}" alt="Book Cover" class="image" height="50px" width="60"></td>
                                        @else
                                        <td><img src="{{ asset(env('DEFAULT_IMAGE_PATH'))}}" alt="profile pic" class="image" height="60px"></td>
                                        @endif 
                                        
                                        <td>{{$book->book_price}}</td>
                                        <td>{{str_limit($book->author_name, 15)}}</td>
                                        <td>{{$book->category}}</td>
                                        <td><label class="switch">
                                            <input type="checkbox" name="status" class="update-status"  data-id="{{$book->book_id}}" 
                                                   data-url="{{ route('book.status', $book->book_id) }}" {{($book->status == 'available')? 'checked' : ''}}>
                                            <span class="slider round"></span></label>
                                        </td>
                                        <td>{{date('d M Y', strtotime($book->created_at))}}</td>

                                        <td> 
                                              {!! Form::open(['method'=>'DELETE', 'route'=>['book.delete',
                                                      $book->book_id]]) !!}
                                              <a href="{{ route('book.view',$book->book_id) }}"><button type="button" title="view" class="btn btn-success btn-xs"><span class="mdi mdi-eye"></span></button></a> 
                                                                      
                                               <a href="{{ route('book.edit',$book->book_id) }}"><button type="button" title="edit" class="btn btn-primary btn-xs"><span class="mdi mdi-launch"></span></button></a>

                                               <button  title="Delete" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');"><span class="mdi mdi-delete"></span></button>
                                               {!! Form::close() !!}
                                        </td>
                                        
                                      </tr>
                                      @endforeach
                                    </table>
                                     @else
                                    <div><h2>No Book Found.</h2></div>
                                     @endif
                                  </div>

                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>
                      </div>
                    </section>
                  @endsection