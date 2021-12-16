<!--Test for git-->
<!-- default value -->
@php
    $go_back_url = action('SellPosController@index');
    $transaction_sub_type = '';
    $view_suspended_sell_url = action('SellController@index').'?suspended=1';
    $pos_redirect_url = action('SellPosController@create');
@endphp

@if(!empty($pos_module_data))
    @foreach($pos_module_data as $key => $value)
        @php
            if(!empty($value['go_back_url'])) {
                $go_back_url = $value['go_back_url'];
            }

            if(!empty($value['transaction_sub_type'])) {
                $transaction_sub_type = $value['transaction_sub_type'];
                $view_suspended_sell_url .= '&transaction_sub_type='.$transaction_sub_type;
                $pos_redirect_url .= '?sub_type='.$transaction_sub_type;
            }
        @endphp
    @endforeach
@endif
<div class="left-icons no-print">
    
    <div class="logo">
        <a href="#">
            <img src="{{asset('/img/logo.png')}}" alt="TheHub Logo" class="logo-responsive">
        </a>
    </div>
    <div class="left-control-icons">
        <button type="button" title="{{ __('lang_v1.full_screen') }}" class="control-icons btn btn-xs cyan-btn" id="full_screen">
                <strong><i class="fa fa-expand-alt fa-icon-border"></i></strong>
                <p>@lang('lang_v1.full_screen_f11')</p>
        </button>
        @can('close_cash_register')
        <button type="button" id="close_register" title="{{ __('cash_register.close_register') }}" class="control-icons btn btn-modal btn-xs btn-danger" data-container=".close_register_modal" 
            data-href="{{ action('CashRegisterController@getCloseRegister')}}">
                <strong><i class="fa fa-sign-out-alt"></i></strong>
                <p class="m-t-5">@lang('lang_v1.close-register')</p>
        </button>
        @endcan


        <button title="@lang('lang_v1.calculator')" id="btnCalculator" type="button" class="btn btn-success control-icons btn-xs mt-10 popover-default" data-toggle="popover" data-trigger="click" data-content='@include("layouts.partials.calculator")' data-html="true" data-placement="bottom">
                <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
                <p class="m-t-5">@lang('lang_v1.calculator')</p>
        </button>
        <button type="button" id="view_suspended_sales" title="{{ __('lang_v1.view_suspended_sales') }}" class="btn bg-yellow control-icons btn-xs m-5" data-container=".view_modal" 
            data-href="{{$view_suspended_sell_url}}">
                <strong><i class="fa fa-pause-circle fa-lg"></i></strong>
                <p class="m-t-5">@lang('lang_v1.view-suspended')</p>
        </button>
        @if(!isset($pos_settings['hide_recent_trans']) || $pos_settings['hide_recent_trans'] == 0)
        <button type="button" class="btn cyan-btn control-icons btn-xs m-5" title="{{ __('lang_v1.recent_transactions') }}"  data-toggle="modal" data-target="#recent_transactions_modal" id="recent-transactions"> <i class="fas fa-clock"></i> <p>@lang('lang_v1.recent_transactions')</p></button>
        @endif
        
        @if(isset($transaction))
            @include('sale_pos.partials.edit_discount_modal', ['sales_discount' => $transaction->discount_amount, 'discount_type' => $transaction->discount_type, 'rp_redeemed' => $transaction->rp_redeemed, 'rp_redeemed_amount' => $transaction->rp_redeemed_amount, 'max_available' => !empty($redeem_details['points']) ? $redeem_details['points'] : 0])
        @else
            @include('sale_pos.partials.edit_discount_modal', ['sales_discount' => $business_details->default_sales_discount, 'discount_type' => 'percentage', 'rp_redeemed' => 0, 'rp_redeemed_amount' => 0, 'max_available' => 0])
        @endif

        @if(isset($transaction))
            @include('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->tax_id])
        @else
            @include('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $business_details->default_sales_tax])
        @endif

        @include('sale_pos.partials.edit_shipping_modal')


        @can('view_cash_register')
        <button type="button" id="register_details" title="{{ __('cash_register.register_details') }}" class="btn control-icons btn-xs purple-btn" data-container=".register_details_modal" 
            data-href="{{ action('CashRegisterController@getRegisterDetails')}}">
                <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
                <p class="m-t-5">@lang('lang_v1.register-details')</p>
        </button>
        @endcan

        
        @if(empty($pos_settings['hide_product_suggestion']) && isMobile())
            <button type="button" title="{{ __('lang_v1.view_products') }}"   
            data-placement="bottom" class="btn control-icons btn-success  btn-xs m-5 btn-modal" data-toggle="modal" data-target="#mobile_product_suggestion_modal">
                <strong><i class="fa fa-cubes fa-lg"></i></strong>
                <p>@lang('lang_v1.view_products')</p>
            </button>
        @endif

        @if(Module::has('Repair') && $transaction_sub_type != 'repair')
            @include('repair::layouts.partials.pos_header')
        @endif

        @if(in_array('pos_sale', $enabled_modules) && !empty($transaction_sub_type))
          @can('sell.create')
            <a href="{{action('SellPosController@create')}}" title="@lang('sale.pos_sale')" class="btn btn-success btn-flat m-6 btn-xs m-5 pull-right">
              <strong><i class="fa fa-th-large"></i> &nbsp; @lang('sale.pos_sale')</strong>
            </a>
          @endcan
        @endif
    </div>
</div>