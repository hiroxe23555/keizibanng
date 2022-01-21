@if (Auth::guard('admin')->check())
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary">掲示板に戻る</a>
@else
    <a href="{{ route('users.store') }}" class="btn btn-primary">掲示板に戻る</a>
@endif