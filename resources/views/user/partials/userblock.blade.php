<div class="media">
	<a class="pull-left" href="{{ route('profile.index', ['name' => $user->name]) }}">
		<img class="media-object" alt="{{ $user->name }}" src="{{ $user->getAvatarUrl() }}">
	</a>
	<div class="media-body">
		<h4 class="media-heading"><a href="{{ route('profile.index', ['name' => $user->name]) }}">{{ $user->name }} <br> {{ $profile->location }}</a></h4>
	</div>
</div>