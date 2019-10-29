@extends('layouts.app')

@section('content')
    @if($errors->any())
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>     
            </div>
        </div>
    @endif
    <div class="row">

        <div class="col-lg-8 offset-lg-2">

            <h3>Add New Asset</h3>

            @if (session()->has('status'))

                <div class="alert alert-success" role="alert">
                  {{ session()->get('status') }}
                </div>

            @endif

            <div class="card mb-3">
                
                <div class="card-header" data-toggle="collapse" href="#div-add-category">Add New Category</div>

                <div class="card-body collapse" id="div-add-category">
                    <form method="POST" action="/categories" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$category->description}}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Image:</label>
                        
                        <input type="file" name="image" id="image" class="form-control" value="{{$category->img_path}}" onchange="previewFile()">
                    <div class="card col-4 my-2">
                        
                    <img src="{{asset($category->img_path)}}" height="200" class="my-2">
                    </div>
                    </div>

                    <div id="addCatNotif"></div>

                    <button type="submit" class="btn btn-success" id="btn-add-category">Update category</button>

                    </form>
                </div>

            </div>
            {{-- END OF ADD CATEGORY --}}




           
        </div>

    </div>

    <script src="{{ asset('js/addCat.js') }}"></script>
@endsection