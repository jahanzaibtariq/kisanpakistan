@extends('backend.layout.app')
@section('content')
  <!-- START CONTENT -->
  <section id="content">
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey hide-on-large-only">
            <i class="mdi-action-search active"></i>
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <h5> Update Admin Detail</h5>
            
          </div>
        </div>
      </div>
    </div>
    <!--start container-->
    <div class="container">
    <!--Form Advance-->          
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">
            @foreach($sql as $sq)
            <div class="row">
              <form class="col s12" method="post" action="/admin/profile/update" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="input-field col s6">
                    <input  type="text" name="name" value="{{ $sq->name }}" maxlength="30">
                    <label for="first_name">Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input  type="email" name="email" value="{{ $sq->email }}" maxlength="55">
                    <label for="first_name">Email</label>
                  </div>    
                </div>
                
                  <div id="file-upload" class="section">
                      
                     <!--Default version-->
                    <div class="row section">
                      <div class="col s12 m4 l3">
                         <p>Image</p>
                      </div>
                      <div class="col s12 m8 l9">
                          <input type="file" name="admin_image" id="input-file-now" class="dropify" data-default-file=""  required />
                      </div>
                    </div>
                  </div>
                     
                
                <div class="row">
                  <div class="row">
                    <div class="input-field col s12">
                      <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                        <i class="mdi-content-send right"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!--end container-->
  </section>
  <!-- END CONTENT -->
@endsection