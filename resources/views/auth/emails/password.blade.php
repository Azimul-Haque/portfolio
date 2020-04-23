<body style="background: #F4F4F4;">
	<br/>
	<center>
	  <div style="border-top: 4px solid #6F7246; padding: 10px; margin: 20px; max-width: 500px; background: #FFF; ">
	    <center>
	      <img src="{{ asset('images/logo.png') }}" style="height:50px; width: auto;">
	      {{-- <p style="font-size: 30px; color: #1B237D;"><b>Atique</b>Riyad</p> --}}
	      <p style="font-size: 25px"><b>Your Password Reset Link</b></p>
	    
	      <p style="font-size: 20px">
	        To reset your password, please click below<br/>
	        <big><a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">Click Here</a></big><br/>
	        Or,<br/>
	        <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="font-size: 13px; word-wrap: break-word;"> {{ $link }} </a>
	      </p>
	      <br/><br/>
	      <p style="font-size: 12px; color: #ACACAC;">
	        This is a auto-generated email from <b>Atique Riyad</b>. This email arrived to you because you (or may be someone else!) have requested to reset the password associated with this email address. If you are getting this email by mistake, please ignore it.
	      </p>
	      <p style="font-size: 12px; color: #ACACAC;">
	        &copy; @php echo date('Y'); @endphp <a href="http://loyalovijatri.com/">Atique Riyad</a>, Bangladesh
	      </p>
	    </center>
	  </div>
	</center>
	<br/>	
</body>
