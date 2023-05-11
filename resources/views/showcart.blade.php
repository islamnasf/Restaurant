<!DOCTYPE html>
<html lang="en">
    <base href="/public">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <title>Klassy Restaurant</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{url('/')}}" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                           <!-- <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>-->
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <!--<li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>-->
                            <li class="scroll-to-section" >
                                @auth
                                <a href="{{url('/showcart',Auth::User()->id)}}" class="active btn-light"  style="font-size:20px; padding-botton:20pax">
                                 Cart[{{$count}}]
                                </a>
                                @endauth
                                @guest
                                <a href="#" class=" btn-light" style="font-size:20px; padding-botton:20pax">
                                 <span class="badge">Cart[0]</span>
                                </a>
                                @endguest
                            </li> 
 
                            
                            <li class="top-right links">
                            @if (Route::has('login'))
                    @auth
                    <li>
                        
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </li>
                    @else
                    <li> <a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                        <li> <a href="{{ route('register') }}">Register</a></li>
                        @endif
                        @endauth
                    @endif
                 </li> 
                        
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

<div style="width:60%; margin:200px  auto 30px auto;" id="food">
<table class="table" style="height:300px;" >
  <thead >
    <tr>
    <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>

  <form action="{{url('orderconfirm')}}" method="Post" > 
@csrf
  @php $i=1; @endphp
@foreach($data as $info)
    <tr>
    <td>
        {{$i}}
    </td>
      <td>
        <input type="text" name="foodname[]" value="{{$info->title}}" hidden="">
        {{$info->title}}
    </td>
      <td>
      <input type="text" name="price[]" value="{{$info->price}}" hidden="">

        {{$info->price}}
    </td>
      <td>
      <input type="text" name="description[]" value="{{$info->description}}" hidden="">

        {{$info->description}}
    </td>
      <td>
      <input type="text" name="quantity[]" value="{{$info->quantity}}" hidden="">

        {{$info->quantity}}
    </td>

      
      <td><img src="foodimage/{{$info->image}}" style="width:60%; margin:0; height:70px"></td>
      
    </tr>
    @php $i++; @endphp
@endforeach
</tbody>

</table>
@php $i=1; @endphp
@foreach($data2 as $info)
<span >
        <a href="{{Route('remove',$info->id)}}" class="btn btn-sm btn-danger" style="margin:10px">Remove order {{$i}}</a>  
</span>
@php $i++; @endphp

@endforeach


  

</div>
<!-- order -->

<div align="center">
<button type="submit" class="btn btn-primary" type="button" style="margin:0px auto;"  id="order"> Order Now</button>
</div>
<div id="appear" style="padding:20px; display:none;" >
  <div class="form-group" style="margin:0 30%;">
    <label for="formGroupExampleInput">NAME</label>
    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Your Name" required>
  </div>
  <div class="form-group" style="margin:0 30%;">
    <label for="formGroupExampleInput2">NUMBER</label>
    <input type="text" class="form-control" name="phone"  id="formGroupExampleInput2" placeholder="Your Number" required>
  </div>
  <div class="form-group" style="margin:0 30%;">
    <label for="formGroupExampleInput2">ADDRESS</label>
    <input type="text" class="form-control" name="address"  id="formGroupExampleInput2" placeholder="Your Address" required>
  </div>
  <div align="center">
  <button type="submit" class="btn btn-success"   style="margin:10px auto; padding:10px 80px;"> Order Confirm</button>
  <button type="submit" class="btn btn-danger"  style="margin:30px 10px 30px 60px ; padding:10px 30px;" id="cancel"> Cancel </button>

</div>
</div>    
</form>



<!--end order -->




    <!-- ***** Footer Start ***** -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });


    </script>
    <script >
        $("#order").click(
            function(){
                $("#appear").show();
            }
        );
        $("#cancel").click(
            function(){
                $("#appear").hide();
            }
        );

    </script>
  </body>
</html>