@extends('frontend.layouts.front')
@section('title')
    Blog | Home
@endsection

@section('content')
   

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            @foreach ($posts as $post)
                <!-- First Blog Post -->
                <h2>
                    <a href="">{{ $post->title }}</a>
                </h2>
               
                <p><span class="glyphicon glyphicon-time"></span> {{ $post->created_at }}</p>
                <hr>
                <img class="img-responsive" src="{{ asset('storage/' . $post->image) }}" width="70" height="70"
                    alt="">
                <hr>
                <p>{{ $post->content }}.</p>

                <a class="btn btn-primary" href={{ route('show',  $post->id ) }}>Read More <span
                        class="glyphicon glyphicon-chevron-right"></span></a>

               <hr>
               
            @endforeach






            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>
     
@endsection
