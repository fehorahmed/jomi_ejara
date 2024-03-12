{{ Form::open(array('url' => 'web_signup', 'method' => 'post', 'value' => 'PATCH', 'id' => 'web_signup')) }}
{{ Form::hidden('role_id', 8, ['required']) }}
<div class="form-group secti-margin1">
    {{ Form::label('name', '  নাম  ', array('class' => 'title cmmone-class')) }}
    {{ Form::text('name', NULL, ['required', 'class' => 'form-control', 'placeholder' => 'নাম  লিখুন ']) }}
</div>
 <div class="form-group secti-margin1">
    {{ Form::label('email', 'ইমেইল', array('class' => 'sub_title cmmone-class')) }}
    {{ Form::text('email', NULL, ['class' => 'form-control', 'placeholder' => ' ইমেইল  লিখুন ']) }}
</div>
<div class="form-group secti-margin1">
    {{ Form::label('nid', 'NID', array('class' => 'sub_title cmmone-class')) }}
    {{ Form::text('nid', NULL, ['class' => 'form-control', 'placeholder' => ' NID Number ']) }}
</div>
<div class="form-group secti-margin1">
    {{ Form::label('phone', 'মোবাইল নম্বর', array('class' => 'sub_title cmmone-class')) }}
    <div class="input-group">
        <span class="input-group-addon">+88</span>
        {{ Form::text('phone', NULL, ['class' => 'form-control cmmone-class', 'placeholder' => 'মোবাইল নম্বর লিখুন ']) }}
    </div>
</div>
<div class="form-group secti-margin1">
    {{ Form::label('password', ' পাসওয়ার্ড ', array('class' => 'sub_title cmmone-class')) }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'পাসওয়ার্ড']) }}
</div>
<div class="form-group secti-margin1">
    {{ Form::label('password_confirmation', 'পাসওয়ার্ড  পুনরায়  দিন ', array('class' => 'sub_title cmmone-class')) }}
    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'পাসওয়ার্ড']) }}
</div>
<div class="form-group secti-margin1">
    {{ Form::submit('সাইন আপ', ['class' => 'btn btn-success']) }}
</div>
{{ Form::close() }}