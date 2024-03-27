@extends('dashborad.layouts.dashboard')
@section('title')
    Blog | Edit Categories
@endsection

@section('content')
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Edit Post</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
    
        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card-body"><!-- start of the div -->

                <div class="form-group">
                    <label for="">Post Title</label>
                    <input type="text" class="form-control"  value="{{old('title', $post->title)}}" name="title"
                        placeholder="Enter Category">
                </div>

                <div class="form-group">
                    <label for="">Post Category</label>
                    <select class="form-control form-select" name="category_id"  >
                        <option value="">Primary Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Post Tags</label>

                    <select class="select2" multiple="multiple" data-placeholder="Select a Tag"
                        style="width: 100%;" value="{{$post->tages}}" name="tags[]">

                        @foreach (App\models\Tag::all() as $tag)
                            <option value="{{$tag->id }}">{{ $tag->name }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea class="form-control"  name="content">{{old('content', $post->content)}} </textarea>
                </div>


               

                <div class="form-group">
                    <label for="exampleInputFile">Post Image</label>
                    <input type="file" class="form-control" name="image">
                    @if ($post->image)
                        <img src="{{asset('images/'. $post->image ) }}" alt="image" height="70">
                    @endif
                    {{-- <div class="input-group">
                        <div class="custom-file">
                            
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div> --}}
                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upadate</button>
                </div>
            </div><!-- end of the div -->
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
