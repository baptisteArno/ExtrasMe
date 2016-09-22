<h2 class="name-list">{{ strtoupper($professional->company_name) }}</h2>
               <hr style="margin-top: 0px;">
               <div style="width: 40%;">
                  <img style="width: 100%;" class="profile-picture" src="{{ asset('images/user-student.png') }}" alt="" />
               </div>
                <div class="summary-container cv-div" style="margin-top: 20px;">
               <ul class="personal-informations">
                  <li><span class="info-label">@lang('professional.email')</span>
                  {{ strtoupper($mail) }}</li>

                  <li><span class="info-label">@lang('professional.contactNumber')</span>
                  {{ strtoupper($professional->phone) }}</li>

                  <li><span class="info-label">@lang('professional.referencePerson')</span>
                  {{ strtoupper($professional->first_name.' '.$professional->last_name) }}</li>

                  <li><span class="info-label">@lang('professional.sector')</span>
                  {{ strtoupper($professional->category) }}</li>
               </ul>
            </div>