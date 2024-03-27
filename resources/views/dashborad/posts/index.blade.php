@extends('dashborad.layouts.dashboard')
@section('title')
    Blog | Posts
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="col-md-3 ">
                            <a href="{{ route('posts.create') }}">
                                <button type="submit" class="btn btn-primary btn-block">Add Post</button>
                            </a>
                            <hr>

                        </div>


                        <hr>


                        <!-- search form -->
                        <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 590px;">
                                    <input type="text" name="title" class="form-control float-right mx-2 "
                                        placeholder="Post Title" value="{{request('title')}}">

                                    <select name="name" class="form-control float-right mx-2"
                                        placeholder="Category Name" >
                                        <option value="">category Name</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected(request('name')==$category->id)>{{ $category->name }}</option>
                                        @endforeach

                                    </select>


                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            Filter <i class="fas fa-filter"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end search form -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Posts Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if (!$categories) --}}

                                <?php $i = 0; ?>
                                @foreach ($posts as $post)
                                    <?php $i++; ?>

                                    <tr>
                                        <td>{{ $i }} </td>
                                        <td> {{ $post->title }} </td>
                                        <td> {{ $post->category->name }}</td>
                                        <td><img src="{{ asset('storage/' . $post->image) }}" alt="image" height="70"
                                                width="70"> </td>
                                        <td>{{ $post->content }} </td>
                                        <td>{{ $post->created_at }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Actions</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('posts.edit', $post->id) }} "><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('tags.create', $post->id) }}"><i
                                                            class="fas fa-plus"></i> Add Tags</a>

                                                    <form action=" {{ route('posts.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fas fa-trash"></i> Delete</a>
                                                    </form>



                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    {{-- <td colspan="7">
                                            <div class="alert alert-info alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-hidden="true">&times;</button>
                                                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                NO Categories Defiened ...
                                            </div>
                                        </td> --}}
                                </tr>





                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
