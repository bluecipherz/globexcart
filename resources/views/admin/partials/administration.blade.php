<div class="col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			Administrators
		</div>
		<div class="panel-body">
			<table class="table">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Active</th>
				</tr>
				@forelse($admins as $admin)
				<tr>
					<td>{{ $admin->name }}</td>
					<td>{{ $admin->email }}</td>
					<td>{{ $admin->active }}</td>
				</tr>
				@empty
				<tr>
					<td colspan="3">No admins</td>
				</tr>
				@endforelse
			</table>
		</div>
	</div>
<div>