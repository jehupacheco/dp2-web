@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              @if (session('stored'))
                  <script>$("#modalSuccess").modal("show");</script>
                  
                  <div class="alert alert-success fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>¡Éxito!</strong> {{session('stored')}}
                  </div>
              @endif

              @if (session('delete'))
                  <script>$("#modalError").modal("show");</script>                        
              @endif
            </div>
            <div class=""> 
              @if ($errors->any())
                  <ul class="alert alert-danger fade in">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
                  </ul>
                @endif
            </div>
            <div class="page-title">
              <div class="title_left">
                <h3>Perfil de Usuario</h3>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil <small>datos del usuario</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-2 col-sm-2 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h4>{{Auth::user()->name}}</h4>
                      <a class="btn btn-success" href="{{url('/perfil/edit')}}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      


                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <ul class="list-unstyled user_data">
                        

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> {{Auth::user()->getOrgName()}}
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-envelope-o" aria-hidden="true"></i> {{Auth::user()->email}}
                        </li>
                        
                        <li>
                          <i class="fa fa-user-secret"></i> {{Auth::user()->roles[0]->name}}
                        </li>
                        
                      </ul>

                      
                      <br />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
