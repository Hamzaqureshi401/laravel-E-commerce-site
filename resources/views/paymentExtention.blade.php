@extends('layouts.app')
@section('content')
<!-- Main-body start -->
      <!-- Page-header start -->
      <div class="page-header card">
         <div class="card-block">
           
            <h5 class="m-b-10 text-center">All Paymen Extension</h5>
            <p class="text-muted m-b-10 text-center">Enable Disable</p>
            <ul class="breadcrumb-title b-t-default p-t-10">
               <li class="breadcrumb-item">
                  <a href="index.html"> <i class="fa fa-home"></i> </a>
               </li>
               <li class="breadcrumb-item"><a href="#!">All Paymen Extension</a>
               </li>
               <!--  <li class="breadcrumb-item"><a href="#!">All Categories</a>
                  </li> -->
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
                        <th>Name</th>
                       
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     
                     <tr>
                        <td>{{ 1 }}</td>
                        <td>{{ "Paypal" }}</td>
                       <td>
                        @if($settings->paypal_enabled == 0)
                           <a href="{{ route('update.payment' , 'Paypal') }}" class="btn btn-sm btn-primary">
                              <i class="fa fa-edit"></i>
                           Enable
                           </a>
                           @else

                           <a href="{{ route('update.payment' , 'Paypal') }}" class="btn btn-sm btn-danger">
                              <i class="fa fa-edit"></i>
                           Disable
                           </a>
                           @endif
                          
                        </td>
                     </tr>

                      <tr>
                        <td>{{ 2 }}</td>
                        <td>{{ "Payoneer" }}</td>
                       <td>
                        @if($settings->payoneer_enabled == 0)
                           <a href="{{ route('update.payment' , 'payoneer') }}" class="btn btn-sm btn-primary">
                              <i class="fa fa-edit"></i>
                           Enable
                           </a>
                           @else

                           <a href="{{ route('update.payment' , 'payoneer') }}" class="btn btn-sm btn-danger">
                              <i class="fa fa-edit"></i>
                           Disable
                           </a>
                          @endif
                        </td>
                     </tr>
                    
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- Hover table card end -->
     
   </div>
</div>

@endsection