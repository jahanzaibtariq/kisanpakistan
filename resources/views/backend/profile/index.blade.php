@extends('backend.layout.app')
@section('content')
	<!-- START CONTENT -->
      <section id="content">
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
          <div class="container">
            <div class="row">
              <div class="col s6 m6 l6">
              	<h2></h2>
                <a href="{{url('/admin/profile/update')}}"><button type="button" class="btn btn-primary">Update Profile Setting</button></a>
              </div>
              <div class="col s6 m6 l6">
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <div class="container">
          <div class="section">
            <div class="divider"></div>
            <!--Icon Prefixes-->
            <div id="icon-prefixes" class="section">
              <h4 class="header">Profile Detail</h4>
              <div class="row">
                 <div class="col s12 m8 l9">
                  <div class="row">
                    <form class="col s12">
                      <div class="row">

                        <img src="{{ asset('images/')}}/{{$sql->image}}" width="300px" height="250px">
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <label for="icon_prefix3">{{ $sql->name }}</label><br>
                        </div>
                        <div class="input-field col s6">
                          
                        </div>
                        <div class="input-field col s12">
                          <i class="mdi-communication-email prefix"></i>
                          <label for="icon_telephone">{{ $sql->email }}</label><br>
                        </div>
                        
                        
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
@endsection