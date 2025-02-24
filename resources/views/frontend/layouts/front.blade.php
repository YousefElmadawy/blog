@extends('frontend.layouts.header')
<!-- Navigation -->
@extends('frontend.layouts.navbar')

<!-- Page Content -->
<div class="container">

    <div class="row">


        @yield('content')

         

        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>
        
            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-12">
                        @foreach (App\Models\Category::all() as $category)
                            
                      
                        <ul class="list-unstyled">
                            <li><a href="#">{{$category->name}}</a>
                            </li>
                             
                        </ul>
                        @endforeach
                    </div>
                    <!-- /.col-lg-6 -->
                    
                   
                </div>
                <!-- /.row -->
            </div>
        
            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>
        
        </div>
        

    </div>
    <!-- /.row -->

    <hr>
 @extends('frontend.layouts.footer')
