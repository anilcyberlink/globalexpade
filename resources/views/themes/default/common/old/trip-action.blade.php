<!--  -->
<div class=" uk-padding-remove-top">
    <ul>
      <li class="bg-secondary">
        <div class="text-white">Start Date:</div>
        <div class="f-24 text-white"><b>{{$data->start_date}}</b></div>
        <div class="text-white">Starting From</div>
        <div class="f-24 text-white">
          <b>US ${{$data->starting_price}} per person</b>
          <!--<del>US$1,148</del>-->
        </div>
        <div class="text-primary">Deposit Required: US ${{$data->route}}</div>
      </li> 
      <li class="uk-active uk-box-shadow-medium">
        <div>Need Help with this booking:</div>
        <div>
          <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
        </div>
      </li>
      <li class="uk-box-shadow-medium"><div>Mail us on</div><div><a href="mailto:{{$setting->email_primary}}">{{$setting->email_primary}}</a></div></li>
      <li class="uk-active uk-box-shadow-medium">
        <div>Share this trip:</div>
        <div>
          <div class="sharethis-inline-share-buttons uk-margin-small-top"></div>
        </div>
      </li>
    </ul>
  </div>
  <!--  -->
  <!--  -->
  <div class="uk-booking-button ">
    <div class="uk-margin-small-bottom  ">
      <a href="{{route('page.booking', $data->uri)}}" class="uk-button button-primary button-primary-active uk-display-block uk-width-1-1">Book this Trip</a>
    </div>
    @if($data->trip_pdf)
    <div>
      <a href="{{asset('uploads/pdf/'.$data->trip_pdf)}}" download class="uk-button button-secondary button-secondary-active uk-display-block uk-width-1-1 uk-margin-bottom">Download trip details PDF</a>
    </div>
    @endif
    <p class="uk-clearfix uk-text-center" uk-scrollspy-class> Have Questions? <a href="#inquire-now" uk-toggle="target: #inquire-now" class=" uk-text-center"> Inquire Now </a>
    </p>
  </div>
  <!--  -->