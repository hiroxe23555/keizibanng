@if (Auth::guard('admin')->check())
    <a href="{{ route('admin.user.show', $thread->id) }}">全部読む</a>
    <a href="{{ route('admin.user.show', $thread->id) }}">最新50</a>
    <a href="{{ route('admin.user.show', $thread->id) }}">1-100</a>
     <a href="{{ route('admin.user.index') }}">リロード</a>
@else
    <a href="{{ route('users.show', $thread->id) }}">全部読む</a>
    <a href="{{ route('users.show', $thread->id) }}">最新50</a>
    <a href="{{ route('users.show', $thread->id) }}">1-100</a>
     <a href="{{ route('users.store') }}">リロード</a>
@endif

