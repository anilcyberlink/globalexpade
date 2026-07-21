<!-- start: Partners -->
<section class="uk-section-small  bg-light-grey ">
   <div class="uk-container uk-container-smalls uk-text-center">
     <div class="uk-grid uk-grid-collapse" uk-scrollspy="target: [uk-scrollspy-class], a; cls: uk-animation-slide-top-small; delay: 100; repeat: false;">
       <!--  -->
       <div class="uk-width-1-5@m uk-text-center uk-text-left@m">
           <h1 class="uk-text-bold text-secondary-light uk-margin-remove uk-scrollspy-inview uk-padding-small uk-padding-remove-horizontal " style="">Partners</h1>
       </div>
       @if($partners->count() > 0)
       <div class="uk-width-4-5@m" uk-slider="autoplay: true; sets: true;">
         <div class="uk-position-relative">
           <div class="uk-slider-container uk-light">
             <ul class="uk-partners uk-slider-items uk-child-width-1-2 uk-child-width-1-5@m uk-grid">
              @foreach( $partners as $row)
               <li>
                 <a href="{{$row->link}}" target="_blank" class="uk-transition-toggle uk-link-toggle" uk-tooltip="{{$row->title}}">
                   <img src="{{asset('uploads/banners/'.$row->picture)}}" class="uk-transition-scale-up uk-transition-opaque" alt="{{$row->title}}">
                 </a>
               </li>
               @endforeach
             </ul>
           </div>
         </div>
       </div>
       @endif
       <!--  -->
     </div>
   <!--  <div class="uk-grid-large uk-flex-middle uk-grid uk-flex-between uk-margin-medium-top" uk-grid="">-->
   <!--    <div class="uk-width-auto@s uk-position-relative">-->
   <!--      <div class="uk-flex uk-flex-middle uk-text-center uk-flex-center ">-->
   <!--        <div class="uk-margin-medium-right text-secondary">Follow us on</div>-->
   <!--        <div>-->
   <!--          <div class="uk-child-width-1-4  uk-grid-small uk-text-left@l  uk-text-center uk-social-media" uk-grid="">-->
   <!--            <div>-->
   <!--              <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;" target="_blank"></a>-->
   <!--            </div>-->
   <!--            <div>-->
   <!--              <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->youtube_link}}" uk-icon="icon: youtube;" target="_blank"></a>-->
   <!--            </div>-->
   <!--            <div>-->
   <!--              <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->twitter_link}}" uk-icon="icon: twitter;" target="_blank"></a>-->
   <!--            </div>-->
   <!--            <div>-->
   <!--              <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->instagram_link}}" uk-icon="icon: instagram;" target="_blank"></a>-->
   <!--            </div>-->
   <!--          </div>-->
   <!--        </div>-->
   <!--      </div>-->
   <!--    </div>-->
   <!--    <div class="uk-width-auto@s">-->
   <!--     <ul class="uk-grid-small uk-text-center uk-flex-middle uk-flex-center uk-flex uk-grid " uk-grid>-->
   <!--       <li>-->
   <!--         <img src="{{asset('themes-assets/images/payment/ae.png')}}" alt="" width="70">-->
   <!--       </li>-->
   <!--       <li>-->
   <!--         <img src="{{asset('themes-assets/images/payment/visa.png')}}" alt="" width="70">-->
   <!--       </li>-->
   <!--       <li>-->
   <!--         <img src="{{asset('themes-assets/images/payment/master.png')}}" alt="" width="70">-->
   <!--       </li>-->
   <!--       <li>-->
   <!--         <img src="{{asset('themes-assets/images/payment/union.png')}}" alt="" width="70">-->
   <!--       </li>-->
   <!--     </ul>-->
   <!--   </div>-->
   <!--  </div>-->
   <!--</div>-->
 </section>
 <!-- end: Partners -->
 <!-- start: footer  -->
 <footer class="f-15 uk-position-relative uk-section uk-padding-remove-bottom uk-background-cover uk-background-position-top" id="footer" uk-img data-src="{{asset('themes-assets/images/bg/mountains.png')}}">
   <div class="uk-container" uk-scrollspy="target:[uk-scrollspy-class], h4, a, img, li; cls: uk-animation-slide-top-medium; delay: 10; repeat: false;">
     <!-- start: footer middle -->
     <div class="uk-footer-middle  uk-footer-border  uk-position-relative ">
       <div class="uk-grid-large uk-grid" uk-grid="">
         <div class="uk-width-expand@m">
           <div class="uk-grid-small uk-child-width-expand@s uk-grid" uk-grid="">
             <div>
               <ul class="uk-list">
                   @if($footer->count()>0)
                @foreach($footer as $value)
                 <li>
                   <a href="{{ route('page.posttype_detail', $value->uri) }}">{{$value->post_type}}</a>
                 </li>
                 @endforeach
                 @endif
               </ul>
             </div>
             @if($pagetypes->count()>0)
             <div>
               <ul class="uk-list">
                @foreach($pagetypes->slice(0,4) as $row)
                 <li>
                   <a href="{{url('info/'.$row->uri)}}">{{$row->page_type}}</a>
                 </li>
                 @endforeach
               </ul>
             </div>
             <div>
               <ul class="uk-list">
                @foreach($pagetypes->slice(4,8) as $row)
                 <li>
                  <a href="{{url('info/'.$row->uri)}}">{{$row->page_type}}</a>
                 </li>
                 @endforeach
                 
               </ul>
             </div>
             @endif
           </div>
           <!--  -->
         </div>
         <div class="uk-width-1-3@s uk-position-relative">
           <div>
             <ul class="uk-list">
              @if($setting->address)
               <li class="uk-flex uk-flex-middle">
                 <i class="fa fa-map-marker uk-margin-small-right"></i>
                 <a href="{{$setting->google_map}}" target="_blank">{{$setting->address}}</a>
               </li>
               @endif
               @if($setting->phone)
               <li class="uk-flex uk-flex-middle">
                 <i class="fa fa-phone uk-margin-small-right"></i>
                 <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
               </li>
               @endif
               @if($setting->email_primary)
               <li class="uk-flex uk-flex-middle">
                 <i class="fa fa-envelope uk-margin-small-right"></i>
                 <a href="mailto:{{$setting->email_primary}}">{{$setting->email_primary}}</a>
               </li>
               @endif
               <!--<li>-->
               <!--  <div class="uk-flex uk-flex-middle uk-text-center  ">-->
               <!--   <div class="uk-margin-right text-white">Follow us:</div>-->
               <!--    <div>-->
               <!--      <div class="uk-child-width-1-4  uk-grid-small uk-text-left@l  uk-text-center uk-social-media" uk-grid="">-->
               <!--        <div>-->
               <!--          <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;" target="_blank"></a>-->
               <!--        </div>-->
               <!--        <div>-->
               <!--          <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->youtube_link}}" uk-icon="icon: youtube;" target="_blank"></a>-->
               <!--        </div>-->
               <!--        <div>-->
               <!--          <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->twitter_link}}" uk-icon="icon: twitter;" target="_blank"></a>-->
               <!--        </div>-->
               <!--        <div>-->
               <!--          <a class="uk-icon-button bg-primary text-white uk-icon" rel="noreferrer" href="{{$setting->instagram_link}}" uk-icon="icon: instagram;" target="_blank"></a>-->
               <!--        </div>-->
               <!--      </div>-->
               <!--    </div>-->
               <!--  </div>-->
               <!--</li>-->
               <li>
                   <div class="uk-payment">
                       <!--<ul class="uk-grid-small uk-child-width-1-4 uk-footer-pay" uk-grid>-->
                       <!--   <li>-->
                       <!--       <div>-->
                                  
                       <!--     <img src="{{asset('themes-assets/images/payment/ae.png')}}" alt="" width="70">-->
                       <!--       </div>-->
                       <!--   </li>-->
                       <!--   <li>-->
                       <!--       <div>-->
                                  
                       <!--     <img src="{{asset('themes-assets/images/payment/visa.png')}}" alt="" width="70">-->
                       <!--       </div>-->
                       <!--   </li>-->
                       <!--   <li>-->
                       <!--       <div>-->
                                  
                       <!--     <img src="{{asset('themes-assets/images/payment/master.png')}}" alt="" width="70">-->
                       <!--       </div>-->
                       <!--   </li>-->
                       <!--   <li>-->
                       <!--       <div>-->
                                  
                       <!--     <img src="{{asset('themes-assets/images/payment/union.png')}}" alt="" width="70">-->
                       <!--       </div>-->
                       <!--   </li>-->
                       <!-- </ul>-->
                   </div>
               </li>
             </ul>
           </div>
         </div>
       </div>
       <div class="uk-flex uk-flex-middle uk-text-center  uk-margin-top uk-margin-bottom">
            <div class="uk-margin-right text-white">Follow us:</div>
                <div>
                    <div class="uk-child-width-1-4  uk-grid-small uk-text-left@l  uk-text-center uk-social-media" uk-grid="">
                       <div class="uk-margin-right">
                         <a class="uk-icon-button bg-transparent text-white uk-icon" rel="noreferrer" href="{{$setting->facebook_link}}" uk-icon="icon: facebook;" target="_blank"></a>
                       </div>
                       <div>
                       <!--  <a class="uk-icon-button bg-transparent text-white uk-icon" rel="noreferrer" href="{{$setting->youtube_link}}" uk-icon="icon: youtube;" target="_blank"></a>-->
                       <!--</div>-->
                       <!--<div>-->
                       <!--  <a class="uk-icon-button bg-transparent text-white uk-icon" rel="noreferrer" href="{{$setting->twitter_link}}" target="_blank">-->
                       <!--      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50"><path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path></svg>-->
                       <!--  </a>-->
                       <!--</div>-->
                       <div>
                         <a class="uk-icon-button bg-transparent text-white uk-icon" rel="noreferrer" href="{{$setting->instagram_link}}" uk-icon="icon: instagram;" target="_blank"></a>
                       </div>
                    </div>
                </div>
            </div>
     </div>
     <!-- end: footer middle -->
     <!-- start: footer bottom -->
     <div class="  uk-footer-top  uk-position-relative ">
       <div class="uk-flex-middle uk-grid" uk-grid>
         <div class="uk-width-expand@m ">
           <div class="uk-text-left@m uk-text-center"> {!!$setting->copyright_text!!}
           </div>
         </div>
       </div>
     </div>
     <!-- end: footer bottom -->
   </div>
 </footer>
 <!-- end footer -->
 <a href="#" id="BackToTop" uk-scroll>
   <img src="{{asset('themes-assets/images/inital1.png')}}" alt="">
 </a>
 <script type="text/javascript" src="{{asset('themes-assets/js/app.js')}}"></script>
 <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=63d28d3d8c889d0019f9c82f&product=sop' async='async'></script>
 </body>
 </html>