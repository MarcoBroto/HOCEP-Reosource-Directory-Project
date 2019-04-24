<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap Import -->
	<link href="bootstrap/flatly.bootstrap.min.css" rel="stylesheet">
	<!-- Used for multi-select dropdown menu -->
	<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
	<!-- Page Stylesheet -->
	<link href="css/style.test.css" rel="stylesheet">

	<!-- Bootstrap JS imports -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- VueJS imports -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
	<script>

	</script>

</head>

<body>

<div id="resource-table-app">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-0 mb-4">
		<a class="navbar-brand" href="/"><img src="assets/logo.png"></a>
	</nav>

	<div class="container-fluid center bg-light py-3">
			<h1>El Paso Oppurtunity Center<br>Resource Directory</h1>
			<?
				include 'php/fetchOptions.php';

				fetchOptions();
			?>
			<div class="container center my-3" style="width: 80vw;">
				<h5>Search by Name</h5>
				<div class="row mb-4 bg-secondary px-1 py-1 rounded">
					<multiselect :options="['hello']" multiple="false" searchable="true" close-on-select="false" show-labels="true" placeholder="Search for a Resource or Organization by Name"></multiselect>
				</div>
				<h6>Or</h6>
				<h5>Filter by Criteria</h5>
				<div class="row mt-4">
					<div class="col col-4 pr-2 pl-0 py-0 rounded">
						<multiselect
							v-model="text" 
		    			:options="['hello','world']"
		    			multiple="true"
		    			placeholder="Filter by Category"
		    			optionsLimit="4"
		    			max="5">
		    		</multiselect>
		    	</div>
		    	<div class="col col-4 rounded">
		    		<multiselect
							v-model="text" 
		    			:options="['hello','world']"
		    			multiple="true"
		    			placeholder="Filter by Services Offered"
		    			optionsLimit="4"
		    			max="5">
		    		</multiselect>
		    	</div>
		    	<div class="col col-4 pl-2 pr-0 py-0 rounded">
						<multiselect
							v-model="text" 
		    			:options="['hello','world']"
		    			multiple="true"
		    			placeholder="Filter by Zipcode"
		    			optionsLimit="4"
		    			max="5">
		    		</multiselect>
		    	</div>
				</div>
				<div class="row">
					<div class="col-12 custom-control custom-checkbox" style="zoom: 0;">
      				<input type="checkbox" class="custom-control-input" id="insuranceCheck" style="">
      				<label class="custom-control-label" for="insuranceCheck" style="">Requires Insurance</label>
      			</div>
				</div>
			</div>
			<button v-on:click="welcome = false" class="btn btn-lg btn-info">Search</button>
	</div>

	<hr>
	<div v-if="welcome" class="container bg-light center py-4"><h1>Welcome to the El Paso Resource Directory for People Experiencing Homelessness</h1><br><h2>This resource directory is designed to be an ever-evolving guide of services available to people experiencing homelessness<br> in El Paso, Texas. The main goal of the directory is to expand the range of referral services in our community by facilitating interagency collaboration. Feel free to download a copy of this directory for your own records. We appreciate your continued commitment to providing those facing homelessness with the best, culturally competent care.<br><br>DISCLAIMER: Due to the ever-changing nature of programs, organizations, and agencies, no guarantee is given that all information is up-to-date and accurate. The directory is meant to be a guide, so contacting the agencies prior to referral is recommended.</h2></div>
	<div v-else class="container-fluid border-success rounded" style="width: 100%;">
		<h2 class="center">Results</h2>
		<!-- Vue Component -->
		<resource-view v-for="(resource, ind) in resources" :resource="resource" :ind="ind"></resource-view>
		<div class="center ">
			<h4 class="text-primary">Your search returned {{ this.resources.length }} results.</h4>
		</div>
	</div>

	<hr>

	<!-- Footer -->
	<footer class="page-footer font-small blue pt-4">
		<!-- Footer Links -->
		<div class="container-fluid text-center text-md-left">
			<!-- Grid row -->
			<div class="row">
				<!-- Grid column -->
				<div class="col-md-6 mt-md-0 mt-3">
					<!-- Content -->
					<h5 class="text-uppercase">Footer Content</h5>
					<p>Here you can use rows and columns here to organize your footer content.</p>
				</div>
				<hr class="clearfix w-100 d-md-none pb-3">
				<!-- Grid column -->
				<div class="col-md-3 mb-md-0 mb-3">
						<!-- Links -->
						<h5 class="text-uppercase">Links</h5>
						<ul class="list-unstyled">
							<li>
								<a href="#!">Link 1</a>
							</li>
							<li>
								<a href="#!">Link 2</a>
							</li>
							<li>
								<a href="#!">Link 3</a>
							</li>
							<li>
								<a href="#!">Link 4</a>
							</li>
						</ul>
					</div>
					<!-- Grid column -->
					<div class="col-md-3 mb-md-0 mb-3">
						<!-- Links -->
						<h5 class="text-uppercase">Links</h5>
						<ul class="list-unstyled">
							<li>
								<a href="#!">Link 1</a>
							</li>
							<li>
								<a href="#!">Link 2</a>
							</li>
							<li>
								<a href="#!">Link 3</a>
							</li>
							<li>
								<a href="#!">Link 4</a>
							</li>
						</ul>
					</div>
			</div>
		</div>
		<!-- Footer Links -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2018 Copyright:
			<a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
		</div>
		<!-- Copyright -->

	</footer>
</div>

<script src="test/Contact.js"></script>
<script src="test/Category.js"></script>
<script src="test/Service.js"></script>
<script src="test/Resource.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<!-- Used for multi-select dropdown menu -->
<script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
<script src="vue/testVue.js"></script>
<script src="js/connect.js"></script>
<script src="js/fetchMultiselectOptions.js"></script>

</body>
</html>