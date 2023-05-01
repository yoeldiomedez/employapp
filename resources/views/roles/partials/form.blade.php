<h3 class="form-section"></h3>
<div class="form-group">
    {{ html()->label('Nombre', 'name') }}
    {{ html()->input('text', 'name')->required()->class(['form-control', 'uppercase']) }}
</div>

<h3 class="form-section">Permisos</h3>

<div class="form-group">
    <div class="mt-checkbox-list">
        @foreach($permissions as $permission)
            <label class="mt-checkbox"> {{ $permission->name }} <em>({{ $permission->guard_name ? : 'N/A' }})</em>
                {{ html()->checkbox('permissions[]')
                        ->value($permission->id)
                        ->checked(isset($role) ? in_array($permission->id, $role->permissions->pluck('id')->toArray()) : false) 
                }}
                <span></span>
            </label>
        @endforeach
    </div>
</div>