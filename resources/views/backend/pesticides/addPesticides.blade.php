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
              <h5> Add Pesticides Detail</h5>
            </div>
          </div>
        </div>
      </div>
      <!--start container-->
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="card-panel">
              <div class="row">
                <form class="col s12" method="post" action="{{ url('/admin/add/pesticides') }}">
                  @csrf
                  <div class="row">
                    <div class="input-field col s6">
                      <input  type="text" name="cropName" maxlength="50">
                      <label for="first_name">Crop Name</label>
                    </div>
                    <div class="input-field col s6">
                      <input  type="text" name="pestName" maxlength="150">
                      <label for="first_name">Pest Name</label>
                    </div>
                    <div class="input-field col s6">
                      <input  type="text" name="pesticides" maxlength="150">
                      <label for="first_name">pesticides</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s4">
                      <label for="first_name">Control Methods</label><br><br>
                      <textarea style="width: 500px;height: 150px;" name="controlMethod" maxlength="998"></textarea>
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
  </section>
  <!-- END CONTENT -->
@endsection