<div class="row no-margin padding-5 border-bottom">
<div class="calc-parent">
    <div class="calc-left-controls">
        {{--<!-- <button class="btn calc-left-controls__item btn-danger">
            <i class="fa  fa-times-circle"></i>
            <p>Cancel</p>
        </button> -->--}}
        {{--<!--Copied this part By Asmaa from pos_form_actions.blade.php-->--}}
        @if(empty($edit))
            <button type="button" class="btn calc-left-controls__item btn-danger" id="pos-cancel"> <i class="fa  fa-times-circle"></i><p> @lang('sale.cancel')</p></button>
        @else
            <button type="button" class="btn calc-left-controls__item btn-danger" id="pos-delete"> <i class="fas fa-trash-alt"></i> @lang('messages.delete')</button>
        @endif


        {{--<!-- <button class="btn calc-left-controls__item bg-yellow">
            <i class="fa fa-pause-circle"></i>
            <p>Suspend</p>
        </button> -->--}}
        {{--<!--Copied suspend btn By Asmaa from pos_form_actions.blade.php-->--}}
        @if(empty($pos_settings['disable_suspend']))
            <button type="button" 
            class="btn calc-left-controls__item bg-yellow no-print pos-express-finalize" 
            data-pay_method="suspend"
            title="@lang('lang_v1.tooltip_suspend')" >
            <i class="fas fa-pause-circle" aria-hidden="true"></i>
            <p>@lang('lang_v1.suspend')</p>
            </button>
        @endif

        <button class="btn calc-left-controls__item gray-btn">
            <i class="fas fa-unlock"></i>
            <p>New Bill</p>
        </button>
        <!-- <button class="btn calc-left-controls__item purple-btn">
            <i class="fa fa-file-alt"></i>
            <p>Quotation</p>
        </button> -->
        {{--<!--Copied quotation btn By Asmaa from pos_form_actions.blade.php-->--}}
        <button type="button" class="btn calc-left-controls__item purple-btn" id="pos-quotation"><i class="fa fa-file-alt"></i><p> @lang('lang_v1.quotation')</p></button>
    </div>
    <div class="calc-numbers">
        <div class="calc-number-column">
            <div>
                <div class="calc-number-row">
                    <button class="btn calc-number num">1</button>
                    <button class="btn calc-number num">4</button>
                    <button class="btn calc-number num">7</button>
                    <button class="btn calc-number num">.</button>
                </div>
            </div>
            <div>
                <div class="calc-number-row">
                    <button class="btn calc-number num">2</button>
                    <button class="btn calc-number num">5</button>
                    <button class="btn calc-number num">8</button>
                    <button class="btn calc-number num">0</button>
                </div>
            </div>
            <div>
                <div class="calc-number-row">
                    <button class="btn calc-number num">3</button>
                    <button class="btn calc-number num">6</button>
                    <button class="btn calc-number num">9</button>
                    <button class="btn calc-number num">1</button>
                </div>
            </div>
            <div>
                <div class="calc-number-row calc-num-control">
                    <button class="btn calc-number btn-success">Qty</button>
                    <button class="btn calc-number gray-txt">Rate</button>
                    <button class="btn calc-number gray-txt">Clear</button>
                    <button class="btn calc-number gray-txt">Enter</button>
                </div>
            </div>
        </div>
        <div class="calc-save">
            <div class="">
                <!-- <button class="btn calc-left-controls__item cyan-btn full-width">
                    <i class="fa fa-pencil-alt"></i>
                    <p>Draft</p>
                </button> -->
                {{--<!--Copied draft btn By Asmaa from pos_form_actions.blade.php-->--}}
                <button type="button" class="btn calc-left-controls__item cyan-btn full-width @if($pos_settings['disable_draft'] != 0) hide @endif" id="pos-draft"><i class="fas fa-edit"></i><p> @lang('sale.draft')</p></button>
            </div>
            <div>
                <button class="btn calc-left-controls__item green-btn btn-success full-width" data-toggle="modal" data-target="#exampleModal" type="button">
                    <p>@lang('sale.saveandpay')</p>
                    <i class="fas fa-money-bill-alt"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    
                </button>
            </div>
        </div>
    </div>
</div>
</div>