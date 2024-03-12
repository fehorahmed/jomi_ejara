{{ Form::open(array('url' => 'web_login', 'method' => 'post', 'value' => 'PATCH', 'id' => '')) }}
<div class="form-group secti-margin1">
    {{ Form::label('email', '  ইমেইল/মোবাইল', array('class' => 'title cmmone-class')) }}
    {{ Form::text('email', old('email'),
    ['required', 'class' => 'form-control', 'placeholder' => ' ইমেইল ']) }}
</div>
<div class="form-group secti-margin1">
    {{ Form::label('password', '  পাসওয়ার্ড  ', array('class' => 'sub_title cmmone-class')) }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => ' পাসওয়ার্ড  ']) }}
</div>


<div class="form-group secti-margin1">
    <label class="login-bar">
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
        স্মরণ রাখুন
    </label>
</div>

<div class="form-group secti-margin1">
    {{ Form::submit('সাইন ইন', ['class' => 'btn btn-success']) }}
    <br/>
    <a class="btn btn-link" href="{{ url('/reset_password') }}">
        পাসওয়ার্ড ভুলে গিয়ে থাকলে , পুনরায় পাসওয়ার্ড ফেরত নিন
    </a>
</div>
{{ Form::close() }}