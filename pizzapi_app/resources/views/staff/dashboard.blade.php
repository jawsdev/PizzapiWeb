@extends('layouts.dashboard-template')
@section("title", "Orders")
@section('content')
    <div class="row">
        <div class="col-lg-9 col-xs-12">
            <h3>Orders
                <small>Open</small>
            </h3>
            <hr/>
            @foreach($orders_open  as $order)
                <form action="{{ route('order_complete') }}" method="post">
                    <div class="col-lg-4 col-xs-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <div class="row">

                                        <div class="col-xs-12 col-lg-6">

                                            <a role="button"
                                               class="btn btn-danger" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapse{{ $order->id}}"
                                               aria-expanded="true" aria-controls="collapse{{ $order->id}}">
                                                <i class="fa fa-cc-stripe fa-lg fa-fw" aria-hidden="true"></i>&nbsp;
                                                Order#: <span class="badge open_order_num">{{ $order->id}}</span>
                                            </a>

                                        </div>
                                        <div class="col-xs-12 col-lg-6">
                                            <div class="pull-right">
                                                @if ($order->service === 'delivery')
                                                    <span title="{{ $order->first_name}} has asked for delivery"
                                                          data-placement="bottom" data-toggle="tooltip">
                                            <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                                            </span>
                                                @else
                                                    <span title="{{ $order->first_name}} will be picking up"
                                                          data-placement="bottom" data-toggle="tooltip">
                                            <i class="fa fa-hand-rock-o fa-2x" aria-hidden="true"></i>
                                            </span>
                                                @endif
                                                <span title="Print box label" data-placement="bottom" data-toggle="tooltip">
                                        <a class="grey-text" data-toggle="modal" data-target="#myModal"
                                           href="#">&nbsp;<i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h6 class="pull-left"><i class="fa fa-calendar fa-fw"
                                                                     aria-hidden="true"></i>&nbsp;{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                                            </h6>
                                            <h6 class="pull-right"><i class="fa fa-clock-o  fa-fw"
                                                                      aria-hidden="true"></i>&nbsp;{{ Carbon\Carbon::parse($order->created_at)->format('H:i:s') }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse{{ $order->id}}" class="panel-collapse collapse in fade" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        @foreach($order->cart->items as $item)
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <span class="badge">{{ $item['qty'] }}</span>
                                                    <strong>{{ $item['item']['code'] }}</strong> - <small>{{ $item['item']['title'] }}</small>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4>
                                        <i class="fa fa-user fa-pull-left fa fa-fw" aria-hidden="true"></i>

                                        <a class="grey-text" role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse-sub{{ $order->id}}" aria-expanded="false"
                                           aria-controls="collapse-sub{{ $order->id}}">
                                            {{ $order->first_name}} {{ $order->last_name}}
                                        </a>

                                    </h4>
                                </div>
                                <div id="collapse-sub{{ $order->id}}" class="panel-collapse collapse in fade" role="tabpanel"
                                     aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a class="list-group-item" data-toggle="tooltip"
                                               title="Call {{ $order->first_name}}" data-placement="left"
                                               href="callto://+{{ $order->phone_number}}"><i class="fa fa-phone fa-fw"
                                                                                             aria-hidden="true"></i>&nbsp; {{ $order->phone_number}}
                                            </a>
                                            <li class="list-group-item" href="#">
                                                <address><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i>&nbsp; {{ $order->address}}</address>
                                            </li>
                                            @if($order->delivery_info !== '')
                                                <li class="list-group-item" href="#"><i class="fa fa-info fa-fw"
                                                                                        aria-hidden="true"></i>&nbsp; {{ $order->delivery_info }}
                                                </li>
                                            @endif
                                            <li class="list-group-item" href="#"><i class="fa fa-credit-card fa-fw"
                                                                                    aria-hidden="true"></i>&nbsp; {{ $order->payment_name}}
                                            </li>
                                            <a title="View transaction details" data-placement="left" data-toggle="tooltip"
                                               target="_blank" class="list-group-item"
                                               href="https://dashboard.stripe.com/test/payments/{{ $order->payment_id}}"><i
                                                        class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp;
                                                <small>{{ $order->payment_id}}</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-success pull-right btn complete_button"><span class="text-uppercase">Complete</span> &nbsp;<i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                        <input name="orderid" type="hidden" value="{{ $order->id}}">
                    {{ csrf_field() }}

                </form>
        </div>
        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs-block"></div>
        @endforeach
        <div class="row">
            <div class="col-xs-12 col-lg-6 col-lg-offset-3 cen">
                {{ $orders_open->links() }}
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <h3>Orders
            <small>Complete</small>
        </h3>
        <hr/>
        @foreach($orders_closed  as $order)
            <div class="col-md-12 col-xs-12 orders_complete_div">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <a role="button"
                                       class="btn btn-success" data-toggle="collapse"
                                       data-parent="#accordion"
                                       href="#collapse{{ $order->id}}"
                                       aria-expanded="true" aria-controls="collapse{{ $order->id}}">
                                        <i class="fa fa-cc-stripe fa-lg fa-fw" aria-hidden="true"></i>&nbsp;
                                        Order#: <span class="badge closed_order_num">{{ $order->id}}</span>
                                    </a>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <div class="pull-right">
                                        @if ($order->service === 'delivery')
                                            <span title="{{ $order->first_name}} has asked for delivery"
                                                  data-placement="bottom" data-toggle="tooltip">
                                            <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
                                            </span>
                                        @else
                                            <span title="{{ $order->first_name}} will be picking up"
                                                  data-placement="bottom" data-toggle="tooltip">
                                            <i class="fa fa-hand-rock-o fa-2x" aria-hidden="true"></i>
                                            </span>
                                        @endif
                                        <span title="Print box label" data-placement="bottom" data-toggle="tooltip">
                                        <a class="grey-text" data-toggle="modal" data-target="#myModal"
                                           href="#">&nbsp;<i class="fa fa-print fa-2x" aria-hidden="true"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <h6 class="pull-left"><i class="fa fa-calendar fa-fw"
                                                             aria-hidden="true"></i>&nbsp;{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                                    </h6>
                                    <h6 class="pull-right"><i class="fa fa-clock-o  fa-fw"
                                                              aria-hidden="true"></i>&nbsp;{{ Carbon\Carbon::parse($order->created_at)->format('H:i:s') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{ $order->id}}" class="panel-collapse collapse in fade" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                @foreach($order->cart->items as $item)
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge">{{ $item['qty'] }}</span>
                                            <strong>{{ $item['item']['code'] }}</strong> - <small>{{ $item['item']['title'] }}</small>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4>
                                <i class="fa fa-user fa-pull-left fa fa-fw" aria-hidden="true"></i>
                                <a class="grey-text" role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse-sub{{ $order->id}}" aria-expanded="false"
                                   aria-controls="collapse-sub{{ $order->id}}">
                                    {{ $order->first_name}} {{ $order->last_name}}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-sub{{ $order->id}}" class="panel-collapse collapse in fade" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="list-group">
                                    <a class="list-group-item" data-toggle="tooltip"
                                       title="Call {{ $order->first_name}}" data-placement="left"
                                       href="callto://+{{ $order->phone_number}}"><i class="fa fa-phone fa-fw"
                                                                                     aria-hidden="true"></i>&nbsp; {{ $order->phone_number}}
                                    </a>
                                    <li class="list-group-item" href="#">
                                        <address><i class="fa fa-home fa-fw"
                                                    aria-hidden="true"></i>&nbsp; {{ $order->address}}</address>
                                    </li>
                                    @if($order->delivery_info !== '')
                                        <li class="list-group-item" href="#"><i class="fa fa-info fa-fw"
                                                                                aria-hidden="true"></i>&nbsp; {{ $order->delivery_info }}
                                        </li>
                                    @endif
                                    <li class="list-group-item" href="#"><i class="fa fa-credit-card fa-fw"
                                                                            aria-hidden="true"></i>&nbsp; {{ $order->payment_name}}
                                    </li>
                                    <a target="_blank" class="list-group-item"
                                       href="https://dashboard.stripe.com/test/payments/{{ $order->payment_id}}"><i
                                                class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp;
                                        <small>{{ $order->payment_id}}</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Optional: clear the XS cols if their content doesn't match in height -->
        @endforeach
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Print Label</h4>
                </div>
                <div class="modal-body">
                    <div class="printableArea">
                        <div class="print-label">
                            <div class="row">
                                <div class="col-xs-5">
                                    <small><strong>#0{{ $order->id}}</strong></small>
                                    <br>
                                    <small>{{ $order->phone_number}}</small>
                                </div>
                                <div class="col-xs-5">
                                    <small><strong>PAID</strong></small>
                                    <br>
                                    <small>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</small>
                                </div>
                                <div class="col-xs-2">
                                    <img class="label-logo pull-right" src="{{ URL::to('img/logoredsymbol.png') }}"
                                         alt="Print Logo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <small><strong><span class="text-uppercase">{{ $order->last_name}}
                                                ,</span> {{ $order->first_name}}</strong></small>
                                    <br>
                                    <small><strong>{{ $order->address}}</strong></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" href="javascript:void(0);" id="printButton"><i
                                class="fa fa-print fa-2x fa fa-fw" aria-hidden="true"></i></a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::to('src/assets/print/jquery.PrintArea.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#printButton").click(function () {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {mode: mode, popClose: close};
                $("div.printableArea").printArea(options);
            });
        });

        $('.more').on('click', function() {
            $('orders_complete_div').css("overflow", function(_,val){
                return val == "hidden" ? "scroll" : "hidden";
            });
        });
    </script>
@endsection