<header class="section-header">
   <section class="header-main border-bottom">
      <div class="container-fluid">
         <div class="row align-items-center">
            <div class="col-md-3 col-7">
               <a href="/" class="text-decoration-none" data-abc="true">
                  <span class="logo"><i class="fa fa-apple-alt"></i> APPLE STORE </span></a>
            </div>
            <div class="col-md-5 d-none d-md-block">
               <form class="search-wrap">
                  <div class="input-group w-100"><input type="text" class="form-control search-form"
                        style="width:55%;border: 1px solid #ffffff" name="q" placeholder="mau sewa apa hari ini ?">
                     <div class="input-group-append">
                        <button class="btn search-button" type="submit"><i class="fa fa-search"></i>
                        </button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-4 col-5">
               <div class="d-flex justify-content-end">



                  <div class="account">
                     @guest
                         
                     <a href="{{ route('login') }}" class="btn search-button btn-md d-none d-md-block ml-4"><i
                           class="fa fa-user-circle"></i> ACCOUNT</a>
                     @endguest
                     @auth
                     <a href="{{ route('dashboard.user') }}" class="btn search-button btn-md d-none d-md-block ml-4"><i
                        class="fa fa-user-circle"></i> ACCOUNT</a>
                     @endauth
                  </div>

               </div>
            </div>
         </div>
      </div>
   </section>
</header>