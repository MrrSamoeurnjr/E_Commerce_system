<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{url('about_template')}}">About</a></li>
                              <li><a href="{{url('testmonial_template')}}">Testimonial</a></li>
                           </ul>
                        </li>

                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Product <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="{{url('showallproduct')}}">Clothes</a></li>
                              <li><a href="{{url('computer')}}">Computer</a></li>
                              <li><a href="{{url('phone')}}">Phone</a></li>
                              <li><a href="{{url('airpod')}}">AirPod</a></li>
                           </ul>
                        </li>

                        <!-- <li class="nav-item">
                           <a class="nav-link" href="{{url('showallproduct')}}">Products</a>
                        </li> -->
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('blog_template')}}">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact_template')}}">Contact</a>
                        </li>
                        <li class="nav-item">
    <a class="nav-link" href="{{url('show_cart')}}">
        Cart <span class="badge badge-pill badge-primary">{{ session('cart_count', 0) }}</span>
    </a>
</li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">Order</a>
                        </li>
                        @if (Route::has('login'))
                        @auth
                        <x-app-layout>
                        </x-app-layout>
                        @else
                        <li class="nav-item">
                           <a class="btn btn-primary" href="{{ route('login') }}" id="loginright">Login</a>
                        </li>
                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
</header>