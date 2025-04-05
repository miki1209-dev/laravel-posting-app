<header>
	<nav>
		<a href="{{ route('posts.index') }}">投稿アプリ</a>
	</nav>
	<ul>
		<li>
			<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				ログアウト
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
		</li>
	</ul>
</header>
