<!DOCTYPE html>
<html>
<head>
    <title>顧客登録</title>
</head>
<body>

<h1>顧客登録</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/customers" method="POST">

    @csrf

    <div>
        <label>名前</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <br>

    <div>
        <label>メール</label>
        <input type="text" name="email" value="{{ old('email') }}">
    </div>

    <br>

    <div>
        <label>電話番号</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
    </div>

    <br>

    <div>
        <label>会社名</label>
        <input type="text" name="company" value="{{ old('company') }}">
    </div>

    <br>

    <button type="submit">
        登録
    </button>

</form>

</body>
</html>
