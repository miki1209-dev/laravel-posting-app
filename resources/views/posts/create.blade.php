<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿作成</title>
</head>

<body>
	<x-header />
	<main>
		<h1>投稿作成</h1>

		@if ($errors->any())
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		<a href="{{ route('posts.index') }}">&lt; 戻る</a>

		<form action="{{ route('posts.store') }}" method="POST">
			@csrf
			<div>
				<label for="title">タイトル</label>
				<input type="text" id="title" name="title" value="{{ old('title') }}">
			</div>
			<div>
				<label for="content">本文</label>
				<textarea id="content" name="content">{{ old('content') }}</textarea>
			</div>
			<button type="submit">投稿</button>
		</form>
	</main>
	<x-footer />
</body>

</html>
