<!DOCTYPE html>
<html>
<head>
    <title>顧客一覧</title>
</head>
<body>

<h1>顧客一覧</h1>

<a href="/customers/create">
    新規登録
</a>

<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>名前</th>
        <th>会社名</th>
        <th>操作</th>
    </tr>

    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->company }}</td>
        <td>
            <a href="/customers/{{ $customer->id }}/edit">
                編集
            </a>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
