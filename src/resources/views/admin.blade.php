<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FasionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/">
        FasionablyLate
      </a>
    </div>
  </header>

  <main>
    <div class="admin__content">
      <div class="admin__heading">
        <h2>Admin</h2>
      </div>
      <form class="search-form" action="{{ route('admin.search') }}" method="GET">
        <div>
          <label for="name">名前:</label>
          <input type="text" id="name" name="name" class="search-form__input" placeholder="キーワード">
          <label><input type="radio" name="name_type" value="partial" checked>部分一致</label>
          <label><input type="radio" name="name_type" value="exact">完全一致</label>
        </div>
        <div>
          <label for="email">メールアドレス:</label>
          <input type="email" id="email" name="email" class="search-form__input" placeholder="キーワード">
          <label><input type="radio" name="email_type" value="partial" checked>部分一致</label>
          <label><input type="radio" name="email_type" value="exact">完全一致</label>
        </div>
        <div class="search-form__group">
          <label for="gender">性別:</label>
          <select id="gender" name="gender" class="search-form__select">
            <option value="">性別</option>
            <option value="">全て</option>
            <option value="男性">男性</option>
            <option value="女性">女性</option>
            <option value="その他">その他</option>
          </select>
        </div>
        <div>
          <label for="inquiry_type">お問い合わせの種類:</label>
          <input type="text" id="inquiry_type" name="inquiry_type" class="search-form__input" placeholder="キーワード">
          <label><input type="radio" name="inquiry_type_type" value="partial" checked>部分一致</label>
          <label><input type="radio" name="inquiry_type_type" value="exact">完全一致</label>
        </div>
        <div>
          <label for="inquiry_date">日付:</label>
          <input type="date" id="inquiry_date" name="inquiry_date" class="search-form__date">
        </div>
        <button type="submit" class="search-form__button">検索</button>
        <a href="{{ route('admin.index') }}" class="search-form__button">リセット</a>
        <button type="button" class="search-form__button">エクスポート</button>
      </form>

      <table class="search-results">
        <thead>
          <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th>日付</th>
            <th>詳細</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($contacts) && count($contacts) > 0)
          @foreach ($contacts as $contact)
          <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->inquiry_type }}</td>
            <td>{{ $contact->inquiry_date }}</td>
            <td><button>詳細</button></td>
          </tr>
          @endforeach
          @else
            <tr><td colspan="6">該当するデータはありません</td></tr>
          @endif
        </tbody>
      </table>

      @if(isset($contacts) && method_exists($contacts, 'links'))
        {{ $contacts->links() }}
        @endif
      <div class="button-group">
        <button>エクスポート</button>
      </div>
    </div>
  </main>

    <script>
      function resetSearchForm() {
        document.querySelector('.search-form').reset();
      }
    </script>
</body>

</html>
