@extends('template')

@section('content')
	<h1>Create or Edit Contract</h1>
	{!! $form->display() !!}

	<div class="row">
		<div class="col-6">From Months</div>
		<div class="col-6">Weeks Sick Pay</div>
	</div>
	<div class="row">
		<div class="col-6"><input class="text" name="from_months[]" class="form-control" /></div>
		<div class="col-6"><input class="text" name="weeks_sick_pay[]" class="form-control" /></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="text" name="from_months[]" class="form-control" /></div>
		<div class="col-6"><input class="text" name="weeks_sick_pay[]" class="form-control" /></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="text" name="from_months[]" class="form-control" /></div>
		<div class="col-6"><input class="text" name="weeks_sick_pay[]" class="form-control" /></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="text" name="from_months[]" class="form-control" /></div>
		<div class="col-6"><input class="text" name="weeks_sick_pay[]" class="form-control" /></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="text" name="from_months[]" class="form-control" /></div>
		<div class="col-6"><input class="text" name="weeks_sick_pay[]" class="form-control" /></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="text" name="from_months[]" class="form-control" /></div>
		<div class="col-6"><input class="text" name="weeks_sick_pay[]" class="form-control" /></div>
	</div>

	<div class="row">
		<div class="col-12"><input type="submit" value="Add/Edit Contract" class="form-control btn btn-success" /></div>
	</div>

</form>

@endsection
