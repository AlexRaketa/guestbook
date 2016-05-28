@if(Session::has('message.submit'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('message.submit') }}
    </div>
@endif

{{ Form::open(['route' => 'message.submit']) }}

    <div class="form-group @if($errors->has('name')) has-error @endif">
        <label for="name" class="control-label">Имя: *</label>

        {{  Form::text('name', old('name'), ['placeholder' => 'Имя', 'class' => 'form-control']) }}
        {!! $errors->first('name','<span class="help-block">:message</span>') !!}

    </div>

    <div class="form-group @if($errors->has('email')) has-error @endif">
        <label for="email" class="control-label">E-mail: *</label>

        {{  Form::email('email', old('email'), ['placeholder' => 'Почта', 'class' => 'form-control']) }}
        {!! $errors->first('email','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label for="homepage">Homepage:</label>
        <input class="form-control" placeholder="Homepage" name="homepage" type="url" id="homepage">
    </div>

    <div class="form-group @if($errors->has('message')) has-error @endif">
        <label for="message" class="control-label">Сообщение: *</label>
        {{  Form::textarea('message', old('message'), ['placeholder' => 'Сообщение', 'class' => 'form-control']) }}
        {!! $errors->first('message','<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Добавить сообщение">
    </div>

{{ Form::close() }}
