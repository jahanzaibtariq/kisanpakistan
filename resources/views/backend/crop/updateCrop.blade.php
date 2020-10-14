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
            <h5> Update Crop Detail</h5>
            
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
              <form class="col s12" method="post" action="/admin/crop/update/{{ $sq->crop_id }}">
                @csrf
                <div class="row">
                  <div class="input-field col s6">
                    <input  type="text" name="cropName" value="{{ $sq->cropName }}">
                    <label for="first_name">Crop Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input  type="text" name="cropDescription" value="{{ $sq->cropDescription }}">
                    <label for="first_name">Crop Description</label>
                  </div>    
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input  type="number" name="min_humidity" value="{{ $sq->min_humidity  }}" id="min_humidity" step="any">
                    <label for="first_name">Minimum Moisture %</label>
                  </div>
                  <div class="input-field col s6">
                    <input  type="number" name="max_humidity_per" value="{{ $sq->max_humidity_per }}" id="max_humidity" class="humidity" step="any">
                    <label for="first_name">Maximum Moisture %</label>
                  </div>    
                </div>
                <div class="row">
                  <div class="input-field col s3">
                    <input  type="number" name="min_PH" value="{{ $sq->min_PH }}" id="min_PH" step="any">
                    <label for="first_name">Minimum PH</label>
                  </div>
                  <div class="input-field col s3">
                    <input  type="number" name="max_ph_No" value="{{ $sq->max_ph_No }}" class="PH" step="any">
                    <label for="first_name">Maximum PH</label>
                  </div> 
                  <div class="input-field col s3">
                    <input  type="number" name="min_temp" value="{{ $sq->min_temp }}" id="min_temp" step="any">
                    <label for="first_name">Minimum Temrature ( C )</label>
                  </div>
                  <div class="input-field col s3">
                    <input  type="number" name="max_temp_C" value="{{ $sq->max_temp_C }}" id="max_temp" class="tempurature" step="any">
                    <label for="first_name">Maximum Temrature ( C )</label>
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
      <!-- //////////////////////////////////////////////////////////////////////////// -->
      <!--card widgets start-->
      <div id="card-widgets">
        <div class="row">
            <div class="col s12 m12 l4" style="display: none;">
                <div class="map-card">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
                        </div>
                    </div>
                </div>io
            </div>
        </div>
      <!--card widgets end-->
      </div>
      <!--end container-->
  </section>
  <!-- END CONTENT -->
@endsection