<!--  -->
<div class="uk-trip-sidebar">
  <div class="uk-contact-detailsuk-padding-remove-top">
    <ul>
      <li class="">
        <div>Need Help with this booking:</div>
        <div>
          <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
        </div>
      </li>
    </ul>
  </div>
</div>
<!--  -->
<!--  -->
<div class="uk-trip-summary">
  <div>
    @if($booking->thumbnail==!NULL)
    <div class="uk-media-200">
      <img src="{{ asset('uploads/original/'.$booking->thumbnail) }}" alt="">
    </div>
    @endif
    <div class="uk-trip-summary-body uk-padding-small">
      <h2 class="uk-h5 f-w-600 text-black-light uk-margin-small-bottom">{{$booking->trip_title}}</h2>
      <hr class="uk-margin-small">
      <div class="uk-child-width-1-2 uk-grid-match uk-grid uk-flex-left" uk-grid>
        @if($booking->peak_name)
        <div>
          <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
              <img src="{{asset('themes-assets/images/icons/01.png')}}" width="30" alt="Start / End">
            </div>
            <div>
              <div>
                <p class="uk-margin-remove">Country</p>
                <p class="uk-margin-remove f-14">{{$booking->peak_name}}</p>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if($booking->duration)
        <div>
          <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
              <img src="{{asset('themes-assets/images/icons/03.png')}}" width="30" alt="Duration">
            </div>
            <div>
              <div>
                <p class="uk-margin-remove">Duration</p>
                <p class="uk-margin-remove f-14">{{$booking->duration}} {{$booking->duration <= '1'?'Day':'Days'}}</p>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if($booking->group_size)
        <div>
          <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
              <img src="{{asset('themes-assets/images/icons/04.png')}}" width="30" alt="Group Size">
            </div>
            <div>
              <div>
                <p class="uk-margin-remove">Group Size</p>
                <p class="uk-margin-remove f-14">{{$booking->group_size}}</p>
              </div>
            </div>
          </div>
        </div>
        @endif
        @if($booking->start_date)
        <div>
          <div class="uk-grid uk-grid-small uk-child-width-expand uk-flex-nowrap uk-flex-middle" uk-grid>
            <div class="uk-width-auto">
              <img src="{{asset('themes-assets/images/icons/05.png')}}" width="30" alt="Start / End">
            </div>
            <div>
              <div>
                <p class="uk-margin-remove">Start date</p>
                <p class="uk-margin-remove f-14">{{$booking->start_date}}</p>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
    @if($booking->starting_price || $booking->route)
    <div class="uk-trip-summary-footer uk-padding-small">
      <ul>
        @if($booking->starting_price)
        <li>
          <div class="uk-flex uk-flex-between uk-flex-middle">
            <div>Total Price:</div>
            <div class="text-primary"> {{$booking->starting_price}}</div>
          </div>
        </li>
        @endif
        @if($booking->route)
        <li>
          <div class="uk-flex uk-flex-between uk-flex-middle">
            <div>Deposit Payable Now:</div>
            <div class="text-primary">{{$booking->route}}</div>
          </div>
        </li>
        @endif
      </ul>
    </div>
    @endif
  </div>
</div>
<!--  -->
<!--  -->
<!-- <div class="uk-margin"><div class="f-12 uk-margin-small-bottom">This is a secure and SSL encrypted payment via 2C2P. Your credit card details are safe!</div><img src="assets/images/payments.png" alt=""></div> -->
<!--  -->