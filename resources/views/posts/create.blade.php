@extends ('layout')

@section('content')
<form action="/posts" method="POST">
  {{ csrf_field() }}
  <div class="field">
      <label class="label">Title</label>
      <div class="control">
        <input 
          class="input" 
          type="text" 
          placeholder="Text input"
          name="title"
        >
      </div>
    </div>
    
    <div class="field">
        <label class="label">Author</label>
        <div class="control">
          <input 
          class="input" 
          type="text" 
          placeholder="e.g Alex Smith"
          name="author"
          >
        </div>
      </div>
      
    <div class="field">
      <label class="label">Body</label>
      <div class="control">
        <textarea 
        class="textarea" 
        placeholder="Textarea"
        name= "body"
        ></textarea>
      </div>
    </div>
    
  
    <div class="field is-grouped">
      <div class="control">
        <button class="button is-dark ">Submit</button>
      </div>
      <div class="control">
        <button class="button is-grey ">Cancel</button>
      </div>
    </div>
</form>
@endsection