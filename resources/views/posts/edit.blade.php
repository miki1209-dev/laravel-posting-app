<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	@include('components.link')
</head>

<body>
	<div class="wrapper">
		<x-header />
		<main>
			<div class="container">
				<h1 class="fs-2 my-3">投稿編集</h1>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="mb-2">
					<a href="{{ route('posts.index') }}" class="btn btn-outline-primary">&lt; 戻る</a>
				</div>

				<form action="{{ route('posts.update', $post->id) }}" method="POST">
					@csrf
					@method('PATCH')
					<div class="form-group mb-3">
						<label for="title">タイトル</label>
						<input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
					</div>
					<div class="form-group mb-3">
						<label for="content">本文</label>
						<textarea name="content" class="form-control" id="content">{{ old('content', $post->content) }}</textarea>
					</div>
					<button type="submit" class="btn btn-outline-primary">更新</button>
				</form>
			</div>
		</main>
		<x-footer />
	</div>
	@include('components.script-link')
</body>

</html>
