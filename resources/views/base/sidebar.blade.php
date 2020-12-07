<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">

      <h5 class="logo-text"> @yield('title',config('app.name'))</h5>

    </div>
    <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MENU</li>
     <li>
       <a href="{{ url('/home') }}" class="waves-effect">
         <i class="icon-home"></i> <span>HOME</span>
       </a>

     </li>
     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-briefcase"></i>
         <span>PRODUITS</span> <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="{{url('unitemesures')}}"><i class="fa fa-circle-o"></i>UNITE DE MESURE</a></li>
         <li><a href="{{url('categories')}}"><i class="fa fa-circle-o"></i>CATEGORIE</a></li>
         <li><a href="{{url('produits')}}"><i class="fa fa-circle-o"></i>PRODUIT</a></li>

       </ul>
     </li>

     <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-briefcase"></i>
          <span>FOURNISSEURS</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{url('fournisseurs')}}"><i class="fa fa-circle-o"></i> FOURNISSEURS</a></li>

        </ul>
      </li>

      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-note"></i> <span>MODE DE PAIEMENT</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{url('mode_paiements')}}"><i class="fa fa-circle-o"></i>MODE DE PAIEMENT</a></li>

        </ul>
      </li>


     <li>
       <a href="javaScript:void();" class="waves-effect">
         <i class="icon-note"></i> <span>LES ENTRES</span>
         <i class="fa fa-angle-left pull-right"></i>
       </a>
       <ul class="sidebar-submenu">
         <li><a href="{{url('magasins')}}"><i class="fa fa-circle-o"></i>MAGASIN</a></li>
         <li><a href="{{url('typeentrees')}}"><i class="fa fa-circle-o"></i>TYPE D'ENTRE</a></li>
         <li><a href="{{url('entres')}}"><i class="fa fa-circle-o"></i> LES ENTRES</a></li>
         <!--<li><a href="{{url('entre_details')}}"><i class="fa fa-circle-o"></i>ENTRES DETAILS</a></li>-->

       </ul>
     </li>

   </ul>

  </div>
