<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Email or Phone -->
    <div>
        <label for="email_or_phone">メールアドレスor電話番号</label>
        <input id="email_or_phone" type="text" name="email_or_phone" value="{{ old('email_or_phone') }}" required>
    </div>

    <!-- Password -->
    <div>
        <label for="password">パスワード</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Address -->
    <div>
        <label for="postal_code">郵便番号</label>
        <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code') }}" required>
    </div>

    <div>
        <label for="prefecture">都道府県</label>
        <input id="prefecture" type="text" name="prefecture" value="{{ old('prefecture') }}" required>
    </div>

    <div>
        <label for="city">市町村区</label>
        <input id="city" type="text" name="city" value="{{ old('city') }}" required>
    </div>

    <!-- Register Button -->
    <div>
        <button type="submit">登録</button>
    </div>
</form>
