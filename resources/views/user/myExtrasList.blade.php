@extends('layouts.master', ["title" => trans('profile.title.professional', ["name" => $user->username]), "footer" => false])
@section('content')

   <div class="row collapse profile profile-container">
      @include('user.sidebar')

      <div class="medium-10 small-12 columns panel-main" style="display:flex; color:white; padding-top:50px;">


         <div class="experience-container"><div class="chrono-container">
                  <a href="" id="past" data-chrono-id = "4" class="showChrono" style="width: 50%;"><label>@lang('myExtraList.past')</label></a>
                  <div style="display:flex; flex-direction:column;">
                    <div style="width:1px; height: 20%; background-color: #222"></div>
                    <div style="width:1px; height: 60%; background-color: grey"></div>
                    <div style="width:1px; height: 20%; background-color: #222"></div>
                  </div>
                  <a href="" id="present" data-chrono-id = "5" class="active showChrono" style="width: 50%;"><label>@lang('myExtraList.future')</label></a>
            </div>
            <div id="list-to-append" style="display: flex; flex-direction:column;">
              <h1>Future Extras</h1>
              <div class="liste-container">
        @if(count($extras) == 0)
          <p class="empty-notice">@lang('myExtraList.noExtra')</p>
        @else

        <div style="display:flex; flex-direction:column; width:40%" class="extra-list">
          <ul>
              @for($i=0; $i < count($extras); $i++)
                    <div style="width:100%; height:1px; background-color:white;"></div>
                    <li data-cardid="{{$extras[$i]->id}}" class="showCard <?php if($i == 0){ echo "active"; }?>" style="list-style-type:none; padding-top:20px; padding-bottom :20px; cursor:pointer;">{{ $extras[$i]->type }} Extra: {{ $professional->comany_name }}</li>
                    <div style="width:100%; height:1px; background-color:white;"></div>
              @endfor
          </ul>
        </div>
        <div style="width:5%;display:flex;">
          <img src="{{ asset('images/right-arrow.png') }}" style="margin:auto; width:90%;">
        </div>
        <div style="display:flex; flex-direction:column; width:55%; align-items:center" id="card-container">
          <div class="row account-resume" style="width: 90%;">
            <div class="columns medium-3 medium-uncentered small-centered picture-column small-7" style="padding: 0;">
               @if(file_exists("uploads/pp/".$professional->user_id.".png"))
                  <img class="profile-picture" src=" uploads/pp/{{$professional->user_id}}.png" alt="" />
               @else
                  <img class="profile-picture" src="{{ asset('images/user-professional.png') }}" alt="" />
               @endif
            </div>

            <div class="medium-7 small-12 medium-uncentered small-centered columns">
               <ul class="personal-informations">
                  <li class="title">{{ strtoupper($professional->company_name) }}</li>

               @if(Auth::user()->id == $username)
                  <li><span class="info-label">@lang('professional.email')</span>
                  {{ strtoupper($user->email) }}</li>

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
               <h2>{{$extras[0]->type}} EXTRA : {{$professional->state}}</h2>
            </div>
                        <table style="width:90%;" class="card-info">
                          <thead>
                            <tr>
                              <td colspan="2" style="text-align:center; color:white;">
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
                                {{ $extras[0]->type }}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                @lang('card-content.requirements')
                              </td>
                              <td>
                                {{ $extras[0]->requirements }}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                @lang('card-content.salary')
                              </td>
                              <td>
                                {{ $extras[0]->salary }} CHF/Hr
                              </td>
                            </tr>
                            <tr>
                              <td>
                                @lang('card-content.benefits')
                              </td>
                              <td>
                                {{ $extras[0]->benefits }}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                @lang('card-content.lang')
                              </td>
                              <td>
                                {{ $extras[0]->language }}
                              </td>
                            </tr>
                            <tr>
                              <td>
                                @lang('card-content.time')
                              </td>
                              <td>
                                {{ $extras[0]->dateExtra().' at '.$extras[0]->timeExtra() }}
                              </td>
                            </tr>
                            <tr>
                             <td>
                               @lang('card-content.numberPerson')
                             </td>
                             <td>
                               {{ $extras[0]->number_persons }}
                             </td>
                           </tr>
                            <tr>
                              <td style="border-bottom: none;">
                                @lang('card-content.otherInfo')
                              </td>
                              <td style="border-bottom: none;">
                                @if(empty($extras[0]->informations))
                                    @lang('card-content.noOtherInfo')
                                @else
                                  {{ $extras[0]->informations}}
                                @endif
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        @if($extras[0]->find == 0)
                          <ul>
                              <li class="title">@lang('myExtraList.studentApplied')</li>
                              @foreach($students as $student)
                                <li>
                                  <a href = "{{ route('home', $student[0]->user->id) }}">{{ $student[0]->first_name . " " . $student[0]->last_name }}</a>
                                  <button class="submit-button right">@lang('myExtraList.decline')</button>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button class="submit-button right"><a href="{{ $extras[0]->id.'/accept/'.$student[0]->id }}">@lang('myExtraList.accept')</a></button>
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </li>
                              @endforeach
                          </ul>
                        @else
                          <ul>
                              <li class="title">@lang('myExtraList.studentChosen')</li>
                              <li><a href="{{ route('home', $student->user->id) }}">{{ $student->first_name . " " . $student->last_name }}</a></li>
                          </ul>
                        @endif
                      </div>
                    @endif
                </div>
              </div>
            </div>
   <script type="text/javascript">
     var url = "{{ route('getCard') }}";
     var url_liste = "{{ route('getList') }}";
   </script>
@endsection
