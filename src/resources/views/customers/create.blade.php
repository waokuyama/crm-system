<!DOCTYPE html>
<html>
<head>
    <title>顧客登録</title>
</head>
<body>

<h1>顧客登録</h1>

<form action="/customers" method="POST">

    @csrf

    <div>
        <label>名前</label>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>メール</label>
        <input type="email" name="email">
    </div>

    <br>

    <div>
        <label>電話番号</label>
        <input type="text" name="phone">
    </div>

    <br>

    <div>
        <label>会社名</label>
        <input type="text" name="company">
    </div>

    <br>

    <button type="submit">
        登録
    </button>

</form>

</body>
</html>
