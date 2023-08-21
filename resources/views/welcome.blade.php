@extends('layouts.app')
@section('content')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style type="text/css">
   .gradient-custom {
   /* fallback for old browsers */
   background: #6a11cb;
   /* Chrome 10-25, Safari 5.1-6 */
   background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
   /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
   background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
   }
</style>
@endpush
<div class="main-body">
<div class="page-wrapper">
   <div class="page-body">
      <div class="container py-5 h-100">
         <div class="row d-flex justify-content-center align-items-center h-100">
            <form method="POST" action="{{ route('store.Order') }}">
               {{ csrf_field() }}
            <div class="col">
               <div class="card">
                  <div class="card-body p-4">
                     <div class="container py-5">
                        <div class="row d-flex justify-content-center my-4">
                           <div class="col-md-8">
                              <div class="card mb-4">
                                 <div class="card-header py-3">
                                    <h5 class="mb-0">Cart - 2 items</h5>
                                 </div>
                                 <div class="card-body">
                                    <!-- Single item -->

                                    @foreach($products as $product)
                                    <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                    <input type="hidden" name="price[]" value="{{ $product->price }}">
                                    <div class="row">
                                       <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                          <!-- Image -->
                                          <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                             <img src="{{ $product->image }}"
                                                class="w-100" alt="Blue Jeans Jacket" />
                                             <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                             </a>
                                          </div>
                                          <!-- Image -->
                                       </div>
                                       <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                          <!-- Data -->
                                          <p><strong>{{ $product->name }}</strong></p>
                                          <p>Color: {{ $product->color }}</p>
                                          <p>Size: {{ $product->size }}</p>
                                       </div>
                                       <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                          <!-- Quantity -->
                                          <div class="d-flex mb-4" style="max-width: 300px">
                                             <button class="btn btn-primary px-3 me-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                             <i class="fas fa-minus"></i>
                                             </button>
                                             <div class="form-outline">
                                                <input min="0" name="quantity[]" id="pr-{{ $product->id }}" data-price="{{ $product->price }}" value="0" type="number" class="form-control" />Quantity</label>
                                             </div>
                                             <button class="btn btn-sm btn-primary px-3 ms-2"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                             <i class="fas fa-plus"></i>
                                             </button>
                                          </div>
                                          <!-- Quantity -->
                                          <!-- Price -->
                                          <p class="text-start text-md-center">
                                             <strong>Price: ${{ $product->price }}</strong>
                                          </p>
                                          <!-- Price -->
                                       </div>
                                    </div>
                                    @endforeach
                                    <!-- Single item -->
                                    <hr class="my-4" />
                                 </div>
                              </div>
                              
                              <div class="card mb-4 mb-lg-0">
                                 <div class="card-body">
                                    <p><strong>We accept</strong></p>
                                    <img class="me-2" width="45px"
                                       src="https://th.bing.com/th/id/OIP.0dO9UHY1GhKluu4CDxXMowHaD3?pid=ImgDet&w=1200&h=627&rs=1"
                                       alt="Mastercard" />
                                    <img class="me-2" width="45px"
                                       src="https://th.bing.com/th/id/OIP.mSu2j5BkATvkRDlJUDz_PgHaEK?pid=ImgDet&rs=1"
                                       alt="PayPal acceptance mark" />
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="card mb-4">
                                 <div class="card-header py-3">
                                    <h5 class="mb-0">Summary</h5>
                                 </div>
                                 <div class="card-body">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <input type="radio" value="Paypal" name="paymentMethod" id="paypal" {{ $setting->paypal_enabled ? '' : 'disabled' }}>
                                          <label for="paypal">Paypal</label>
                                          <img class="me-2" width="45px"
                                             src="https://th.bing.com/th/id/OIP.mSu2j5BkATvkRDlJUDz_PgHaEK?pid=ImgDet&rs=1"
                                             alt="PayPal acceptance mark" />
                                       </div>
                                       <div class="col-md-6">
                                          <input type="radio" value="Payoneer" name="paymentMethod" id="paoneer" {{ $setting->payoneer_enabled ? '' : 'disabled' }}>
                                          <label for="paoneer">Paoneer</label>
                                          <img class="me-2" width="45px"
                                             src="https://th.bing.com/th/id/OIP.0dO9UHY1GhKluu4CDxXMowHaD3?pid=ImgDet&w=1200&h=627&rs=1"
                                             alt="Mastercard" />
                                       </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                       <li
                                          class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                          Products
                                          <span id="size">0</span>
                                       </li>
                                       <!-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                          Shipping
                                          <span>Gratis</span>
                                          </li> -->
                                       <li
                                          class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                          <div>
                                             <strong>Total amount</strong>
                                             <!--  <strong>
                                                <p class="mb-0">(including VAT)</p>
                                                </strong> -->
                                          </div>
                                          <span><strong id="amount">$0</strong></span>
                                       </li>
                                    </ul>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Checkout
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         </div>
      </div>
   </div>
</div>
      <!-- order-card start -->
      
   
@endsection
@push('scripts')
<script type="text/javascript">
   $(document).ready(function() {
      $('input[name="quantity[]"]').on('keyup change', function() {
         var total_price = 0;
         var pr = 0;
         var product_ids = @json($products->pluck('id')->toArray()); // Fixed variable name
         
         $.each(product_ids, function(index, productId) {
            var id = $('#pr-' + productId);
            var price = id.data('price');
            var quantity = parseInt(id.val()); // Convert input value to an integer
            pr = pr + quantity;
            total_price = total_price + price * quantity;
   
            $('#size').html(pr);
            $('#amount').html(total_price);
         });
   
         console.log(total_price);
      });
   });
</script>
@endpush