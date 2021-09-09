<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ビルダー様向け注文通知書</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<p>

    {{$builder[0]->name}} 様<br><br>
    いつもROCOMADEをご利用いただきありがとうございます。<br>
    お客様からの注文を確認しましたので、以下の商品の発送をお願いいたします。<br><br>

    －－－－－－－　発送が必要な商品　－－－－－－－<br>    
    <br>
    商品名：{{$cart->name}}<br>
    数量： {{$cart->qty}}<br>
    単価(税込)： ¥{{$cart->price}}<br><br>
    －－－－－－－－　　発送先　　－－－－－－－－－
    <br><br>
    {{$shippingname}} 様<br>
    〒{{$shippingzipcode}}<br>
    {{$shippingaddress1}}<br>
    {{$shippingaddress2}}<br>

    <br>
    －－－－－－－－－－－－－－－－－－－－－－－－
    <br>
    －－－－－－－－　ご注文の詳細　－－－－－－－－
    <br>
    －－－－－－－－－－－－－－－－－－－－－－－－
    <br>
    ※今回ご利用のお客様の他のビルダー様の会計も合算した注文詳細です<br>
    @foreach ($carts as $item)
    <br>
    商品名：{{$item->name}}<br>
    数量： {{$item->qty}}<br>
    単価(税込)： ¥{{$item->price}}<br>
    @endforeach
    合計金額： ¥{{$totalpay}}(税込み)<br>   
    
    <br>
    ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿<br>
    <br>
    ROCOMADE<br>
    E-MAIL: mail@rocomade.jp<br>
    (〇〇本社)           Tel：000-0000-2222 Fax：000-0000-2222<br>
    （月～金：10-18時、土：12-17時、日曜・祝祭日を除く）<br>
    ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
    </p>
</body>
</html>

