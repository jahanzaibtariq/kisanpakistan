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
              <h5> Add Fertilizer Detail</h5>
              
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
              
              <div class="row">
                <form class="col s12" method="post" action="{{ url('/admin/add/fertilizer') }}">
                  @csrf
                  <div class="row">
                    <div class="input-field col s6">
                      <input  type="text" name="cropName" maxlength="40">
                      <label for="first_name">Crop Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <input  type="text" name="fertilizerUsage" maxlength="100">
                      <label for="first_name">Fertilizer Usage</label>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END CONTENT -->
@endsection