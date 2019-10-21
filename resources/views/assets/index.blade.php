

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

                        <form method="post" action="/assets/{{$asset->id}}">

                            @csrf

                            @method('DELETE')

                            <div class="btn-group btn-block">

                                <a class="btn btn-primary" href="/assets/{{$asset->id}}/edit">Edit</a>

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
                        
                    </div>

                    <div class="card-footer">
                        <form action="/transactions" method="POST">
                            @csrf
                            <div class="form-group">
                                
                                <input type="hidden" name="productId" value="{{$asset->id}}">
                                
                            </div>

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Get this!</button>
                            {{-- TRANSACTION MODAL --}}
                            <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    {{-- modal header --}}
                                  <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    {{-- modal body --}}
                                  <div class="modal-body">
                                    <p>Modal body text goes here.</p>

                                        {{-- DATE --}}
                                    <label for="beginDate">Borrow Date:</label>
                                    <input type="date" name="beginDate" id="beginDate">
                                    <label for="beginDate">Return Date:</label>
                                    <input type="date" name="beginDate" id="endDate">

                                        {{--  TIME --}}
                                    <label for="beginDate">Start Time:</label>
                                    <input type="date" name="beginDate" id="beginTime">
                                    <label for="beginDate">Return Time:</label>
                                    <input type="date" name="beginDate" id="endTime">

                                  </div>
                                  {{-- modal footer --}}
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                          </div>
                        </div>
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

