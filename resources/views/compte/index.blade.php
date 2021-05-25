@extends('admin.adminMaster')

@section('content')
	
<div class="container-fluid">
	<h2 class="mb-4">Comptes-Gestió</h2>
	<a href="/compte/create" class="btn btn-primary text-light mb-4">Crear compte</a>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	
			<h6 style="display: inline-block" class="m-0 font-weight-bold text-primary">Comptes</h6>
		
			<a style="display:inline-block" href="/compte/export/" class="btn btn-success text-light float-right">
				<i class="fas fa-file-excel"></i>
			</a>
		
			<a style="display:inline-block" href="/compte/export2/" class="btn btn-danger text-light float-right mr-2">
				<i class="fas fa-file-pdf"></i>
			</a>
			
		</div>
		<div class="card-body" style="overflow: hidden">
			<div class="table-responsive">
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
				<thead>
					<tr>
					<th style="width:30px" data-priority="1">Id</th>
					<th class="w-25" >Compte</th>
					<th class="w-25" >Fuc</th>
					<th class="w-25" >Clau</th>
					<th class="w-25" >Estat</th>
					<th style="max-width:100px" >Editar</th>
					<th style="max-width:100px">Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($comptes  as $compte)
					<tr>
					<td>
						{{$compte->id}}
					</td>
					<td>
						{{$compte->compte}}
					</td>
					<td>
						{{$compte->fuc}}
					</td>
					<td>
						{{$compte->clau}}
					</td>
					<td>
						{{$compte->estat}}
					</td>
					<td style="max-width:100px">

						<a href="/compte/edit/{{$compte->id}}" class="btn btn-primary text-light">
							<i class="fas fa-edit"></i>
						</a>
					</td>
					<td style="max-width:100px">
						<form class="float-rigth"action="/compte/delete/{{$compte->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar el compte?');">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
						<button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
						</form>
					</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>		
</div>

@endsection
