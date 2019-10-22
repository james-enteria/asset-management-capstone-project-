

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
                            <button type="button" class="btn btn-success getThis" data-id="{{$asset->id}}" data-name="{{$asset->name}}" data-toggle="modal" data-target="#exampleModal">Get this!</button>
                    </div>
                </div>
            </div>
            
            @endif

            @endforeach
                       
                                
                                
                                
                                    <form action="/transactions" method="POST">
                                        @csrf
                            <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    {{-- modal header --}}
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="assetTitle"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    {{-- modal body --}}
                                        <div class="modal-body">
                                            
                                            <div class="form-group">
                                                    {{-- DATE --}}


                                                <input type="text" name="assetInput" id="assetInput" value="" hidden>

                                                <label for="beginDate">Borrow Date:</label>
                                                <input type="date" name="borrowDate" id="borrowDate" required>
                                                <label for="beginDate">Return Date:</label>
                                                <input type="date" name="returnDate" id="returnDate" required>

                                                    {{--  TIME --}}
                                                {{-- <label for="beginDate">Start Time:</label>
                                                <input type="time" name="beginTime" id="beginTime">
                                                <label for="beginDate">Return Time:</label>
                                                <input type="time" name="endTime" id="endTime">
     --}}                                   
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nah bro</button>
                                                <button type="submit" class="btn btn-primary">Lemme get it</button>
                                            </div>
                                        </div>
                                  {{-- modal footer --}}
                                </div>
                              </div>
                            </div>
                            {{-- END OF MODAL --}}
                                    </form>

                        

                
            </div>
               
    @endif
 
    @endif
    
</div>

<script type="text/javascript" src=""></script>

@endsection



