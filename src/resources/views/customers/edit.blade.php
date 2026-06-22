<!DOCTYPE html>
<html>
<head>
    <title>顧客編集</title>
</head>
<body>

<h1>顧客編集</h1>

<form action="/customers/{{ $customer->id }}" method="POST">

    @csrf
    @method('PUT')

    <div>
        <label>名前</label>
        <input
            type="text"
            name="name"
            value="{{ $customer->name }}">
    </div>

    <br>

    <div>
        <label>メール</label>
        <input
            type="email"
            name="email"
            value="{{ $customer->email }}">
    </div>

    <br>

    <div>
        <label>電話番号</label>
        <input
            type="text"
            name="phone"
            value="{{ $customer->phone }}">
    </div>

    <br>

    <div>
        <label>会社名</label>
        <input
            type="text"
            name="company"
            value="{{ $customer->company }}">
    </div>

    <br>

    <button type="submit">
        更新
    </button>

</form>

</body>
</html>
