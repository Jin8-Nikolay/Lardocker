@php
    /**
     * @var $user \App\Models\User
     * @var $todo \App\Models\Todo
     */
@endphp

<div>
    Пользователь: {{ $user->name }}
    Завершил {{ $todo->name }}.
</div>
