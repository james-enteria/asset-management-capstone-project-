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
		      <th scope="col">Orders:</th>
		    </tr>
		  </thead>

		  <tbody>
		  	@foreach($transactions as $transaction)
			    <tr>
			      <th>{{$transaction->user_id}}</th>
			      <td>{{$transaction->user->name}}</td>
			      <td>{{$transaction->user->email}}</td>
			      <td>{{$transaction->status->name}}</td>

			      <td>
			      	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#viewRequest">View Request</button>
			      </td>
		    @endforeach

			      
		    				<div class="modal" tabindex="-1" role="dialog" id="viewRequest">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    {{-- modal header --}}
                                  <div class="modal-header">
                                    <h3 class="modal-title">{{$transaction->user->name}}'s Request</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    
                                  <div class="modal-body">
                                  	

                                  	{{-- insert code here --}}                                    

                                    
                                  </div>
                                  {{-- modal footer --}}
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Reject dis </button>
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
@endsection