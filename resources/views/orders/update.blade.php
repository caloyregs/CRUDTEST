@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12" style="text-align: center">
	<div >
		<h2>Update Order</h2>
	</div>
	<br/>
	</div>
</div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p id="msg">{{ $message }}</p>
        </div>
    @endif

    <div>
        <div>
            <form name="frmOrder" action="{{route('orders.update')}}" method="POST">
            <input type="hidden" name="order_id" id="order_id" value="{{request()->segment(3)}}" readonly>
            @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product:</strong>
                        <select name="product2" id="product2" class="form-control validd2" required>
                              <option value="">Select Product</option>
                              @foreach($products as $product)
                                @if ($order->product_id == $product->id)
                                    <option value="{{$product->id}}" selected="selected">{{$product->name}}</option>
                                @else
                                    <option value="{{$product->id}}" >{{$product->name}}</option>
                                @endif
                              @endforeach
                        </select>
                        <input type="hidden" name="price2" id="price2" class="form-control validd2" value="{{$product->price}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Qty</strong>
                        <input type="number" name="qty2" id="qty2" class="form-control validd2" placeholder="" value="{{$order->qty}}" min="1" max="10">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total </strong>
                        <input type="number" name="total2" id="total2" class="form-control" placeholder="0.00" value="{{$order->total}}" readonly>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="btn-save2" name="btnsave2" class="btn btn-primary" disabled>Submit</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-danger">Cancel</a>
                </div>

                </div>
                {{ csrf_field() }}
            </form>

        </div>
    </div>

@endsection