

@extends('layouts.app')

@section('content')

    <h3>
        Assets List
        @if(Auth::user() !==null)
             @if(Auth::user()->role_id ===1)

                <a href="/assets/create" class="btn btn-sm btn-success">+</a>
            @endif
        @endif

    </h3>

    @if (session()->has('status'))

        <div class="alert alert-success" role="alert">

            {{ session()->get('status') }}

        </div>

    @endif

    <hr>

    <div class="row">
        {{-- if a user is logged in --}}
        @if(Auth::user() !==null)
        {{-- if a user is an admin --}}
        @if(Auth::user()->role_id ===1)
        {{-- product admin dashboard --}}
        @foreach($assets as $asset)

            <div class="col-3">

                

                <div class="card">

                    

                    <img src="{{asset($asset->img_path)}}" class="card-img-top border" style="height: 150px; object-fit: cover;">

                    <div class="card-body">

                        

                        <h5>{{$asset->name}}</h5>

                        <p>{{$asset->category->name}}</p>

                        <p>{{$asset->price}}</p>

                        <small>

                            Status:

                            @if($asset->isActive === 1)

                                Active

                            @else

                                Inactive

                            @endif

                        </small>

                        <form method="post" action="/products/{{$asset->id}}">

                            @csrf

                            @method('DELETE')

                            <div class="btn-group btn-block">

                                <a class="btn btn-primary" href="/products/{{$asset->id}}/edit">Edit</a>

                                {{-- toggle button appearance depending on current status of product's isActive property --}}

                                @if($asset->isActive === 1)

                                    <button type="submit" class="btn btn-danger">Deactivate</button>

                                @else

                                    <button type="submit" class="btn btn-warning">Reactivate</button>

                                @endif

                            </div>

                        </form>

                        

                    </div>

                </div>

            </div>

        @endforeach
    @else
    {{-- product admin dashboard --}}
        @foreach($assets as $asset)
            @if($asset->isActive===1)
            <div class="col-3">
                <div class="card">
                    <img src="{{asset($asset->img_path)}}" class="card-img-top border" style="height: 150px; object-fit: cover;">

                    <div class="card-body">
                        <h5>{{$asset->name}}</h5>

                        <p>{{$asset->category->name}}</p>

                        <p>{{$asset->price}}</p>
                        <p>Stocks: {{ $asset->stocks}}<role_id/p>
                    </div>
                    <div class="card-footer">
                        <form action="/cart/" method="POST">
                            @csrf
                            <div class="form-group">
                                
                                <input type="hidden" name="productId" value="{{$asset->id}}">
                                <input type="number" name="quantity">
                            </div>

                            <button type="submit" class="btn btn-success">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
                @endif
                @endforeach
    @endif
 
    @endif
    
</div>

@endsection

