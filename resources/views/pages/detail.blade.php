@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection
@push('addon-style')
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}main.css">
@endpush

@section('content')
<div class="page-content page-details">
  <section
    class="store-breadcrumbs"
    data-aos="fade-down"
    data-aos-delay="100"
  >
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/index.html">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Product Details
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>


  <div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
          @foreach ($product->galleries as $gallery)
          <ul class="image_list">
						<li data-image="{{ Storage::url($gallery->photos) }}"><img src="{{ Storage::url($gallery->photos) }}" alt=""></li>
					</ul>    
          @endforeach
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ Storage::url($gallery->photos) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->name }}</div>
						<div class="product_name">{{ $product->name}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text">{!! $product->description !!}</div>
						<div class="order_info d-flex flex-row">
							<div class="">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul>
								</div>

								<div class="product_price">IDR {{ $product->price}}</div>
                <div class="button_container">
                  @auth
                  <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button
                      type="submit"
                      class="button cart_button"
                    >
                      Add to Cart
                    </button>
                  </form>
              @else
                  <a
                    href="{{ route('login') }}"
                    class="button cart_button"
                  >Sign in to Add
                  </a>
              @endauth
                  <div class="product_fav"><i class="fas fa-heart"></i></div>
                </div>
              </div>
              
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
  <div class="store-details-container" data-aos="fade-up">
    <section class="store-review">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-8 mt-3 mb-3">
            <h5>Customer Review (3)</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-8">
            <ul class="list-unstyled">
              <li class="media">
                <img
                  src="{{ asset('/') }}assets/img/team/profile-picture-1.jpg"
                  alt=""
                  class="mr-3 rounded-circle"
                />
                <div class="media-body">
                  <h5 class="mt-2 mb-1">Hazza Risky</h5>
                  I thought it was not good for living room. I really happy
                  to decided buy this product last week now feels like
                  homey.
                </div>
              </li>
              <li class="media">
                <img
                  src="{{ asset('/') }}assets/img/team/profile-picture-2.jpg"
                  alt=""
                  class="mr-3 rounded-circle"
                />
                <div class="media-body">
                  <h5 class="mt-2 mb-1">Anna Sukkirata</h5>
                  Color is great with the minimalist concept. Even I thought
                  it was made by Cactus industry. I do really satisfied with
                  this.
                </div>
              </li>
              <li class="media">
                <img
                  src="{{ asset('/') }}assets/img/team/profile-picture-3.jpg"
                  alt=""
                  class="mr-3 rounded-circle"
                />
                <div class="media-body">
                  <h5 class="mt-2 mb-1">Dakimu Wangi</h5>
                  When I saw at first, it was really awesome to have with.
                  Just let me know if there is another upcoming product like
                  this.
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

@endsection



@push('addon-script')
<script src="{{ asset('/') }}js/product_custom.js"></script>
@endpush