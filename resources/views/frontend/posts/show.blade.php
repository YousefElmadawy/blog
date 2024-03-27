@extends('../frontend.layouts.front')
@section('title')
    Blog | Home
@endsection
@section('content')
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{ $post->title }}</h1>

            <!-- Author -->
            <p class="lead">
                Category is <a href="#">{{ $post->category->name }}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{ asset('storage/' . $post->image) }}" width="400" height="200"
                alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                {{ $post->content }}
            </p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach ($post->comments as $comment)
                <div class="media">

                    <div class="media-body">
                        <h4 class="media-heading">
                            <small> </small>
                            {{$comment->content}}
                        </h4>

                    </div>
                </div>
            @endforeach


        </div>
    @endsection
