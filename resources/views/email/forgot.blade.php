<h1>Hello {{ $admin->name }}</h1>
<p>Please click the password reset button to reset your password
	<a href="{{ url('/reset_password'.$admin->email.'/'.$code) }}">Reset Password</a>
</p>