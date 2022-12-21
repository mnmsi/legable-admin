@extends("layouts.app")
@section('title','Billing Information')
@section('content')
    @include('includes.pageHeader',['title'=>"Billing Information's",'list'=>['Dashboard','Plans & Subscriptions'],'btn'=>[],'link'=>[]])
    <div class="block-min-height block-wrapper">
        {{--  main page content--}}
        {{--        title bar start--}}
        <div class="my-plan-title-bar payment-method-title">
            <p>Payment Methods</p>
            <div class="add-payment-button"><a href=""><img src="{{asset("image/common/squire-add.svg")}}" alt=""></a>
            </div>
        </div>
        {{-- title bar end--}}
        {{--   payment getway start  --}}
        <div class="">
            <div class="payment-card-wrapper">
                {{--            single payment card start--}}
                @foreach($cards as $card)
                    <label for="{{$card['brand']}}">
                        <div class="single-payment-card active">
                            <div class="single-payment-card-header">
                                <div class="card-name">{{$card['name']}}</div>
                                @if($card['is_active'])
                                    <input type="radio" name="card" id="master" checked>
                                    <div class="selected-sign">
                                        <img src="{{asset("image/billing/tick.svg")}}" alt="">
                                    </div>
                                @else
                                    <a href="{{route('billing.card.active', $card['id'])}}">
                                        <img src="{{asset("image/billing/ellipse_outlined.svg")}}" alt="">
                                    </a>
                                @endif
                            </div>
                            <div class="payment-card-body">
                                <div class="payment-method-logo">
                                    <img src="{{asset("image/billing/".$card['brand'].".svg")}}" alt="">
                                </div>
                                <div class="encrypted">
                                    <img src="{{asset("image/billing/encrypted.svg")}}" alt="">
                                </div>
                                <div class="card-digit">
                                    {{$card['number']}}
                                </div>
                            </div>
                            <div class="payment-card-footer">
                                <div class="minus-action">
                                    <a href="{{route('billing.card.delete', $card['id'])}}"><img
                                            src="{{asset("image/billing/minus.svg")}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </label>
                @endforeach

                <a href="{{route("billing.card.add")}}">
                    <div class="single-payment-card add-card">
                        <img src="{{asset("image/billing/plus.svg")}}" alt="">
                    </div>
                </a>
                {{--            single payment card end--}}
            </div>
            {{--   payment getway end  --}}
            {{--        billing history start--}}
            <div class="my-plan-title-bar payment-method-title mt-5 mb-4 ">
                <p>Billing History</p>
            </div>
            <div class="billing-history d-lg-block d-none ">
                <table class="table w-100 table-borderless">
                    <thead>
                    <tr>
                        <th>DATE</th>
                        <th>DETAILS</th>
                        <th>AMOUNT</th>
                        <th>DOWNLOAD INVOICE</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <tr>--}}
                    {{--                        <td>30 June 2022</td>--}}
                    {{--                        <td>Legable Premium Plan</td>--}}
                    {{--                        <td class="pe-5"><strong>$ 30.00</strong></td>--}}
                    {{--                        <td><a href="">Download</a></td>--}}
                    {{--                    </tr>--}}
                    @foreach($billings as $item)
                        <tr class="ps-5">
                            <td>{{$item['date']}}</td>
                            <td>{{$item['details']}}</td>
                            <td class="pe-5"><strong>${{$item['amount']}}</strong></td>
                            <td><a href="{{$item['download']}}">Download</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--        billing history for mobile responsive start--}}
            <div class="res-single-table-content">
                <div class="res-single-table-header">
                    <div class="res-single-date">30 June 2022</div>
                    <div class="res-single-price">$ 30.00</div>
                </div>
                <div class="res-table-body">
                    <div class="res-plan-text">Legable Premium Plan</div>
                    <div class="res-plan-download">
                        <a href="#">Download</a>
                    </div>
                </div>
            </div>
            {{--        billing history for mobile responsive end--}}
            {{--        billing history for mobile responsive start--}}
            <div class="res-single-table-content">
                <div class="res-single-table-header">
                    <div class="res-single-date">30 June 2022</div>
                    <div class="res-single-price">$ 30.00</div>
                </div>
                <div class="res-table-body">
                    <div class="res-plan-text">Legable Premium Plan</div>
                    <div class="res-plan-download">
                        <a href="#">Download</a>
                    </div>
                </div>
            </div>
            {{--        billing history for mobile responsive end--}}
            {{--        billing history for mobile responsive start--}}
            <div class="res-single-table-content">
                <div class="res-single-table-header">
                    <div class="res-single-date">30 June 2022</div>
                    <div class="res-single-price">$ 30.00</div>
                </div>
                <div class="res-table-body">
                    <div class="res-plan-text">Legable Premium Plan</div>
                    <div class="res-plan-download">
                        <a href="#">Download</a>
                    </div>
                </div>
            </div>
            {{--        billing history for mobile responsive end--}}
            {{--        billing history end--}}
            {{--  main page end--}}
        </div>
@endsection
