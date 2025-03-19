@extends('layouts.profile')

@section('profile')
<form action="{{ route('profile.save', 'password') }}" method="post" id="pwform">
    {{ csrf_field() }}
    <h3>CHANGE YOUR PASSWORD</h3>
    <h3>GIVE YOUR CURRENT DETAILS</h3>
    <p>
        <label for="currentpassword">Current
            password</label><br />
        <input type="password" size="32" maxlength="32" name="currentpassword" id="currentpassword"
            class="currentpassword " />
    </p>
    <h3>ENTER NEW PASSWORD</h3>
    <p>
        <label for="bean_password">New
            password</label><br />
        <input type="password" size="32" maxlength="32" name="newpassword" id="newpassword"
            class="required-password required-password2 " />
    </p>
    <p>
        <label for="bean_retypedPassword">New
            password
            (again)</label><br />
        <input type="password" size="32" maxlength="32" name="newpasswordconfirm" id="newpasswordconfirm"
            class="required-retypedPassword required-retypedPassword2 " />
    </p>
    <div class="clear"></div>
    </div>
    <div id="register-buttons">
        <div id="register-buttons-continue">
            <input type="submit" value="Change password" name="save" class="process-button" />
        </div>
        <div id="register-buttons-back"></div>
</form>
@stop
