@extends('layouts.master', ["title" => trans('profile.title.student', ["name" => $user->username]), "footer" => false])
@section('content')

   <div class="row collapse profile profile-container">
      @include('user.sidebar')

      <div class="medium-10 small-12 columns panel-main">

         <div class="row">
            <span class="profile-date"><a href="{{ route('calendar', Auth::user()->id) }}">{{ strtoupper(date('h:i A D j M Y')) }}</a></span>
         </div>

         <div class="extra-container">
         <div class="row account-resume">
            <div class="columns medium-3 medium-uncentered small-centered picture-column small-7" style="padding: 0;">
               @if(file_exists("uploads/pp/".$user->id.".png"))
                  <img class="profile-picture" src=" uploads/pp/{{$user->id}}.png" alt="" />
               @else
                  <img class="profile-picture" src="{{ asset('images/user-professional.png') }}" alt="" />
               @endif
            </div>

            <div class="medium-7 small-12 medium-uncentered small-centered columns">
               <ul class="personal-informations">
                  <li class="title">{{ strtoupper($professional->company_name) }}</li>

               @if(Auth::user()->id == $username)
                  <li><span class="info-label">@lang('professional.email')</span>
                  {{ strtoupper($email) }}</li>

                  <li><span class="info-label">@lang('professional.contactNumber')</span>
                  {{ strtoupper($professional->phone) }}</li>
               @endif

                  <li><span class="info-label">@lang('professional.referencePerson')</span>
                  {{ strtoupper($professional->first_name.' '.$professional->last_name) }}</li>

                  <li><span class="info-label">@lang('professional.sector')</span>
                  {{ strtoupper($professional->category) }}</li>
               </ul>
            </div>
         </div>

            <div class="titre-extra">
               <h2>{{$extra->type}} EXTRA : {{$professional->state}}</h2>
            </div>
            <div class="info-container">
                  <table>
                                     <thead>
                                       <tr>
                                         <td colspan="2">
                                           @lang('card-content.keyDetails')
                                         </td>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                         <td>
                                           @lang('card-content.category')
                                         </td>
                                         <td>
                                           {{ $extra->type }}
                                         </td>
                                       </tr>
                                       <tr>
                                         <td>
                                           @lang('card-content.requirements')
                                         </td>
                                         <td>
                                           {{ $extra->requirements }}
                                         </td>
                                       </tr>
                                       <tr>
                                         <td>
                                           @lang('card-content.salary')
                                         </td>
                                         <td>
                                           {{ $extra->salary }} CHF/Hr
                                         </td>
                                       </tr>
                                       <tr>
                                         <td>
                                           @lang('card-content.benefits')
                                         </td>
                                         <td>
                                           {{ $extra->benefits }}
                                         </td>
                                       </tr>
                                       <tr>
                                         <td>
                                           @lang('card-content.lang')
                                         </td>
                                         <td>
                                           French
                                         </td>
                                       </tr>
                                       <tr>
                                         <td>
                                           @lang('card-content.time')
                                         </td>
                                         <td>
                                           {{ $extra->date.' at '.$extra->date_time }}
                                         </td>
                                       </tr>
                                       <tr>
                                         <td style="border-bottom: none;">
                                           @lang('card-content.otherInfo')
                                         </td>
                                         <td style="border-bottom: none;">
                                           @if(empty($extra->informations))
                                               @lang('card-content.noOtherInfo')
                                           @else
                                             {{ $extra->informations}}
                                           @endif
                                         </td>
                                       </tr>
                                     </tbody>
                                   </table>


               </div>
               @if(Auth::user()->type == 0)
                <button>APPLY NOW</button>
              @else
                <button><a>MODIFY</a></button>
                <button><a href="{{ route('delete_extra', ['username' => Auth::user()->id, 'id' => $extra->id]) }}">DELETE</a></button>
              @endif
            </div>
         </div>
      </div>
   </div>

@endsection
