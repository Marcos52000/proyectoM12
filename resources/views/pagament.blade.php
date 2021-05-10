@include('menu')

<div class="container">
	<div class="mt-3 ms-5 mb-3">
		<h2>{{$Pagament->titol}}</h2>
		<p>Preu: {{$Pagament->preu}}</p>
		<p>{!! $Pagament->descripcio !!}</p>
	     
		<form action="https://sis.sermepa.es/sis/realizarPago" method="post" accept-charset="utf-8" id="form_260"> 
			<input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" /> 
			<input type="hidden" name="Ds_MerchantParameters" value="eyJEU19NRVJDSEFOVF9BTU9VTlQiOiIyMDAwMCIsIkRTX01FUkNIQU5UX09SREVSIjoiMjAwMjI3MTAyOTU0IiwiRFNfTUVSQ0hBTlRfTUVSQ0hBTlRDT0RFIjoiMDIyMzE2Nzk5MCIsIkRTX01FUkNIQU5UX0NVUlJFTkNZIjoiOTc4IiwiRFNfTUVSQ0hBTlRfVFJBTlNBQ1RJT05UWVBFIjoiMCIsIkRTX01FUkNIQU5UX1RFUk1JTkFMIjoiMSIs">
			<button class="btn btn-primary" type="submit">Fer Pagament</button>
		</form>
		@php
			echo Share::currentPage()->whatsapp();
		@endphp

		<a class="btn btn-primary" style="background-color: #55acee; border-style:none; width: 70px" href="https://twitter.com/intent/tweet?text=Default+share+text&url=http://localhost/pagament/{{$Pagament->id}}" role="button">
			<i class="fab fa-twitter"></i>
		</a>

		<a class="btn btn-primary" style="background-color: #3b5998; border-style:none;  width: 70px" href="https://www.facebook.com/sharer.php?u=https://localhost/pagament/{{$Pagament->id}}" role="button" >
			<i class="fab fa-facebook-f"></i>
		</a>
		<a class="btn btn-primary" style="background-color: #25d366; border-style:none;  width: 70px" href="https://wa.me/?text=http://localhost/pagament/{{$Pagament->id}}" role="button">
			<i class="fab fa-whatsapp"></i>
		</a>

	</div>
</div>


@include('footer')
