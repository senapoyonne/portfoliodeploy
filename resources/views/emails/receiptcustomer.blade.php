<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ご注文確認書</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<p>
    ＝＝＝＝＝＝＝　ご注文の確認　＝＝＝＝＝＝＝<br><br>
    {{$builder[0]->name}} 様<br>
    この度はROCOMADEをご利用いただきありがとうございました。<br>
    商品の到着までしばらくお待ちください。<br>

    <br>－－－－－－－　　お届け先　　－－－－－－－<br><br>

    {{$shippingname}} 様<br>
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
    <br>
    こちらのメールは、自動送信システムにてご案内しております。<br>
    ◆何かしらのプロモーション！！<br>
    詳細はこちら！ （<a href="https://blinkfishingshop.com">https://blinkfishingshop.com</a>）<br>
    ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿<br>
    <br>
    ROCOMADE<br>
    E-MAIL: mail@rocomade.jp<br>
    (〇〇本社)           Tel： 0476-89-1111 Fax： 0476-89-2222<br>
    （月～金：10-18時、土：12-17時、日曜・祝祭日を除く）<br>
    ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
    </p>
</body>
</html>

