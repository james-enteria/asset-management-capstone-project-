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
							  			<input type="text" name="catId" id="catId" value="{{$transaction->category_id}}" hidden>
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
					      <th scope="col">Return Date</th>
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
							      @if($transaction->status_id ==4)
							      	<td>{{$transaction->returnDate}}</td>
							      @else
							      	<td></td>
							      @endif

							      <td>
						  				{{$transaction->status->name}}
							      </td>
							    </tr>

							
						@endforeach


					</tbody>
				</table>
			</div>
		</div>

	@endcan
	@cannot('isAdmin')
		<div class="row justify-content-center">
			@foreach($transactions as $transaction)

				@if(Auth::user()->id == $transaction->user_id)
					{{-- <th>{{$transaction->user_id}}</th>
								      <td >{{$transaction->user->name}}</td>
								      <td>{{$transaction->category->name}}</td>
								      <td>{{$transaction->refNo}}</td>
								      <td>{{$transaction->borrowDate}}</td> --}}
					<div class="card col-10">
						<p>Requested for: {{$transaction->category->name}}</p>	
						<p>Borrowed on: {{$transaction->borrowDate}}</p>
						@if($transaction->status_id==4)
							<p>This item was returned at: {{$transaction->returnDate}}</p>
						@else
							<p>RETURN THIS IMMEDIATELY</p>
						@endif	
					</div>
				@endif
			@endforeach
		</div>		
	@endcannot

	<script type="text/javascript" src="{{ asset('js/modalOrder.js') }}"></script>
@endsection