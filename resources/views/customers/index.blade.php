@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-lg-12" style="text-align: center">
	<div >
		<h2>Customers List</h2>
	</div>
	<br/>
	</div>
</div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a href="{{route('orders.index')}}" class="btn btn-info mb-2" id="orders" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i>Order List</a>
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i>New Customer</a>
            </div>
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
    <th>Name</th>
    <th>Email</th>
    <th>Contact No</th>
    <th width="280px">Action</th>
    </tr>

    @foreach ($customers as $customer)
    <tr id="customer_id_{{ $customer->id }}">
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->contact_no }}</td>
        <td>
            <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $customer->id }}" >Show</a>
                <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $customer->id }}">Edit </a>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <a id="delete-customer" data-id="{{ $customer->id }}" class="btn btn-danger delete-user">Delete</a>
            </form>
            <a href="{{ route('orders.create',$customer->id) }}" class="btn btn-warning" id="create-order" data-toggle="modal" data-id="{{ $customer->id }}" >Create Order</a>
        </td>
    </tr>
    @endforeach

</table>
{!! $customers->links() !!}
<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="customerCrudModal"></h4>
        </div>
        <div class="modal-body">
            <form name="custForm" action="{{ route('customers.store') }}" method="POST">
            <input type="hidden" name="cust_id" id="cust_id" >

            @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact No:</strong>
                        <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Contact No" onchange="validate()">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-danger">Cancel</a>
                </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
<!-- Show customer modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="customerCrudModal-show"></h4>
            </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 ">
                        @if(isset($customer->name))
                        <table>
                            <tr><td><strong>Name:</strong></td><td>{{$customer->name}}</td></tr>
                            <tr><td><strong>Email:</strong></td><td>{{$customer->email}}</td></tr>
                            <tr><td><strong>Contact No:</strong></td><td>{{$customer->contact_no}}</td></tr>
                            <tr><td colspan="2" style="text-align: right "><a href="{{ route('customers.index') }}" class="btn btn-danger">OK</a> </td></tr>
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
	if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.contact_no.value !='')
	    document.custForm.btnsave.disabled=false;
	else
		document.custForm.btnsave.disabled=true;
}
</script>

