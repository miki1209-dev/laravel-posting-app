<header>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a href="{{ route('posts.index') }}" class="navbar-brand">投稿アプリ</a>
			<ul class="navbar-nav">
				<div class="d-flex align-items-center">
					<li class="nav-item nav-link mx-3">{{ $username }}</li>
					<li class="nav-item">
						<a href="{{ route('logout') }}" class="nav-link"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							ログアウト
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
					</li>
				</div>
			</ul>
		</div>
	</nav>
</header>
