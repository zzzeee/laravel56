@if(count($errors) > 0)
    <div class="error-box">
        <ul>
        @foreach($errors->all() as $err)
            <li class="error-item">{{ $err }}</li>
        @endforeach
        </ul>
    </div>
@endif