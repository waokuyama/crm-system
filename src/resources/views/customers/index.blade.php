<!DOCTYPE html>
<html>
<head>
    <title>顧客一覧</title>
</head>
<body>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">
        ログアウト
    </button>
</form>

<h1>顧客一覧</h1>

<form method="GET" action="/customers">

    <input
        type="text"
        name="keyword"
        value="{{ $keyword ?? '' }}"
        placeholder="顧客名・会社名">

    <button type="submit">
        検索
    </button>

</form>

<br>

@if(!empty($keyword))

<p>
    検索条件 :
    {{ $keyword }}
</p>

@endif

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

    @forelse($customers as $customer)

    <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->company }}</td>

        <td>
            <a href="/customers/{{ $customer->id }}/edit">
                編集
            </a>

            <form
                action="/customers/{{ $customer->id }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    onclick="return confirm('削除しますか？')">
                    削除
                </button>

            </form>
        </td>
    </tr>

    @empty

    <tr>
        <td colspan="4">
            データがありません
        </td>
    </tr>

    @endforelse

</table>

</body>
</html>
