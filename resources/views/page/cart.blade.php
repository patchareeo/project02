@extends('templete.templete')

@section('title', 'Cart |Heawnea')

@section('content')



<body>
	<section id="cart_items">
		<div class="container">			
			<h2 class="title text-center">สินค้าที่สั่งซื้อ</h2>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">สินค้า</td>
							<td class="description"></td>
							<td class="price">ราคา</td>
							<td class="quantity">จำนวน</td>
							<td class="total">รวม</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">ชุดเดรส ชุดกระโปรง</a></h4>
								{{-- <p>Web ID: 1089772</p> --}}
							</td>
							<td class="cart_price">
								<p>150</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">150</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>
	</section> <!--/#cart_items-->

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

@endsection