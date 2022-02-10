@extends('backend.layouts.master')
@section('content')
@php
use App\Model\Book;
use App\Model\Rating;
@endphp

<!--site header ends -->    
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class=""> <span class="btn btn-white-translucent">
                                <i class="mdi mdi-launch "></i></span> Book Details
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-lg-12">

                    <!--widget card begin-->
                    <form role="form" action="{{ route('book.update',$book->book_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="card m-b-30">
                        <div class="card-header">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Book Name</label>
                                    <input type="text" name="book_name" class="form-control" value="{{$book->book_name}}" placeholder="Book Name">
                                    <div class="text-danger">{{ $errors->first('book_name') }}</div>
                                </div>
                                 <div class="form-group col-md-6">
                                    <label>Book Category</label>
                                    <input type="text" name="category" value="{{$book->category}}" class="form-control" placeholder="Category">
                                    <div class="text-danger">{{ $errors->first('category') }}</div>
                                  </div>
                                <div class="form-group col-md-6">
                                    <label>Author Name</label>
                                    <input type="text" name="author_name" class="form-control" value="{{$book->author_name}}">
                                    <div class="text-danger">{{ $errors->first('author_name') }}</div>
                                </div>
                              
                               <!-- <div class="form-group col-md-6">
                                    <label>Rating</label>
                                    <input type="text" name="rating" class="form-control" value="{{Rating::where('book_id',$book->book_id)->value('rating')}}" placeholder="rate book">
                                    <div class="text-danger">{{ $errors->first('rating') }}</div>
                                </div> -->
                         <div class="form-group col-md-6">
                                    <label>Price</label>
                                    <input type="text" name="book_price" class="form-control" value="{{$book->book_price}}" placeholder="book cost">
                                    <div class="text-danger">{{ $errors->first('book_price') }}</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Type</label>
                                    <input type="text" name="type" class="form-control" value="{{$book->type}}" placeholder="Book type">
                                    <div class="text-danger">{{ $errors->first('type') }}</div>
                                </div>
                        <div class="form-group col-md-6">
                                    <label>Number of Pages</label>
                                    <input type="text" name="pages" class="form-control" value="{{$book->pages}}">
                                    <div class="text-danger">{{ $errors->first('pages') }}</div>
                                </div>
                                              
                                 <div class="form-group col-md-6">
                                    <label>Books Available</label>
                                    <input type="text" name="book_available" class="form-control" value="{{$book->book_available}}">
                                    <div class="text-danger">{{ $errors->first('book_available') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status </label>
                                        <select name="status" class="form-control" value="{{$book->status}}"{{'status' == $book->status ? $book->status : ''}}>
                                            <option value="">Choose One</option>
                                            <option value="available">Available</option>
                                            <option value="soldout">Soldout</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div>File</div>
                                      <div class="upload-btn-wrapper">
                                        <button class="upload-btn">Upload a file</button>
                                        <input type="file" name="file" value="{{$book->file}}" />
                                      </div>
                                    <div class="text-danger">{{ $errors->first('file') }}</div>
                                </div>

                                <div class="form-group col-md-6">
                                      <div>Image</div>
                                      <div class="upload-btn-wrapper">
                                        <button class="upload-btn">Upload a file</button>
                                        <input type="file" name="book_image" value="{{$book->book_image}}" />
                                      </div>
                                      <div class="text-danger">{{ $errors->first('book_image') }}</div>
                                  </div>
                        
                                <div class="form-group col-md-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" value="">{{$book->description}}</textarea>
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                </div>
                                          
                                     
                                                         
                            </div>
                          </div>
                      </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('book.index')}}" class="button btn btn-danger">Back</a>
                        </div>
                        </form>
                        
                      </div>
                    </div>
                  </div>
@endsection