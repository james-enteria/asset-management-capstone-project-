@extends('layouts.app')

@section('content')
	
		@can('isAdmin')
	    	<h1>User Transactions</h1>
	    
	    @else
	   		<h1>My Orders</h1>
		@endcan

		{{-- In the transactions index view, generate a table that will show all transactions pending approval, another table for completed transactions, and another table for ongoing transactions (assets have been lent out to users) --}}
		@can('isAdmin')

		<table class="table">

		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Id Number</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Status</th>
		      <th scope="col">Borrow Date</th>
		      <th scope="col">Orders:</th>
		    </tr>
		  </thead>

		  <tbody>
		  	@foreach($transactions as $transaction)
		  		<form action="/transaction" method="POST">
		  		@csrf
			    <tr>
			      <th>{{$transaction->user_id}}</th>
			      <td class="userName">{{$transaction->user->name}}</td>
			      <td>{{$transaction->user->email}}</td>
			      <td>{{$transaction->status->name}}</td>
			      <td>{{$transaction->borrowDate}}</td>

			      <td>
			      	<button type="button" class="btn btn-warning view-request" data-toggle="modal" data-id="{{$transaction->user_id}}" data-name="{{$transaction->user->name}}" data-target="#viewRequest">View Request</button>
			      </td>
		  		</form>
		    @endforeach
		    				<div class="modal" tabindex="-1" role="dialog" id="viewRequest">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    {{-- modal header --}}
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="assetTitle">{{$transaction->user->name}}'s Request</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    
                                  <div class="modal-body">
                                  	
                                  	<p>
                                  		{{$transaction->user_id}}
                                  	</p>
                                  	{{-- insert code here --}}                                    
                                  	<form action="/transaction">
                                  		@csrf
                                  		@method('PUT')
                                  	</form>
                                    
                                  </div>
                                  {{-- modal footer --}}
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Reject dis </button>
                                    <button type="submit" class="btn btn-primary">Aight go ahead</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{-- END OF MODAL --}}

			      
			    </tr>



		  </tbody>
		</table>
		@endcan

		<script type="text/javascript" src="{{ asset('js/modalOrder.js') }}"></script>
@endsection