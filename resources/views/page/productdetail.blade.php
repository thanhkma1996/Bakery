@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{  $product_detail -> name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trang-chu')}}">Home</a> / <span>{{  $product_detail -> name }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="source/image/product/{{ $product_detail->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								@if($product_detail-> promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
								<p class="single-item-title">{{ $product_detail->name}}</p>
								<p class="single-item-price">
									@if($product_detail -> promotion_price == 0)
										<span class="flash-sale">{{ $product_detail-> unit_price}}</span>
									@else
										<span class="flash-del">{{ $product_detail-> unit_price}}</span>
										<span class="flash-sale">{{ $product_detail-> promotion_price}}</span>
									@endif
                                 </p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{ $product_detail->description }}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select>
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{ $product_detail->description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
						@foreach($product_related as $pt)
							<div class="col-sm-4">
								<div class="single-item">
									@if($pt-> promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{ route('product-detail',$pt -> id)}}"><img src="source/image/product/{{ $pt->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{ $pt-> name }}</p>
										<p class="single-item-price">
												@if($pt -> promotion_price == 0)
													<span class="flash-sale">{{ $pt-> unit_price}}</span>
												@else
													<span class="flash-del">{{ $pt-> unit_price}}</span>
													<span class="flash-sale">{{ $pt-> promotion_price}}</span>
												@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('product-detail',$pt -> id)}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
                                    </div>
                                @endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Best Sellers</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
							 @foreach($best_seller as $bs)
								<div class="media beta-sales-item">
									@if($bs-> promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<a class="pull-left" href="{{ route('product-detail',$bs -> id)}}"><img src="source/image/product/{{ $bs -> image }}" alt=""></a>
									<div class="media-body">
										{{ $bs -> name }}
										<span class="beta-sales-price">
											@if($pt -> promotion_price == 0)
												<span class="flash-sale">{{ $bs-> unit_price}}</span>
											@else
												<span class="flash-del">{{ $bs-> unit_price}}</span>
												<span class="flash-sale">{{ $bs-> promotion_price}}</span>
											@endif</span>
									</div>
								</div>
							  @endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content');