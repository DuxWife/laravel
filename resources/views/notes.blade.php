@extends('root')
@section('myScript')
	<script>
		function myFunction(id, note) {
			$("#id").val(id);
		  $("#note").val(note);
		}
	</script>
@endsection

@section('content')

	<form method="post">
		@csrf
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Заметка</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Записать</button>
	</form>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
		    	<th scope="col">id</th>
		    	<th scope="col">created at</th>
		    	<th scope="col">updated at</th>
		    	<th scope="col">note</th>
		    	<th></th>
		    	<th></th>
		    </tr>
		</thead>
		<tbody>			
			@if($notes->count())
			    @foreach($notes as $note)
			    	<tr>
			    			
			    			
				    		<td scope="row">{{ $note->id }}</td>
				    		<td>{{ $note->created_at }}</td>
				    		<td>{{ $note->updated_at }}</td>
				    		<td>{{ $note->note }}</td>
			    			<td>
				    			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive" onclick="myFunction('{{$note->id}}', '{{$note->note}}')">Изменить</button>
				    		</td>

				    		
			    		
				    		<td><form action="{{url('/notes', [$note])}}" method="POST">
				    			@method('DELETE')
				    			@csrf
				    			<button type="submit" class="btn btn-primary">Удалить</button>
				    		</form></td>
			    		
			    	</tr>
			    @endforeach
			@endif
			
		</tbody>
	</table>

	<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLiveLabel">Изменение заметки</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="{{url('/notes', [$note])}}" method="POST">
	        		@method('PUT')
	        		@csrf
				<div class="form-group">
					<input class="d-none" type="text" id="id" name="update_id"/>
					<textarea class="form-control" rows="5" id="note" name="update_note"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Сохранить изменения</button>
			</form>
	      </div>
	    </div>
	  </div>
	</div>

 @endsection