@props(['post' => $post])

<section class="post">
  <a href="{{ route('users.posts', $post->user) }}">{{ $post->user->name }}</a>
  <p>{{ $post->body }}</p>
  <span>{{ $post->created_at->diffForHumans() }}</span>
  {{-- <span>Date: {{ $post->created_at->toTimeString() }}</span> --}}
  | <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

  @auth

  {{-- @if ($post->ownedBy(auth()->user())) --}}

  @can('delete', $post)
  <form action="{{ route('posts.destroy', $post) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>
  {{-- @endif --}}
  @endcan

  @if (!$post->likedBy(auth()->user()))

  <form action="{{ route('posts.likes', $post) }}" method="post">
    @csrf
    <button type="submit">Like</button>
  </form>

  @else

  <form action="{{ route('posts.likes', $post) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Unlike</button>
  </form>

  @endif
  @endauth

</section>