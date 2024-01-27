<h1>{{ $account->name }}</h1>
<a href="{{ route('account.verify', $account->email) }}">Click here!</a>
