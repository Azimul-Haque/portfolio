<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table {
		    border-collapse: collapse;
		    width: 100% !important;
		}
		th, td{
		  padding: 7px;
		  font-size: 15px;
		  border: 1px solid #A8A8A8;
		}
		/*.bordertable td, th {
		    border: 1px solid #A8A8A8;
		}*/
	</style>	
</head>

<body style="background: #F4F4F4;">
	<br/>
	<center>
	  <div style="border-top: 4px solid #00B2B2; padding: 10px; margin: 20px; max-width: 600px; background: #FFF; ">
	    <center>
	      <img src="{{ asset('images/logo.png') }}" style="height:50px; width: auto;">
	      {{-- <p style="font-size: 30px; color: #1B237D;"><b>Atique</b>Riyad</p> --}}
	      <p style="font-size: 25px"><b>Contact Message</b></p>

	      <table class="bordertable">
	      	<tbody>
		      	<tr>
		      		<th style="background: #F4B609;">Sender Details</th>
		      	</tr>
		      	<tr>
		      	    <td>
		      	    	<big><b>{{ $name }}</b></big><br/>
		      	    	{{ $from }}<br/>
		      	    	{{ $phone }}
		      	    </td>
		      	</tr>
		      	<tr>    
		      	   	<th style="background: #F4B609;">Message</th>
		      	</tr>
		      	<tr>
		      	    <td>{{ $message_data }}</td>
		      	</tr>
	      	</tbody>
	      </table>
	      
	      <br/><br/>
	      <p style="font-size: 12px; color: #ACACAC;">
	        This email is sent from Website Contact Form.
	      </p>
	      <p style="font-size: 12px; color: #ACACAC;">
	        &copy; @php echo date('Y'); @endphp <a href="http://atiqueriyad.com/">Atique Riyad</a>, Dhaka, Bangladesh
	      </p>
	    </center>
	  </div>
	</center>
	<br/>	
</body>
</html>