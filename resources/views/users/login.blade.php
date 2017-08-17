@extends('layouts.main')
@section('content')

<div class="row">
     <div class="col-md-4 col-md-offset-4">
         <div class="panel panel-default">
            <div class="panel-heading">
	      <h3 class="panel-title">Login</h3>
            </div>
     	 <div class="panel-body">
	     <form action="{{URL::action('UsersController@postLogin')}}" method="post" accept-charset="utf-8">
	        <ul>
		@foreach($errors->all() as $error)
		   <li>{{ $error }}</li><br>
		@endforeach
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<fieldset>
		  <div class="form-group">
		                              <input type="email" name="email" class="form-control" placeholder="email">
					                              </div>
								                              <div class="form-group">
											                                  <input type="password" name="password"  class="form-control" placeholder="password">
															                          </div>
																		                          <button type="submit" class="btn btn-large btn-success btn-block">Login</button>
		</fieldset>
		</ul>
		
	     </form>
	 </div>
     </div>
</div>
</div>
@endsection
