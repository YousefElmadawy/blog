@extends('dashborad.layouts.dashboard')
@section('title')
    Blog | Edit Tags
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Tag</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Edit Tag</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <form method="POST" action="{{ route('tags.update', $tag->id) }}">
            @csrf
            @method('PATCH')

            <div class="card-body"><!-- start of the div -->

                <div class="form-group">
                    <label for="">Post Tag</label>
                    <input type="text" class="form-control" value="{{ old('name', $tag->name) }}" name="name"
                        placeholder="Enter Category">
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
