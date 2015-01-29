@extends("templates/master")
@section("head")
	<script src="/js/index.js"></script>
	<script>
	$(document).ready(function(){
		$('#lnkcontact').addClass('active');
	});
	</script>
@stop
@section("content")
	
	@include("includes/menu")

	<div ng-app="myApp">
		<div ng-controller="ContactCtrl">
			<h2>Contacts</h2>
			<div id="info" class="alert alert-success" ng-if="infos">
				<ul>
				<li ng-repeat="info in infos"><% info %></li>
				</ul>
			</div>
			<div id="error" class="alert alert-danger" ng-if="errors">
				<ul>
					<li ng-repeat="error in errors"><% error %></li>
				</ul>
			</div>

			<a href="#" class="btn btn-primary" ng-click="add()">Add New Contact</a>
			<br/><br/>

			<table class="table table-striped table-bordered">
				<thead>
					<tr>	
						<th style="width: 150px">Actions</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
					</tr>	
				</thead>
				<tbody>
					<tr ng-repeat="item in list">
						<td>
							<a href="#" class="btn btn-default" ng-click="edit(item)">Edit</a>
							<a href="#" class="btn btn-warning" ng-click="remove(item)">Remove</a>
						</td>
						<td><% item.name %></td>
						<td><% item.email %></td>
						<td><% item.phone %></td>
					</tr>	
				</tbody>
			</table>
		</div>	
	</div>
@stop
