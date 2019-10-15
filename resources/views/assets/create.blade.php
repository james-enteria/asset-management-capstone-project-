@extends('layouts.app')

@section('content')
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
                    
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="txt-category" class="form-control">
                    </div>

                    <button type="button" class="btn btn-success" id="btn-add-category">Add category</button>

                </div>

            </div>

            <form method="post" action="/assets" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="serialNo">Serial Number:</label>
                    <input type="text" name="serialNo" id="serialNo" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Upload image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="txt-categories" class="form-control">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>  

                <button type="submit" class="btn btn-success">Add Asset</button>
                <a class="btn btn-warning" href="/assets">Cancel</a>

            </form>

        </div>

    </div>

    <script src="{{ asset('js/addCat.js') }}"></script>
@endsection