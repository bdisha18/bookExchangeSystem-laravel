
@extends('backend.layouts.master')
@section('content')
@php
use App\Model\Member;
use App\Model\Transaction;
use App\Model\Address;
@endphp



<!--site header ends -->    
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 class=""> <span class="btn btn-white-translucent">
                                <i class="mdi mdi-eye "></i></span>Order Details
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
                        <form role="form">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Order Id :</label>
                                    <p>{{$order->order_id}}</p>
                                </div>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Username :</label>
                                    <p>{{ucwords(Member::where('user_id', $order->user_id)->value('fname'))}} 
                                    {{ucwords(Member::where('user_id', $order->user_id)->value('lname'))}}
                                </p>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Email :</label>
                                    <p>{{Member::where('user_id', $order->user_id)->value('email')}}</p> 
                                </div>
                            </div>


                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Status :</label>
                                    <p>{{$order->status}}</p> 
                                </div>
                            </div>
                                   <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Order Placed :</label>
                                    <p>{{$order->created_at}}</p> 
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Total Amount:</label>
                                    <p>{{Transaction::where('transaction_id',$order->transaction_id)->value('amount')}}</p> 
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Reference Id  :</label>
                                    <p>{{Transaction::where('transaction_id',$order->transaction_id)->value('reference_id')}}</p> 
                                </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Payment Method:</label>
                                    <p>{{Transaction::where('transaction_id',$order->transaction_id)->value('payment_method')}}</p> 
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Address:</label>
                                    <p>{{Address::where('user_id',$order->user_id)->value('address')}}</p> 
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Contact Number :</label>
                          <p>{{Member::where('user_id', $order->user_id)->value('contactno')}}</p> 

                                    </div>
                            </div>
                     <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label">Book Details</label>
                          <p><a href="{{route('orders.detail',$order->order_id)}}">Click here</a> </p>    
                                </div>
                            </div>        
                             
                             </div>
                    </form>
                  </div>
                </div>
        </div>
    <a href="{{route('orders.index')}}" class="button btn btn-danger">Back</a>
    </div>
</div>
</section>
@endsection