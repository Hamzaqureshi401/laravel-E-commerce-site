<div class="pcoded-main-container">
<div class="pcoded-wrapper">
<nav class="pcoded-navbar">
<div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
<div class="pcoded-inner-navbar main-menu">
   <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
   <ul class="pcoded-item pcoded-left-item">
      <li class="">
         <a href="/">
         <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
         <span class="pcoded-mtext" data-i18n="nav.dash.main">Home</span>
         <span class="pcoded-mcaret"></span>
         </a>
      </li>
<!-- Category -->
   @if(Auth::user()->role == 'admin')
      <li class="pcoded-hasmenu">
         <a href="javascript:void(0)">
         <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
         <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Payment Extention</span>
         <span class="pcoded-mcaret"></span>
         </a>
         <ul class="pcoded-submenu">
            <li class=" ">
               <a href="/allPayment">
               <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">All Payment Extentions</span>
               <span class="pcoded-mcaret"></span>
               </a>
            </li>
         </ul>
      </li>
   @endif

       <li class="pcoded-hasmenu">
         <a href="javascript:void(0)">
         <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
         <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Orders</span>
         <span class="pcoded-mcaret"></span>
         </a>
         <ul class="pcoded-submenu">
            <li class=" ">
               <a href="/myOrders">
               <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">My Orders</span>
               <span class="pcoded-mcaret"></span>
               </a>
            </li>
         </ul>
      </li>
   </ul>
<!-- Category End -->

<!-- Product -->

        


<!-- Customers -->

 


      <!-- Invoices -->


   
</div>
</nav>