@extends('layouts.master', ["title" => trans('profile.title.favExtras'), "footer" => false])
@section('content')

   <div class="row collapse profile profile-container">
      @include('user.sidebar')

      <div class="medium-10 small-12 columns panel-main">

         <div class="row">
            <span class="profile-date">{{ strtoupper(date('h:i A D j M Y')) }}</span>
         </div>

         <div class="row">
            <form data-abide class="extra-search-form" action="" method="post">
               <div class="large-8 small-12 columns">

                  <div class="row">
                     <div class="large-3 columns">
                        <label for="searchFavoriteExtra" class="right inline">SEARCH EXTRA</label>
                     </div>
                     <div class="large-9 end columns">
                        <input type="text" name="search">
                     </div>
                  </div>
                  <div class="row">
                     <div class="small-centered columns">
                        <button type="submit" class="submit-button">SUBMIT EXTRA</button>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

@endsection
