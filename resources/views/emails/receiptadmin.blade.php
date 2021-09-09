<p>
    ＝＝＝＝＝＝＝　管理者確定通知　＝＝＝＝＝＝＝<br><br>
    管理者メッセージ<br>
    商品が売れました<br>
    <br>

    <br>－－－－－－－　　お届け先　　－－－－－－－<br><br>

    西島星那 様<br>
    〒{{$shippingzipcode}}<br>
    {{$shippingaddress1}}<br>
    {{$shippingaddress2}}<br>

    <br>
    －－－－－－－　ご注文の詳細　－－－－－－－<br>
    @foreach ($carts as $item)
    <br>
    商品名：{{$item->name}}<br>
    数量： {{$item->qty}}<br>
    金額(税込)： ¥{{$item->price}}<br>
    @endforeach
    
    <br>
    －－－－－－－ 　お支払金額　 －－－－－－－<br>
    <br>
    合計金額： ¥{{$totalpay}}(税込み)<br>
    お支払方法： クレジットカード<br><br>
 
    ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝<br>

    </p>