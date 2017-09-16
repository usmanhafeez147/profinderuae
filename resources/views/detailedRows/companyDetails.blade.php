<div class="detailrow">
<div class='employee-details' id="tab1Content">
    <ul>
        <li><label>Company Name:</label>{{ $data['entry']->name  }}</li>
        <li><label>City:</label>{{ $data['entry']->city->name  }}</li>
        <li><label>Contact Name:</label>
        	@if($data['entry']->contact_name==null  and $data['entry']->contact_name=='' )
		    	No Contact
			@else
		    	{{  $data['entry']->contact_name  }}
		    @endif
		</li>
        <li><label>GSM:</label>
        	@if($data['entry']->gsm==null and $data['entry']->gsm=='')
		    		No GSM
		    @else
		    	{{  $data['entry']->gsm  }}
		    @endif
		</li>
		<li><label>Description:</label><?php  echo $data['entry']->description;  ?></li>
    </ul>
</div>
</div>
