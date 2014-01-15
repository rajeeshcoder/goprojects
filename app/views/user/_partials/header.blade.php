<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
      <div class="container">
         <ul class="nav"> 
            @include('user._partials.navigation')  
            @if (!Sentry::check() || !Sentry::getUser()->hasAccess(['user']) )
               <li>{{ HTML::link('user/register', 'Register') }}</li>  
               <li>{{ HTML::link('user/login', 'Login') }}</li>
            @endif
         </ul> 
      </div>
   </div>
</div>