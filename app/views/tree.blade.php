@extends("templates/master")
@section("head")
    <link rel="stylesheet" type="text/css" href="/css/angular-ui-tree.min.css">
    <script type="text/javascript" src="/js/angular-ui-tree.min.js"></script>


    <script>

    var app = angular.module('treesApp',['ui.tree'], function($interpolateProvider){
		$interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    app.controller('TreeCtrl',function($scope){
		console.log('TreeCtrl');
		/*
		$scope.treeOptions = {
		    accept: function(sourceNodeScope, destNodesScope, destIndex) {
		      console.log("CLICKED");
		      	
		      return true;
		    },
		};*/
		$scope.click  = function(node){
			console.log('CLICKED');
			var nodeData = node.$modelValue;
			console.log(nodeData);

			var id = nodeData.id;

			if(nodeData.nodes!=undefined && nodeData.nodes.length > 0){
				console.log('toggle');
				nodeData.nodes = [];
			} else {
				console.log("Level: " + node.depth());

			
			// call service - get array from server
			
				nodeData.nodes = [
	               {  "id": 12,  "title": "BBBBBBBBBBBBBBBBBBBB", "nodes": [] },
	               {  "id": 13,  "title": "CCCCCCCCCCCCCCCCCCCC", "nodes": [] }
				];
			}
		};
		/*
		$scope.data = [{
			      "id": 1,
			      "title": "node1",
			      "nodes": [
			        {
			          "id": 11,
			          "title": "node1.1",
			          "nodes": [
			            {
			              "id": 111,
			              "title": "node1.1.1",
			              "nodes": []
			            }
			          ]
			        },
			        {
			          "id": 12,
			          "title": "node1.2",
			          "nodes": []
			        }
			      ],
			    }, {
			      "id": 2,
			      "title": "node2",
			      "nodes": [
			        {
			          "id": 21,
			          "title": "node2.1",
			          "nodes": []
			        },
			        {
			          "id": 22,
			          "title": "node2.2",
			          "nodes": []
			        }
			      ],
			    }, {
			      "id": 3,
			      "title": "node3",
			      "nodes": [
			        {
			          "id": 31,
			          "title": "node3.1",
			          "nodes": []
			        }
			      ],
			    }, {
			      "id": 4,
			      "title": "node4",
			      "nodes": [
			        {
			          "id": 41,
			          "title": "node4.1",
			          "nodes": []
			        }
			      ],
			    }];*/
		$scope.data = [{
			      	      "id": 1,
			      	      "title": "AAAAAAAAAAAAAAAAA",
			              "nodes": []
			      }];			    
    });

    </script>
@stop
@section("content")
  <div ng-app="treesApp">	



	  <h2>Tree</h2>
	  <div ng-controller="TreeCtrl">

		    <!-- Nested node template -->
			<script type="text/ng-template" id="nodes_renderer.html">
			  <div ui-tree-handle>
			    <a href="#" nodrag ng-click="click(this)">[+]</a>
			    <% node.title %>
			  </div>
			  <ol ui-tree-nodes="" ng-model="node.nodes">
			    <li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer.html'">
			    </li>
			  </ol>
			</script>


		  <div ui-tree>
		    <ol ui-tree-nodes="" ng-model="data" id="tree-root">
		       <li ng-repeat="node in data" ui-tree-node ng-include="'nodes_renderer.html'"></li>
		    </ol>
		  </div>
	  </div>
  </div>


@stop