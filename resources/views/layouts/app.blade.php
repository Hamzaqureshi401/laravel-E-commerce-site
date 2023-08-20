@include('layouts.common_header')

      <!-- Google font-->
      <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
         --><!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
      <!-- Notification.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/notification/notification.css') }}">
      <!-- Animate.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css/css/animate.css') }}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
      <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet">
      <!-- <link rel="stylesheet" type="text/css" href=" {{ asset('assets/css/1.11.3dataTables.css') }} "> -->
      <link href="{{ asset('assets/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/bootstrap4-toggle.min.css') }}" rel="stylesheet">
      <style type="text/css">
         /* Assuming you have a class to target the 'navbar-logo' element */
.navbar-logo {
   text-align: center;
}

/* Assuming you have a class for the 'E-Commerce Site' paragraph */
.navbar-logo p {
   margin: 0; /* Remove default margin */
}
      </style>

           @stack('styles')
   </head>
   <body>
      <body>
         <div class="theme-loader">
            <div class="loader-track">
               <div class="loader-bar"></div>
            </div>
         </div>
         <!-- Pre-loader end -->
         <div id="pcoded" class="pcoded">
         <div class="pcoded-overlay-box"></div>
         <div class="pcoded-container navbar-wrapper">
         @include('layouts.header')
         @include('layouts.side_nav_bar')
         <div class="pcoded-content">
         <div class="pcoded-inner-content">
         <div class="main-body">
         <div class="page-wrapper">
         <!-- add content -->
         @yield('content')
         <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
         <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
         <!-- jquery slimscroll js -->
         <script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
         <!-- modernizr js -->
         <script type="text/javascript" src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script>
         <!-- am chart -->
         <script src="{{ asset('assets/pages/widget/amchart/amcharts.min.js') }}"></script>
         <script src="{{ asset('assets/pages/widget/amchart/serial.min.js') }}"></script>
         <!-- Chart js -->
         <script type="text/javascript" src="{{ asset('assets/js/chart.js/Chart.js') }}"></script>
         <!-- Todo js -->
         <script type="text/javascript " src="{{ asset('assets/pages/todo/todo.js') }} "></script>
         <!-- notification js -->
         <script type="text/javascript" src="{{ asset('assets/js/bootstrap-growl.min.js') }}"></script>
         <!-- Custom js -->
         <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
         <script type="text/javascript " src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
         <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
         <script src="{{ asset('assets/js/vartical-demo.js') }}"></script>
         <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
         <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
         <script src="{{ asset('assets/datatables/jquery.dataTables.js') }}"></script>
         <script src="{{ asset('assets/datatables/dataTables.bootstrap4.js') }}"></script>
         <script src="{{ asset('assets/js/bootstrap4-toggle.min.js') }}"></script>
         <script type="text/javascript">
            $(document).ready(function() {
             $('.table-datatable').DataTable({
                 lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
             });
              $('.customer-table_length select').val('-1').change();
         });

           
          
            
            
            $('ul li a').on('click', function(){
             $(this).parent().addClass('active').siblings().removeClass('active');
            });
            
            
            function notify(from, align, icon, type, animIn, animOut ,title , msg){
            $.growl({
            icon: icon,
            title: title,
            message: msg,
            url: ''
            },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 5000,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
            });
            };
            
            
            var nFrom = "bottom";
            var nAlign = "right";
            var nIcons = "" ;
            var nAnimIn = "animated rotateInDownRight";
            var nAnimOut = "animated rotateOutUpRight";
            
            @if(session('success'))
            
            var nType = "success";
            var title = "Success ";
            var msg = "{{session('success')}}";
            
            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut ,title , msg)
            
            @elseif(session('error'))
            
            var nType = "danger";
            var title = "Failed ! ";
            var msg = "{{session('error')}}";
            notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut , title , msg)
            @endif
            
            var $window = $(window);
            var nav = $('.fixed-button');
            $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
            nav.addClass('active');
            }
            else {
            nav.removeClass('active');
            }
            });

                     
            
            
         </script>
         @stack('scripts')
   </body>
</html>