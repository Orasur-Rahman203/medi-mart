@extends('frontend.master')
@section('content')
        <main class="main">
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-menu">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                        </li>
                                
                                        <li class="nav-item">
                                            <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content dashboard-content">
                                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Hello {{auth()->user()->name}} ! </h5>
                                            </div>
                                            <div class="card-body">
                                                <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Your Orders</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Billing Address</th>
                                                                <th>Shipping Address</th>
                                                                <th>Mobile No</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($orders as $order)
                                                            <tr>
                                                                <td>{{$order->id}}</td>
                                                                <td>{{$order->created_at}}</td>
                                                                <td>{{$order->status}}</td>
                                                                <td>Dhaka, Uttara</td>
                                                                <td>{{$order->address}}</td>
                                                                <td>{{$order->mobile_no}}</td>
                                                               
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                               
                                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Account Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" name="enq">
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label> Name <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="phone" value="{{auth()->user()->name}}">
                                                        </div>
                                                     
                                                        <div class="form-group col-md-12">
                                                            <label>Email Address <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="email" type="email" value="{{auth()->user()->email}}">
                                                        </div>
                                                       
                                                        <div class="form-group col-md-12">
                                                            <label>Password <span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="password" type="password" value="{{auth()->user()->password}}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    @endsection