@php
	$is_mobile = isMobile();
@endphp


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left" id="exampleModalLabel"> @lang('sale.saveandpay')</h5>
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		@if(empty($pos_settings['disable_credit_sale_button']))
				<input type="hidden" name="is_credit_sale" value="0" id="is_credit_sale">
				<button type="button" 
				class="btn bg-purple btn-default btn-flat no-print pos-express-finalize col-xs-6 @if($is_mobile) col-xs-6 @endif p-15" 
				data-pay_method="credit_sale"
				title="@lang('lang_v1.tooltip_credit_sale')" data-dismiss="modal" >
					<i class="fas fa-check" aria-hidden="true"></i> @lang('lang_v1.credit_sale')
				</button>
			@endif
			<button type="button" 
				class="btn bg-maroon btn-default btn-flat no-print @if(!empty($pos_settings['disable_suspend'])) @endif pos-express-finalize @if(!array_key_exists('card', $payment_types)) hide @endif col-xs-6 @if($is_mobile) col-xs-6 @endif p-15" 
				data-pay_method="card"
				title="@lang('lang_v1.tooltip_express_checkout_card')" data-dismiss="modal">
				<i class="fas fa-credit-card" aria-hidden="true"></i> @lang('lang_v1.express_checkout_card')
			</button>

			<button type="button" class="btn bg-navy btn-default @if(!$is_mobile) @endif btn-flat no-print @if($pos_settings['disable_pay_checkout'] != 0) hide @endif col-xs-6 @if($is_mobile) col-xs-6 @endif p-15" id="pos-finalize" title="@lang('lang_v1.tooltip_checkout_multi_pay')" data-dismiss="modal"><i class="fas fa-money-check-alt" aria-hidden="true"></i> @lang('lang_v1.checkout_multi_pay') </button>

			<button type="button" class="btn btn-success @if(!$is_mobile) @endif btn-flat no-print @if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)) hide @endif pos-express-finalize col-xs-6 @if($is_mobile) col-xs-6 @endif p-15" data-pay_method="cash" title="@lang('tooltip.express_checkout')" data-dismiss="modal"> <i class="fas fa-money-bill-alt" aria-hidden="true"></i> @lang('lang_v1.express_checkout_cash')</button>
			<div class="clearfix"></div>
			<hr class="gray-border-top">
			@if(!$is_mobile)
			<div class="text-center ">
				&nbsp;&nbsp;
				<b>@lang('sale.total_payable'):</b>
				<input type="hidden" name="final_total" 
											id="final_total_input" value=0>
				<span id="total_payable" class="text-success lead text-bold">0</span>
				&nbsp;&nbsp;
			</div>
			@endif

			@if($is_mobile)
				<div class="col-md-12 text-right">
					<b>@lang('sale.total_payable'):</b>
					<input type="hidden" name="final_total" 
												id="final_total_input" value=0>
					<span id="total_payable" class="text-success lead text-bold text-right">0</span>
				</div>
			@endif
      </div>
      {{--<!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->--}}
    </div>
  </div>
</div>

<div class="row">
	<div class="pos-form-actions">
		<div class="col-md-12">
			

			{{----<!--Move this part by Asmaa to pos-numbers-keyboard.blade.php-->}}
			<!-- <button type="button" class="@if($is_mobile) col-xs-6 @endif btn bg-info text-white btn-default btn-flat @if($pos_settings['disable_draft'] != 0) hide @endif" id="pos-draft"><i class="fas fa-edit"></i> @lang('sale.draft')</button> -->

			{{----<!--Move this part by Asmaa to pos-numbers-keyboard.blade.php-->}}
			{{--<!-- <button type="button" class="btn btn-default bg-yellow btn-flat @if($is_mobile) col-xs-6 @endif" id="pos-quotation"><i class="fas fa-edit"></i> @lang('lang_v1.quotation')</button> -->--}}

			{{----<!--Move this part by Asmaa to pos-numbers-keyboard.blade.php-->}}
			{{--<!-- @if(empty($pos_settings['disable_suspend']))
				<button type="button" 
				class="@if($is_mobile) col-xs-6 @endif btn bg-red btn-default btn-flat no-print pos-express-finalize" 
				data-pay_method="suspend"
				title="@lang('lang_v1.tooltip_suspend')" >
				<i class="fas fa-pause" aria-hidden="true"></i>
				@lang('lang_v1.suspend')
				</button>
			@endif -->--}}



			{{----<!--Move this part by Asmaa to pos-numbers-keyboard.blade.php-->}}
			{{--<!-- @if(empty($edit))
				<button type="button" class="btn btn-danger btn-flat @if($is_mobile) col-xs-6 @else btn-xs @endif" id="pos-cancel"> <i class="fas fa-window-close"></i> @lang('sale.cancel')</button>
			@else
				<button type="button" class="btn btn-danger btn-flat hide @if($is_mobile) col-xs-6 @else btn-xs @endif" id="pos-delete"> <i class="fas fa-trash-alt"></i> @lang('messages.delete')</button>
			@endif -->--}}

			{{--<!--Move this part by Asmaa Recent Transaction to vertical-pos-panel.blade.php-->--}}
			{{--<!-- @if(!isset($pos_settings['hide_recent_trans']) || $pos_settings['hide_recent_trans'] == 0)
			<button type="button" class="btn btn-primary btn-flat pull-right @if($is_mobile) col-xs-6 @endif" data-toggle="modal" data-target="#recent_transactions_modal" id="recent-transactions"> <i class="fas fa-clock"></i> @lang('lang_v1.recent_transactions')</button>
			@endif -->--}}
			
		</div>
	</div>
</div>

{{--<!--Copied this part by Asmaa to vertical-pos-panel.blade.php-->--}}
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