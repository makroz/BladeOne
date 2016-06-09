

@include('master', ['some' => 'data'])
v2<br>

comentario {{-- esto no debe aparecer --}}<br>

Hello World {{$name}}<br>

Hello World escaped {{{$name}}}<br>

The current UNIX timestamp is {{ time() }}.<br>

Not compile: Hello, @{{ name }}.<br>

No escape: Hello, {!! $name !!}.<br>

Default: {{ $name or 'Default' }}<br>

<hr>

@if (count($records) === 1)
    I have one record!
@elseif (count($records) > 1)
    I have multiple records!
@else
    I don't have any records!
@endif

<hr>unless:<br>

@unless (false)
    You are not signed in.
@endunless
<hr>loops:<br>

@for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}<br>
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (false)
    <p>I'm looping forever.</p>
@endwhile

@foreach ($users as $user)
    @if($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if($user->number == 5)
        @break
    @endif
@endforeach

<hr>continue:<br>
@foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach
<hr>each:<br>
@each('view.name', $records, 'job')

<hr>push and stack:<br>
@push('scripts')
script1
@endpush
@push('scripts')
script2
@endpush
@push('scripts')
script3
@endpush
stack :  @stack('scripts')