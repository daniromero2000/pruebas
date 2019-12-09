<ul class="list-unstyled list-inline">
        @foreach($roles as $role)
        <li>
                <div class="checkbox">
                        <label>
                                <input type="checkbox" @if(isset($selectedIds) && in_array($role->id,
                                $selectedIds))checked="checked" @endif @if($isCurrentUser) disabled @endif
                                name="roles[]" value="{{ $role->id }}"> {{ $role->display_name }}
                        </label>
                </div>
        </li>
        @endforeach
</ul>