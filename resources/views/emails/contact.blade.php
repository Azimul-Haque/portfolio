<style type="text/css">
	table {
	    border-collapse: collapse;
	    width: 100% !important;
	}
	th, td{
	  padding: 7px;
	  font-family: 'kalpurush', sans-serif;
	  font-size: 15px;
	  border: 1px solid #A8A8A8;
	}
	/*.bordertable td, th {
	    border: 1px solid #A8A8A8;
	}*/
</style>
<body style="background: #F4F4F4;">
	<br/>
	<center>
	  <div style="border-top: 4px solid #00B2B2; padding: 10px; margin: 20px; max-width: 600px; background: #FFF; ">
	    <center>
	      <img src="{{ asset('images/logo.png') }}" style="height:50px; width: auto;">
	      {{-- <p style="font-size: 30px; color: #1B237D;"><b>Atique</b>Riyad</p> --}}
	      <p style="font-size: 25px"><b>Contact Message</b></p>

	      <table>
	      	<thead>
	      		<tr>
	  		        <th width="40%">Sender Details</th>
	  		        <th width="50%">Message</th>
	  		    </tr>
	      	</thead>
	      	<tbody>
		      	<tr>
		      	    <td>
		      	    	<big><b>{{ $name }}</b></big><br/>
		      	    	{{ $from }}<br/>
		      	    	{{ $phone }}
		      	    </td>
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
