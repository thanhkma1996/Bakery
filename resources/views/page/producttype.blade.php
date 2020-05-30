@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{ $sp_theoloai->name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trang-chu')}}">Home</a> / <span>{{ $sp_theoloai->name }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
                            @foreach($loai as $l)
                              <li><a href="{{route('loaisanpham',$l->id) }}">{{$l->name}}</a></li>
                            @endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ $product_type->total() }} được tìm thấy</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($product_type as $pt)
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
                            
                            <div class="row">
                                {{ $product_type -> links() }}
                            </div>
						</div> <!-- .beta-products-list -->

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ $sp_khac->total() }} được tìm thấy</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
                                @foreach($sp_khac as $product_khac)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            @if($product_khac-> promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{ route('product-detail',$product_khac -> id)}}"><img src="source/image/product/{{ $product_khac->image}}" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $product_khac-> name }}</p>
                                                <p class="single-item-price">
                                                        @if($pt -> promotion_price == 0)
                                                            <span class="flash-sale">{{ $product_khac-> unit_price}}</span>
                                                        @else
                                                            <span class="flash-del">{{ $product_khac-> unit_price}}</span>
                                                            <span class="flash-sale">{{ $product_khac-> promotion_price}}</span>
                                                        @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{ route('product-detail',$product_khac -> id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="row">
                                {{ $sp_khac -> links() }} 
                            </div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
                    </div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
    
    @endsection('content')