
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <br><br>
               <div>
    <form action="{{ url('search') }}" method="GET">
        <input  type="text" name="query" placeholder="Search for something">
        <input type="submit" value="Search">
    </form>
</div>   
</div>

<div class="chat">
   <a href="{{ route('chat') }}" class="btn btn-primary">
      <p>Message to admin</p>
   </a>
</div>

            <div class="row">
              @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detail',$products->id)}}" class="option1">
                           Product detail
                           </a>
                           <form action="{{url('add_cart' , $products->id)}}" method="POST">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width:100px">
                                 </div>
                                 <div class="col-md-4">
                                 <input type="submit" value="Add to cart">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                        @if($products->discount_price != null) 
                        <h6 style="color:red;">
                        <p style="color:blue">discount</p>
                           ${{$products->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through ; color:red;">
                           <p style="color:blue">Price</p>
                           ${{$products->price}}
                        </h6>
                        @else
                        <h6 style="color:red;">
                           <p style="color:blue">price</p>
                           ${{$products->price}}
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
              @endforeach
              <span style="padding-top:20px;">
              {!!$product->appends(Request::all())->links('pagination::bootstrap-5')!!}
              </span>
         </div>
      </section> 
       