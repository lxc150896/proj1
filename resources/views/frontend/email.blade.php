<base href="{{ asset('bower_components/frontend') }}/">
<link rel="stylesheet" href="css/email.css">
<font face="Arial">
    <div class="title">
        <h3>{{ trans('frontend.customerInformation') }}</h3>
        <p>
            <span class="info">{{ trans('frontend.customer') }}</span>
            {{ $info['name'] }}
        </p>
        <p>
            <span class="info">{{ trans('frontend.emailCustomer') }}</span>
            {{ $info['email'] }}
        </p>
        <p>
            <span class="info">{{ trans('frontend.phone') }}</span>
            {{ $info['phone'] }}
        </p>
        <p>
            <span class="info">{{ trans('frontend.address') }}</span>
            {{ $info['add'] }}
        </p>
        <p>
            <span class="info">{{ trans('frontend.request') }}</span>
            {{ $info['note'] }}
        </p>
    </div>
    <div>
        <h3>{{ trans('frontend.reciept') }}</h3>
        <table>
            <tr>
                <th><strong>{{ trans('frontend.nameProduct') }}</strong></th>
                <th><strong>{{ trans('frontend.prices') }}</strong></th>
                <th><strong>{{ trans('frontend.quality') }}</strong></th>
                <th><strong>{{ trans('frontend.intoMoney') }}</strong></th>
            </tr>
            @foreach($cart as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ number_format($item->price) }} {{ trans('frontend.vnd') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price * $item->quantity, 0, ',', '.' }} {{ trans('frontend.vnd') }}</td>
            </tr>
            @endforeach
            <tr>
                <td>{{ trans('frontend.totalMoney') }}</td>
                <td class="total">{{ number_format($total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>{{ trans('frontend.discount') }}</td>
                <td>{{ $discount }}</td>
            </tr>
            <tr>
                <td>{{ trans('frontend.afterPromotion') }}</td>
                <td>{{ number_format($after_discount, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
    <div>
        <p class="info">{{ trans('frontend.success') }}</p>
        <p>{{ trans('frontend.notificationOne') }}</p>
        <p>{{ trans('frontend.notificationTwo') }}</p>
        <p>{{ trans('frontend.notificationThree') }}</p>
        <p>{{ trans('frontend.notificationFour') }}</p>
        <p>{{ trans('frontend.notificationFive') }}</p>
    </div>
</font>
