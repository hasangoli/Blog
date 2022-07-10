 <div class="owl-carousel owl-theme">

     @foreach ($partners as $partner)
     
         <div class="item">
             <img class="logo-owl" src="{{ asset('storage/partners/' . $partner->image->title) }}" alt="">
         </div>
     @endforeach
 </div>



 
