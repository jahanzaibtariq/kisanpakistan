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
              <h5> Update Harvesting Detail</h5>
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
                <form class="col s12" method="post" action="/admin/harvesting/update/{{ $sq->id }}">
                  @csrf
                  <div class="row">
                    <div class="input-field col s6">
                      <input  type="text" value=" {{ $sq->cropName }} " name="cropName" maxlength="50">
                      <label for="first_name">Crop Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                    	<label for="first_name">Start Harvesting Day</label>
                    	<br>
                      <input  type="number" value="{{ $sq->startHarvesting_day }}" name="startHarvesting_day" max="31">
                    </div>
                    <div class="input-field col s6">
                      <label for="first_name">Start Harvesting Month</label>
                      <br>
                      <input  type="number" value="{{ $sq->startHarvesting_month }}" name="startHarvesting_month" max="12">
                    </div>    
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <label for="first_name">End Harvesting Day</label>
                      <br>
                      <input  type="number" value="{{ $sq->endHarvestin_day }}" name="endHarvestin_day" max="31">
                    </div>
                    <div class="input-field col s6">
                      <label for="first_name">End Harvesting Month</label>
                      <br>
                      <input  type="number" value="{{ $sq->endHarvesting_month }}" name="endHarvesting_month" max="12">
                    </div>    
                  </div>
                  <div class="row">
                    <div class="input-field col s4">
                      <label for="first_name">Harvesting Methods</label><br><br>
                      <textarea style="width: 500px;height: 150px;" name="harvestingMethod" maxlength="998">{{ $sq->harvestingMethod }}</textarea>
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
      </div>
      <!--end container-->
  </section>
  <!-- END CONTENT -->
@endsection