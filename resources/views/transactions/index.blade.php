@extends('layouts.app')

@section('content')
	
		@if(Auth::user()->role_id ===1)
	    	<h1>User Transactions</h1>
	    @elseif(Auth::user()->role_id ===2)
	   		<h1>My Orders</h1>
	    @else

	@endif
@endsection