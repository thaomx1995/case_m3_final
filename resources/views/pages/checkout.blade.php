<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    @include('includes.web.header')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
				  <li class="active">Đơn hàng</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="shopper-informations">
				<div class="row">
					{{-- <div class="col-sm-3">
						<div class="shopper-info">
							<p>Thông tin người mua hàng</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div> --}}
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Thông tin đơn hàng</p>
							<div class="form-one">
								<form action="{{route('web.checkout.save')}}" method="POST">
                                    @csrf
									<input type="text" name="name" placeholder="Họ và tên">
									<input type="text" name="address" placeholder="Địa chỉ*">
									<input type="text" name="phone" placeholder="Số điện thoại *">
									<input type="text" name="email" placeholder="Email *">
									<input type="text" name="note" placeholder="ghi chú *">
									<input type="text" name="order_total_price" placeholder="Chi tiết đơn hàng *">
							        <button type="submit" class="btn btn-default update">Đặt hàng</button>
								</form>
							</div>
							<div class="form-two">

							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Ghi chú</p>
							<textarea name="message"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>
            <form action="{{route('web.cart.update_cart')}}" method="post">
                @csrf
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Ảnh sản phẩm</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="price">Giá</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Tổng tiền</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div class="cart_submit">
                     <div class="payment-options">
                        <span>
                            <label><input type="checkbox"> Direct Bank Transfer</label>
                        </span>
                        <span>
                            <label><input type="checkbox"> Check Payment</label>
                        </span>
                        <span>
                            <label><input type="checkbox"> Paypal</label>
                        </span>
                    </div>
                </div>
            </form>


		</div>
        {{-- <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div> --}}
	</section> <!--/#cart_items-->




    @include('includes.web.footer')



    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
