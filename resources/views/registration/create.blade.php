@extends('layout')

@section('content')
  <div class="registration">
    <div class="box registration__box">
      <h1 class="registration__header title is-1">
        Sign Up!
      </h1>
      <form class="registration__form" action="/register" method="POST">
        {{ csrf_field() }}
        <div class="field">
          <label class="label">Name</label>
          <div class="control has-icons-left">
            <input 
            class="input" 
            type="text" 
            placeholder="Ron Swanson" 
            required
            name="name"
          >
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
           
        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left">
            <input 
            class="input" 
            type="email" placeholder="Email" 
            required
            name="email"
          >
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
          </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left">
              <input 
              class="input" 
              type="password" 
              placeholder="Password" 
              required
              name="password"
            >
              <span class="icon is-small is-left">
                <i class="fas fa-key"></i>
              </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Confirm Password</label>
            <div class="control has-icons-left">
              <input 
              class="input" 
              type="password" 
              placeholder="Password" 
              required
              name="password_confirmation"
              id="password_confirmation"
            >
              <span class="icon is-small is-left">
                <i class="fas fa-key"></i>
              </span>
            </div>
        </div>
          <div class="field is-grouped is-grouped-centered">
            <div class="control">
                <button class="button is-primary is-outlined">Submit</button>
            </div>
        </div>
      </form>
    </div>
  </div>

@endsection 