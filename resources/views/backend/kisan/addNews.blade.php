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
                        <h5> Add Kisan News</h5>
                        
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
                  <form class="col s12" method="post" action="{{ url('/admin/add/kisan') }}">
                    @csrf
                    <div class="row">
                      <div class="input-field col s6">
                        <input  type="text" name="newsName">
                        <label for="first_name">News Title</label>
                      </div>
                      <div class="input-field col s6">
                        <input  type="text" name="newDescription">
                        <label for="first_name">News Description</label>
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
                    
                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">

                        </div>

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

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                  
                    <!-- Floating Action Button -->
                    <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                        <a class="btn-floating btn-large">
                          <i class="mdi-action-stars"></i>
                        </a>
                        <ul>
                          <li><a href="#" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                          <li><a href="#" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                          <li><a href="#" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                          <li><a href="#" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                        </ul>

                    </div>
                    <!-- Floating Action Button -->

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
@endsection