<!DOCTYPE html>
<html>
<head>
    <title>顧客編集</title>
</head>
<body>

<h1>顧客編集</h1>

@if ($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/customers/{{ $customer->id }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>名前</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $customer->name) }}">
    </div>

    <br>

    <div>
        <label>メール</label>
        <input
            type="text"
            name="email"
            value="{{ old('email', $customer->email) }}">
    </div>

    <br>

    <div>
        <label>電話番号</label>
        <input
            type="text"
            name="phone"
            value="{{ old('phone', $customer->phone) }}">
    </div>

    <br>

    <div>
        <label>会社名</label>
        <input
            type="text"
            name="company"
            value="{{ old('company', $customer->company) }}">
    </div>

    <br>

    <button type="submit">
        更新
    </button>

</form>

</body>
</html>
