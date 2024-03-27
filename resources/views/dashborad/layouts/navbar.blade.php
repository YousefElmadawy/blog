<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard')}}" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('categories.index') }}" class="nav-link">Categories</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('posts.index') }}" class="nav-link">posts</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('tags.index') }}" class="nav-link">Tags</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('comments.index') }}" class="nav-link">Comments</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    

      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->

     
        
           
          
        <form method="POST" action="{{ route('logout') }}"  class="btn btn-dark float-end">
          @csrf

          <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              {{ __('Log Out') }}
          </x-dropdown-link>
      </form>
          
           
          
 
    </ul>
  </nav>