@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12" style="text-align: center">
	<div >
		<h2>Order List</h2>
	</div>
	<br/>
	</div>
</div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a id="customer-list" href="{{route('customers.index')}}" class="btn btn-info">Customers List</a>
            </div>
            {{--<div class="pull-right">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i>Create New Order</a>
            </div>--}}
        </div>
    </div>
    <br/>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p id="msg">{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
    <tr>
    <th>ID</th>
    <th>Customer</th>
    <th>Product</th>
    <th>Qty</th>
    <th>Total</th>
    <th width="280px">Action</th>
    </tr>

    @foreach ($orders as $order)
    <tr id="order_id_{{ $order->id }}">
        <td>{{ $order->id }}</td>
        <td>{{ $order->customer->name }}</td>
        <td>{{ $order->product->name }}</td>
        <td>{{ $order->qty }}</td>
        <td>{{ $order->total }}</td>
        <td>
            <a href="{{ route('orders.edit',$order->id) }}" class="btn btn-success"> Edit Order</a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('orders.destroy', $order->id)}}"><i class="fa fa-trash"></i> Delete </a>
        </td>
    </tr>
    @endforeach

</table>
{{--{!! $orders->links() !!}--}}
<!-- Add and Edit order modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="orderCrudModal"></h4>
        </div>
        <div class="modal-body">

        </div>
    </div>
    </div>
</div>
<!-- Show order modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="orderCrudModal-show"></h4>
            </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">
                        @if(isset($order->name))
                        <table>
                            <tr><td><strong>Customer:</strong></td><td>{{$order->customer->name}}</td></tr>
                            <tr><td><strong>Product:</strong></td><td>{{$order->product->name}}</td></tr>
                            <tr><td><strong>Total:</strong></td><td>{{$order->total}}</td></tr>
                            <tr><td colspan="2" style="text-align: right "><a href="{{ route('orders.index') }}" class="btn btn-danger">OK</a> </td></tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>

error=false;

function validate()
{
	if(document.frmOrder.name.value !='' && document.frmOrder.email.value !='' && document.frmOrder.contact_no.value !='')
	    document.frmOrder.btnsave.disabled=false;
	else
		document.frmOrder.btnsave.disabled=true;
}
</script>

