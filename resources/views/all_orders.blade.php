@extends('layouts.app')
@section('content')
<!-- Main-body start -->
      <!-- Page-header start -->
      <div class="page-header card">
         <div class="card-block">
           
            <h5 class="m-b-10 text-center">All Orders</h5>
            <p class="text-muted m-b-10 text-center">Orders List</p>
            <ul class="breadcrumb-title b-t-default p-t-10">
               <li class="breadcrumb-item">
                  <a href="index.html"> <i class="fa fa-home"></i> </a>
               </li>
                           </ul>
             
         </div>
      </div>
      <!-- Page-header end -->
      <div class="card">
         <div class="card-header">
            <!--  <h5>Hover table</h5>
               <span>use class <code>table-hover</code> inside table element</span> -->
            <div class="card-header-right">
               <ul class="list-unstyled card-option">
                  <li><i class="fa fa-chevron-left"></i></li>
                  <li><i class="fa fa-window-maximize full-card"></i></li>
                  <li><i class="fa fa-minus minimize-card"></i></li>
                  <li><i class="fa fa-refresh reload-card"></i></li>
                  <li><i class="fa fa-times close-card"></i></li>
               </ul>
            </div>
         </div>
         <div class="card-block table-border-style">
            <div class="table-responsive">
               <table class="table table-hover table-datatable">
                  <thead>
                     <tr class="text-center">
                        <th>#</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Details</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($orders as $order)
                     <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td> 
                           @php
                               $totalPrice = 0;
                           @endphp
                           @foreach ($order->orderDetails as $detail)
                               @php
                                   $totalPrice += $detail->price * $detail->quantity;
                               @endphp
                           @endforeach
                            {{ $totalPrice }}
                        </td>
                        <td>{{ $order->payment_method }}</td>
                        <td>
                           @foreach ($order->orderDetails as $detail)
                               <strong> {{$detail->product->name}} </strong> <br>Quantity: <b>{{ $detail->quantity }}</b>
                               <br>
                           @endforeach
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection
