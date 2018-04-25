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
            placeholder="A title"
            name="title"
            required
          >
        </div>
      </div>
      
      <div class="field">
          <label class="label">Author</label>
          <div class="control">
            <input 
            class="input" 
            type="text" 
            placeholder="{{Auth::user()->name}}"
            name="author"
            required
            >
          </div>
        </div>
        
      <div class="field">
        <label class="label">Body</label>
        <div class="control">
          <textarea 
          class="textarea" 
          placeholder="Whats on your mind {{Auth::user()->name}} ?"
          name= "body"
          required
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