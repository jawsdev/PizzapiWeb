@extends("layouts.master-template")
@section("title", "My Account")
@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="row">
                <div class="col s12 alert l10 offset-l2 center-align">
                    <div id="charge-message" class="card-panel green accent-1 black-text">
                        <p class="flow-text">{{ Session::get('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session()->has('flash_notification.message'))
            <div class="row">
                <div class="col s12 l10 offset-l1 alert center-align">
                    <div class="card-panel green accent-3 alert alert-{{ session('flash_notification.level') }}">
                        <h4 class="gret-text">{!! session('flash_notification.message') !!}</h4>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col s12 l5">
                <h5>My Orders</h5>
                    @foreach($orders->sortByDesc('id')  as $order)
                        <ul class="collection with-header">
                            <li class="collection-header grey lighten-2">
                                <h5>Ordered: {{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</h5></li>
                            @foreach($order->cart->items as $item)
                                <li class="collection-item">{{ $item['qty'] }} x {{ $item['item']['title'] }} | Price:
                                    £{{ $item['price'] }}</li>
                            @endforeach
                            <li class="collection-header grey lighten-4"><h6>Total Price:
                                    £{{ $order->cart->totalPrice }}</h6></li>
                        </ul>
                    @endforeach
                    <span>
                @include('partials.pagination', ['paginator' => $orders])
                </span>
            </div>
            <div class="col s12 l7">
                <h5>My Details</h5>
                <div class="row">
                    <div class="col s12">
                        <form action="{{ route('user.update_details') }}" method="post">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input placeholder="Placeholder" value="{{ $user_info['first_name'] }}"
                                           name="first_name" id="first_name" type="text" class="validate">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" value="{{ $user_info['last_name'] }}" name="last_name"
                                           type="text" class="validate">
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="email" value="{{ $user_info['email'] }}" type="email" name="email"
                                           class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="phone_number" value="{{ $user_info['phone_number'] }}"
                                           name="phone_number" type="number" class="validate">
                                    <label for="phone_number">Phone Number</label>
                                </div>
                            </div>
                            <div class="row no_bottom_margin">
                                <div class="input-field col s12">
                                    <input id="address" value="{{ $user_info['address'] }}" name="address" type="text"
                                           class="validate">
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    {{ csrf_field() }}
                                    <button class="btn waves-effect waves-light pizzapi-red" type="submit"
                                            name="action">Update Details
                                        <i class="material-icons right">save</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('user.update_password') }}" method="post">
                            <div class="row no_bottom_margin">
                                <div class="input-field col s12">
                                    <input id="new_password" type="password" name="new_password" class="validate">
                                    <label for="new_password">New Password</label>
                                </div>
                            </div>
                            <div class="row no_bottom_margin">
                                <div class="input-field col s12">
                                    <input id="confirm_password" type="password" name="confirm_password" class="validate">
                                    <label for="confirm_password">Confirm Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn waves-effect disabled waves-light pizzapi-red" type="submit"
                                            name="action">Update Password
                                        <i class="material-icons right">save</i>
                                    </button>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@endsection