@extends('dashborad.layouts.dashboard')
@section('title')
    Blog | Tags
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tags</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tags</li>
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
                            <a href="{{ route('tags.create') }}">
                                <button type="submit" class="btn btn-primary btn-block">Add Tag</button>
                            </a>
                            <hr>

                        </div>
                        <hr>


                        <!-- search form -->
                        <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 590px;">
                                    <input type="text" name="title" class="form-control float-right mx-2 "
                                        placeholder="Post Title" value="">



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
                                    <th>Post Tag</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php $i = 0; ?>
                                @foreach ($tags as $tag)
                                    <?php $i++; ?>

                                    <tr>
                                        <td>{{ $i }} </td>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary">Actions</button>
                                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('tags.edit', $tag->id) }}"><i class="fas fa-edit"></i>
                                                        Edit</a>
                                                    <form action=" {{ route('tags.destroy', $tag->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fas fa-trash"></i> Delete</a>
                                                    </form>
                                                </div>
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
                    {{-- {{$products->withQueryString()->links()}} --}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
