<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>投稿詳細</title>
</head>

<body>
	<x-header />
	<main>
		<h1>投稿詳細</h1>
		<a href="{{ route('posts.index') }}">戻る</a>
		<article>
			<h2>{{ $post->title }}</h2>
			<p>{{ $post->content }}</p>
		</article>
	</main>
</body>

</html>
