@inject('request', 'Illuminate\Http\Request')
<!-- Main Header -->
  <header class="main-header no-print" style="overflow: hidden; position: fixed; width: 100%; top: 0;">
    <a href="{{route('home')}}" class="logo">
      
      <span class="logo-lg">{{ Session::get('business.name') }} <i class="fa fa-circle text-success" id="online_indicator"></i></span> 

    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        &#9776;
        <span class="sr-only">Toggle navigation</span>
      </a>

      @if(Module::has('Superadmin'))
        @includeIf('superadmin::layouts.partials.active_subscription')
      @endif

        @if(!empty(session('previous_user_id')) && !empty(session('previous_username')))
            <a href="{{route('sign-in-as-user', session('previous_user_id'))}}" class="btn btn-flat btn-danger m-8 btn-sm mt-10"><i class="fas fa-undo"></i> @lang('lang_v1.back_to_username', ['username' => session('previous_username')] ) </a>
        @endif

      <!--   <span>{{ Auth::User()->first_name }} {{ Auth::User()->last_name }}</span> -->

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

        @if(Module::has('Essentials'))
          @includeIf('essentials::layouts.partials.header_part')
        @endif

        <div class="btn-group">
          <!-- <button id="header_shortcut_dropdown" type="button" class="btn btn-success dropdown-toggle btn-flat pull-left m-8 btn-sm mt-10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-plus-circle fa-lg"></i>
          </button> -->

          
        <ul class="nav navbar-nav">
          @include('layouts.partials.header-notifications')
          <!-- User Account Menu -->
        </ul>

          <button  class="btn btn-success dropdown-toggle btn-flat pull-left m-8 btn-sm mt-10" style="color: #fff;">
            <strong>{{ @format_date('now') }}</strong>
          </button>

          <ul class="dropdown-menu">
            @if(config('app.env') != 'demo')
              <li><a href="{{route('calendar')}}">
                  <i class="fas fa-calendar-alt" aria-hidden="true"></i> @lang('lang_v1.calendar')
              </a></li>
            @endif
            @if(Module::has('Essentials'))
              <li><a href="#" class="btn-modal" data-href="{{action([\Modules\Essentials\Http\Controllers\ToDoController::class, 'create'])}}" data-container="#task_modal">
                  <i class="fas fa-clipboard-check" aria-hidden="true"></i> @lang( 'essentials::lang.add_to_do' )
              </a></li>
            @endif
            <!-- Help Button -->
            @if(auth()->user()->hasRole('Admin#' . auth()->user()->business_id))
              <li><a id="start_tour" href="#">
                  <i class="fas fa-question-circle" aria-hidden="true"></i> @lang('lang_v1.application_tour')
              </a></li>
            @endif
          </ul>
        </div>
        @if($request->segment(1) == 'pos')
          @can('view_cash_register')
          <button type="button" id="register_details" title="{{ __('cash_register.register_details') }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 btn-sm mt-10 btn-modal" data-container=".register_details_modal" 
          data-href="{{ action([\App\Http\Controllers\CashRegisterController::class, 'getRegisterDetails'])}}">
            <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
          </button>
          @endcan
          @can('close_cash_register')
          <button type="button" id="close_register" title="{{ __('cash_register.close_register') }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-danger btn-flat pull-left m-8 btn-sm mt-10 btn-modal" data-container=".close_register_modal" 
          data-href="{{ action([\App\Http\Controllers\CashRegisterController::class, 'getCloseRegister'])}}">
            <strong><i class="fa fa-window-close fa-lg"></i></strong>
          </button>
          @endcan
        @endif

        @if(in_array('pos_sale', $enabled_modules))
          @can('sell.create')
            <a href="{{action([\App\Http\Controllers\SellPosController::class, 'create'])}}" title="@lang('sale.pos_sale')" data-toggle="tooltip" data-placement="bottom" class="btn btn-flat pull-left m-8 btn-sm mt-10 btn-success">
              <strong><i class="fa fa-th-large"></i> &nbsp; @lang('sale.pos_sale')</strong>
            </a>
          @endcan
        @endif

        @if(Module::has('Repair'))
          @includeIf('repair::layouts.partials.header')
        @endif

        @can('profit_loss_report.view')
          <button type="button" id="view_todays_profit" title="{{ __('home.todays_profit') }}" data-toggle="tooltip" data-placement="bottom" class="btn btn-success btn-flat pull-left m-8 btn-sm mt-10">
            <strong><i class="fas fa-money-bill-alt fa-lg"></i></strong>
          </button>
        @endcan

        
        <div class="btn btn-success dropdown-toggle btn-flat pull-left m-8 btn-sm mt-10" style="color: #fff;">
            <a href="{{action([\App\Http\Controllers\UserController::class, 'getProfile'])}}" style="color: #fff;">@lang('lang_v1.profile')</a>  |
            <a href="{{action([\App\Http\Controllers\Auth\LoginController::class, 'logout'])}}" style="color: #fff;">@lang('lang_v1.sign_out')</a>
        </div>

      </div>
    </nav>
  </header>