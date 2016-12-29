@component('layout')
	<h1 class="title">New Snippet</h1>

	<form action="/snippets" method="POST">
		{{ csrf_field() }}

		@if ($snippet->id)
			<input type="hidden" name="forked_id" value="{{ $snippet->id }}">
		@endif
		
		<div class="control">
			<label for="title" class="label">Title:</label>
			
			<input type="text" id="title" name="title" class="input" value="{{ $snippet->title }}">
		</div>

		<div class="control">
			<label for="body" class="label">Body:</label>
			
			<textarea id="body" name="body" class="textarea">{{ $snippet->body }}</textarea>
		</div>

		<div class="control">
			<button class="button is-primary">Publish Snippet</button>
		</div>
	</form>

	{{-- We didn't review this in the tutorial. It's just a quick script 
		 to allow for pressing the "tab" key in textareas.
	 --}}
	@slot ('footer')
		<script>
			document.querySelector('#body').addEventListener('keydown', function(e) {
		        if (e.keyCode === 9) { // tab was pressed
		            // get caret position/selection
		            let val = this.value,
		                start = this.selectionStart,
		                end = this.selectionEnd;

		            // set textarea value to: text before caret + tab + text after caret
		            this.value = val.substring(0, start) + '\t' + val.substring(end);

		            // put caret at right position again
		            this.selectionStart = this.selectionEnd = start + 1;

		            e.preventDefault();
		        }
		    });
		</script>
	@endslot	
@endcomponent
