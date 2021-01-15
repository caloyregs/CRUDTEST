@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12" style="text-align: center">
	<div >
		<h2>Create New Order</h2>
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
            <form name="frmOrder" action="{{ route('orders.store') }}" method="POST">
            <input type="hidden" name="cust_id" id="cust_id" value="{{request()->segment(3)}}" readonly>
            @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product:</strong>
                        <select name="product" id="product" class="form-control validd" required>
                              <option value="">Select Product</option>
                              @foreach($products as $product)
                                  <option value="{{$product->id}}">{{$product->name}}</option>
                              @endforeach
                        </select>
                        <input type="hidden" name="price" id="price" class="form-control validd" value="100">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Qty</strong>
                        <select name="qty" id="qty" class="form-control validd" required>
                            <option value="">Select Qty</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                        </select>
                        {{--<input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">--}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total </strong>
                        <input type="number" name="total" id="total" class="form-control" placeholder="0.00">
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