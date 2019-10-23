@extends('layouts.app')

@section('content')
	
		@can('isAdmin')
	    	<h1>User Transactions</h1>
	    	<hr>
	    
	    @else
	   		<h1>My Orders</h1>
		@endcan

		{{-- In the transactions index view, generate a table that will show all transactions pending approval, another table for completed transactions, and another table for ongoing transactions (assets have been lent out to users) --}}
		@can('isAdmin')
			{{-- <div class="row">
				<div class="col-4">
					<a href="#pendingCollapse" class="btn btn-primary" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Pending</a>
				</div>
				<div class="col-4">
					<a href="#onGoingCollapse" class="btn btn-primary" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Ongoing</a>
				</div>
				<div class="col-4">
					<a href="#historyCollapse" class="btn btn-primary" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Borrowing History</a>
				</div>

				
				
				
			</div> --}}
			
			{{-- <div class="collapse" id="pendingCollapse">
				<div class="card card-body"> --}}
					<h3>Pending</h3>
					<table class="table">

					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Id Number</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Reference No. </th>
					      <th scope="col">Borrow Date</th>
					      <th scope="col">Action:</th>
					    </tr>
					  </thead>

					  <tbody>
					  	@foreach($transactions as $transaction)
			  				@if($transaction->status_id === 1)

						    <tr>
						      <th>{{$transaction->user_id}}</th>
						      <td >{{$transaction->user->name}}</td>
						      <td>{{$transaction->user->email}}</td>
						      <td>{{$transaction->refNo}}</td>
						      <td>{{$transaction->borrowDate}}</td>

						      <td>
						      	
						      		<form action="/transactions/{{$transaction->id}}" method="POST">
							  		@csrf
							  		@method('PUT')
							  			<input type="text" name="status" id="status" value="3" hidden>
						      			<button type="submit" class="btn btn-danger">Reject</button>
						      		</form>


						      		<form action="/transactions/{{$transaction->id}}" method="POST">
							  		@csrf
							  		@method('PUT')
							  			<input type="text" name="status" id="status" value="2" hidden>
						      			<button type="submit" class="btn btn-success">Approve</button>
					  				</form>

						      </td>
						    </tr>
						    @endif
						@endforeach
						</tbody>
					</table>
				{{-- </div>
			</div> --}}
			

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

       {{--  <div class="collapse" id="onGoingCollapse">
			<div class="card card-body"> --}}
                <h3>Ongoing</h3>
			    <table class="table">

				  	<thead class="thead-dark">
					    <tr>
					      <th scope="col">Id Number</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Reference No. </th>
					      <th scope="col">Borrow Date</th>
					      <th scope="col">Action:</th>
					    </tr>
				 	</thead>

				  	<tbody>
						@foreach($transactions as $transaction)
							@if($transaction->status_id === 2)
							    <tr>
							      <th>{{$transaction->user_id}}</th>
							      <td >{{$transaction->user->name}}</td>
							      <td>{{$transaction->user->email}}</td>
							      <td>{{$transaction->refNo}}</td>
							      <td>{{$transaction->borrowDate}}</td>

							      <td>
						  				<form action="/transactions/{{$transaction->id}}" method="POST">
								  		@csrf
								  		@method('PUT')
								  			<input type="text" name="status" id="status" value="4" hidden>
							      			<button type="submit" class="btn btn-warning">Clear</button>
						  				</form>
							      </td>
							    </tr>

							@endif
						@endforeach


					</tbody>
				</table>
		{{-- 	</div>
		</div> --}}

		{{-- <div class="collapse" id="historyCollapse">
			<div class="card card-body"> --}}
                <h3>Transaction History</h3>
			    <table class="table">

				  	<thead class="thead-dark">
					    <tr>
					      <th scope="col">Id Number</th>
					      <th scope="col">Name</th>
					      <th scope="col">Item Requested:</th>
					      <th scope="col">Reference No. </th>
					      <th scope="col">Borrow Date</th>
					      <th scope="col">Action:</th>
					    </tr>
				 	</thead>

				  	<tbody>
						@foreach($transactions as $transaction)
							
							    <tr>
							      <th>{{$transaction->user_id}}</th>
							      <td >{{$transaction->user->name}}</td>
							      <td>{{$transaction->category->name}}</td>
							      <td>{{$transaction->refNo}}</td>
							      <td>{{$transaction->borrowDate}}</td>

							      <td>
						  				{{$transaction->status->name}}
							      </td>
							    </tr>

							
						@endforeach


					</tbody>
				</table>
			{{-- </div>
		</div> --}}
				
	@endcan

	<script type="text/javascript" src="{{ asset('js/modalOrder.js') }}"></script>
@endsection