@extends('master')
@section('content')
<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
                                    <!-- THE FIRST SLIDE -->
                                @foreach($slide as $sl)
                                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                         <img src="source/image/slide/{{ $sl -> image }}">
                                    </li>
                                @endforeach
								</ul>
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ count($new_product) }} sản phẩm mới</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($new_product as $new_p)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($new_p -> promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                                <div class="single-item-header">
                                                    <a href="{{ route('product-detail',$new_p -> id)}}"><img src="source/image/product/{{ $new_p -> image}}" alt=""></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{{ $new_p -> name}}}</p>
                                                    <p class="single-item-price">
                                                        @if($new_p -> promotion_price == 0)
                                                            <span class="flash-sale">{{ $new_p -> unit_price}}</span>
                                                        @else
                                                            <span class="flash-del">{{ $new_p -> unit_price}}</span>
                                                            <span class="flash-sale">{{ $new_p -> promotion_price}}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                        
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                {{ $new_product -> links() }} </div>
                            </div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ count($top_product)}} sản phẩm khác được tìm thấy</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
                                 @foreach($top_product as $product_old)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($product_old -> promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                                <div class="single-item-header">
                                                    <a href="{{ route('product-detail',$product_old -> id)}}"><img src="source/image/product/{{ $product_old -> image}}" alt=""></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{{ $product_old -> name}}}</p>
                                                    <p class="single-item-price">
                                                        @if($product_old -> promotion_price == 0)
                                                            <span class="flash-sale">{{ $product_old -> unit_price}}</span>
                                                        @else
                                                            <span class="flash-del">{{ $product_old -> unit_price}}</span>
                                                            <span class="flash-sale">{{ $product_old -> promotion_price}}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                        
                                        </div>
                                    </div>
                                 @endforeach
                            </div>
                            <div class="row">
                                {{ $new_product -> links() }} </div>
                            </div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content');