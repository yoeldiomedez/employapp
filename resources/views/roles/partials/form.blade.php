<h3 class="form-section"></h3>
<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
</div>

<h3 class="form-section">Permisos</h3>

<div class="form-group">
    <div class="mt-checkbox-list">
        @foreach($permissions as $permission)
            <label class="mt-checkbox"> {{ $permission->name }} <em>({{ $permission->guard_name ? : 'N/A' }})</em>
                {{ Form::checkbox('permissions[]', $permission->id, null) }}
                <span></span>
            </label>
        @endforeach
    </div>
</div>