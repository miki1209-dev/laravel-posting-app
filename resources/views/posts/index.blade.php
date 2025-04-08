<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿一覧</title>
	@include('components.link')
</head>

<body>
	<div class="wrapper">
		<x-header />
		<main>
			<div class="container">
				<h1 class="fs-2 my-3">投稿一覧</h1>
				@if (session('flash_message'))
					<p class="text-success">{{ session('flash_message') }}</p>
				@endif

				@if (session('error_message'))
					<p class="text-danger">{{ session('error_message') }}</p>
				@endif

				<div class="mb-2">
					<a href="{{ route('posts.create') }}" class="btn btn-outline-primary">新規投稿</a>
				</div>

				@if ($posts->isNotEmpty())
					@foreach ($posts as $post)
						<article>
							<div class="card mb-3">
								<div class="card-body">
									<h2 class="card-title fs-5">{{ $post->title }}</h2>
									<p class="card-text">{{ $post->content }}</p>
									<div class="d-flex">
										<a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-primary d-block me-1">詳細</a>
										<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary d-block me-1">編集</a>

										<form action="{{ route('posts.destroy', $post->id) }}" method="POST"
											onsubmit="return confirm('本当に削除してもよろしいですか？');">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-outline-danger">削除</button>
										</form>
									</div>
								</div>
							</div>
						</article>
					@endforeach
				@else
					<p>投稿がありません</p>
				@endif
			</div>
		</main>
		<x-footer />
	</div>
	@include('components.script-link')
</body>

</html>
