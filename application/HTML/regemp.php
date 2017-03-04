

<!DOCTYPE html>
<html ng-app="candidateRegAction">
<head>
<meta charset="UTF-8" />
<meta name="format-detection" content="telephone=no" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="img/icons/favicon.png" rel="icon" />
<title>Background Evalution System | Register Employee</title>
<meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
<!-- CSS Part Start-->
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet-skin3.css" />

<link href='//fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
   
<!-- customize css -->
  <link rel="stylesheet" type="text/css" href="css/customize.css" />
  
  <style>
  .toggle{
	  
	  display:none;
  }
  </style>
  <script>
   
  
  // define application
angular.module("candidateRegAction", [])
.controller("canReg", function($scope,$http,$window){
	
	
	 
    $scope.users = [];
    $scope.caninfo = {};
	$scope.results = [];
	$scope.resultByPanCard= [];
    
    // function to insert or update user data to the database
    $scope.saveCanInfo = function(type){
        var data = $.param({
            'data':$scope.caninfo,
            'type':type,
			'comId':16        });
		
		console.log("Candidate data==>"+data);

	var canname = document.canRegForm.canname.value;
	var canname = document.canRegForm.canname.value;
	var candob = document.canRegForm.candob.value;
	var canemail = document.canRegForm.canemail.value;
	var canpassword = document.canRegForm.canpassword.value;
	var canconfirmpassword = document.canRegForm.canconfirmpassword.value;
	var cancontactno = document.canRegForm.cancontactno.value;
	var cangender = document.canRegForm.cangender.value;
	var canpaddress = document.canRegForm.canpaddress.value;
	var cancosaddress = document.canRegForm.cancosaddress.value;
	
	
	//var agree = document.compForm.agree.value;
	
    //<===============Field Validation Start==============>
		
	/*if( canname == "" || candob == "" || canemail == "" || canpassword == "" || canconfirmpassword == "" || cancontactno == "" || cangender == "" || canpaddress == "" || cancosaddress == "" )
   {
       $(window).scrollTop(0);
	   messageError("Pleaase Enter All Requred Field");
	   return false;
   }
   /*
   if(canpaddress != cancosaddress)
   {
	   $(window).scrollTop(0);
	   messageError("Password does not match");
	   return false;
   }*/
   
  if (!$scope.checked) {
	    $(window).scrollTop(0);
		messageError("Pleaase Accept Terms and codition");
		return false;
                    
                } 
   
   //<===============Field Validation End==============>
   
  var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        $http.post("candidateAction.php", data, config).success(function(response){
				console.log(response);
			if(response.status == 'OK'){
				console.log(response);
		        $scope.canRegForm.$setPristine();
                $scope.tempUserData = {};
                  $(window).scrollTop(0);
                messageSuccess(response.msg);
            }else{
                messageError(response.msg);
            }
        });
    };
    
    // function to add user data
    $scope.regCan = function(){
	$scope.saveCanInfo('saveCanInfo');

    };
                       /*<====function to search all candiate add by company start here=====>*/
					   $scope.canregform = true;
					   $scope.searchAllCandidate = function(){
						alert("searchAllCandidate profile");
						$scope.candidatebypancard = false;
						$scope.canregform = false;
						$scope.allcandidate = true;
						$scope.ShowAllCandidate();
						//$scope.ShowHide();
						//$scope.showCompnaydetail();
                };
				
				$scope.ShowAllCandidate = function(type){
						var data = $.param({
						'data':'',
						'type':'view',
						'tableName':'t_candidate_reg',
						'comId':16,
						'searchBy':'allCandidate'
						});
						var config = {
						headers : {
						'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
						}
						};
						$http.post("action.php", data, config).success(function(response){
						console.log(data);
						console.log(response);
						if(response.status == 'OK'){
						console.log(response.status);
						$scope.results = response.records;
						// $(window).scrollTop(0);
						}else{
						console.log(response.status);
						messageError(response.msg);
						}
						});
						};
				
				 /*<====function to end all candiate  by company start here=====>*/
					  
				
				
				 /*<====function to start all candiate search by pancard here=====>*/
				 
				  $scope.searchByPancard = function(){
						alert("searchByPancard profile");
						$scope.canregform = false;
						$scope.allcandidate = false;
						$scope.candidatebypancard = true;
				 };
				 
				 	$scope.ShowCandidateByPancard = function(type){
					     var data = $.param({
						'data':'',
						'type':'view',
						'tableName':'t_candidate_reg',
						'panCardId':$scope.caninfo.candpancardno,
						'searchBy':'panCard'
						
						});
						var config = {
						headers : {
						'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
						}
						};
						
						console.log("Pan card Number==>"+$scope.caninfo.candpancardno)
						$http.post("action.php", data, config).success(function(response){
						console.log(data);
						console.log(response);
						if(response.status == 'OK'){
						console.log(response.status);
						$scope.resultByPanCard = response.records;
						// $(window).scrollTop(0);
						}else{
						console.log(response.status);
						messageError(response.msg);
						}
						});
						};
				/*<====function to end all candiate search by pancard here=====>*/
				 
				
				
				
				
				$scope.showMoreDetail = function(result){
						alert("Current Class");
						$scope.tempUserData = {
            canid:result.canid,
            verify:result.verify
           
        };
		var id=$scope.tempUserData.canid;
		console.log("$scope.tempUserData==?"+id);

	//	$('#'.id).css('display', '');
	$(".toggle").css("display", "none");
	
		 document.getElementById(id).style.display='block';
		
	//	$("#voltaic_holder").css("position", "relative");
			
				 };
 
});
    
	
	
	function messageError(msg){
		
		$('.alert-danger > p').html(msg);
        $('.alert-danger').show();
        $('.alert-danger').delay(5000).slideUp(function(){
            $('.alert-danger > p').html('');
        });
		
	}
	
		function messageSuccess(msg){
		
		 $('.alert-success').removeClass('hidden');
        $('.alert-success > p').html(msg);
        $('.alert-success').show();
        $('.alert-success').delay(5000).slideUp(function(){
            $('.alert-success > p').html('');
        });
	
	}
  </script


<!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide" ng-controller="canReg">
  <div id="header">
    <!-- Top Bar Start-->
    
    <!-- Top Bar End-->
    <style>
  #logo a img {
    height: 100px !important;
}
/* required style*/ 
.none{display: none;}

/* optional styles */
table tr th, table tr td{font-size: 1.2rem;}
.row{ margin:20px 20px 20px 20px;width: 100%;}
.glyphicon{font-size: 20px;}
.glyphicon-plus{float: right;}
a.glyphicon{text-decoration: none;cursor: pointer;}
.glyphicon-trash{margin-left: 10px;}
.alert{
    width: 50%;
    border-radius: 0;
   
}
</style>

<nav id="top" class="htop">
      <div class="container">
        <div class="row"> <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
          <div class="pull-left flip left-top">
            <div class="links">
              <ul>
                <li class="mobile"><i class="fa fa-phone"></i>+91 9898777656</li>
                <li class="email"><a href="mailto:info@LetGo.com"><i class="fa fa-envelope"></i>info@imtsllp.org</a></li>
                
                
              </ul>
            </div>
          </div>
          <div id="top-links" class="nav pull-right flip">
            <ul>
              <li><a href="cmp_profile.php"><i class="fa fa-user"></i></a></li>
              <li><a href="index.php">Logout</a></li>
              
            </ul>
          </div>
        </div>
      </div>
    </nav>
		<div class="alert alert-danger none" style="margin-left: 27%;margin-bottom: -49px;"><p></p></div>
        <div class="alert alert-success none" style="margin-left: 27%;margin-bottom: -49px;"><p></p></div>


<!-- Header Start-->
    <header class="header-row">
      <div class="container">
        <div class="table-container">
          <!-- Logo Start -->
          <div class="col-table-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 inner">
            <div id="logo"><a href="index.html"><img class="img-responsive" src="img/logo.png" title="LetGo" alt="LetGo" /></a></div>
          </div>
          <!-- Logo End -->
          
        </div>
      </div>
    </header>
    <!-- Header End-->
    <!-- Main Menu Start-->
    <nav id="menu" class="navbar">
      <div class="container">
        <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a class="home_link" title="Home" href="cmp_profile.php"><span>Home</span></a></li>
            
           <li class="dropdown"><a>Services</a>
              <div class="dropdown-menu">
                <ul>
                  
                  <li> <a href="#">1</a></li>

                  <li> <a href="#">1</a></li>
                  <li> <a href="#">1</a></li>                
                </ul>
              </div>
              </li>
           <li><a href="#">Check Candidate Status</a></li>
           <li class="contact-link"><a href="regemp.php">Register Employee</a></li>
		   
		    <li class="dropdown"><a>Search</a>
              <div class="dropdown-menu">
                <ul>
                  
                  <li> <a ng-click="searchByPancard()">By PanCard</a></li>
                  <li> <a ng-click="searchByAadharcard()">By Aadharcard</a></li>
				  <li> <a ng-click="searchAllCandidate()">List of all Candidate</a></li>
                    
                               
                </ul>
              </div>
              </li>
		   
            <li class="dropdown custom-link-right"><a>My Account</a>
              <div class="dropdown-menu">
                <ul>
                  
                  <li> <a href="change-password.php">Change Password</a></li>
                </ul>
              </div>
            </li>          
          </ul>
        </div>
      </div>
    </nav>
    <!-- Main Menu End-->  </div>
  <div id="container">
    <div class="container">
    <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <!--<li><a href="index.php">Account</a></li>-->
        <li><a href="regemp.php">Register employee</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-xs-12" ng-show = "canregform">
        <form class="form-horizontal" name="canRegForm">
                  <fieldset id="account" style="padding-right: 6%;">
                    <legend><h2>Register Employee here</h2></legend>
                    <div style="display: none;" class="form-group required">
                      <label class="col-sm-2 control-label">Customer Group</label>
                      <div class="col-sm-10">
                        <div class="radio">
                          <label>
                            <input type="radio" checked="checked" value="1" name="customer_group_id">
                            Default</label>
                        </div>
                      </div>
                    </div>
					
					   
                    <div class="form-group required">
                      <label for="input-firstname" class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="input-firstname" placeholder="Name" value="" ng-model="caninfo.canname"  name="canname">
                      </div>
                    </div>
					
					<div class="form-group required">
					 <label for="input-firstname" class="col-sm-3 control-label">Blood Group</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="input-firstname" placeholder="Blood Group" ng-model="caninfo.canbloodgroup" value="" name="canbloodgroup">
                      </div>
                    </div>
					<div class="form-group required">
                      <label for="input-email" class="col-sm-3 control-label">Gender</label>
                      <div class="col-sm-9 radio">
                        
                         <label><input type="radio" ng-model="caninfo.cangender" ng-value="'male'"  name="cangender">Male</label>
                         <label><input type="radio" ng-model="caninfo.cangender" ng-value="'female'"  name="cangender">Female</label>
                      </div>
                    </div>
					<div class="form-group required">
                      <label for="input-firstname" class="col-sm-3 control-label">Aadhar No.</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="input-firstname" placeholder="Aadhar No." ng-model="caninfo.canaadharno" value="" name="canaadharno">
                      </div>
                    </div>
					
                    <div class="form-group required">
                      <label for="input-firstname" class="col-sm-3 control-label">PAN</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="candpanno" placeholder="PAN" value="" ng-model="caninfo.candpanno" name="candpanno">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-firstname" class="col-sm-3 control-label">ESIC</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="canesic" placeholder="ESIC" value="" ng-model="caninfo.canesic" name="canesic">
                      </div>
                    </div>
					
					<div class="form-group required">
                      <label for="input-firstname" class="col-sm-3 control-label">PF NO</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="canpfno" placeholder="ESIC" value="" ng-model="caninfo.canpfno" name="canpfno">
                      </div>
                    </div>
					
                     <div class="form-group required">
                      <label for="input-firstname" class="col-sm-3 control-label">DOB</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="input-firstname" placeholder="DOB" value="" ng-model="caninfo.candob" name="candob">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-email" class="col-sm-3 control-label">E-Mail</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="" ng-model="caninfo.canemail" name="canemail">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-lastname" class="col-sm-3 control-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="input-password" placeholder="Password" value="" ng-model="caninfo.canpassword" value="" name="canpassword">
                      </div>
                    </div>
                     <div class="form-group required">
                      <label for="input-lastname" class="col-sm-3 control-label">Confirm Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="input-password" placeholder="Confirm Password" value="" ng-model="caninfo.canconfirmpassword" value="" name="canconfirmpassword">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-email" class="col-sm-3 control-label">Contact Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="input-email" placeholder="Contact Number" value="" ng-model="caninfo.cancontactno" name="cancontactno">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-telephone" class="col-sm-3 control-label">Permanent Address </label>
                      <div class="col-sm-9">
                        <input type="tel" class="form-control" id="input-city" placeholder="Permanent Address " value="" ng-model="caninfo.canpaddress" value="" name="canpaddress">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label for="input-fax" class="col-sm-3 control-label">Correspondence  Address </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="input-fax" placeholder="Correspondence  Address " value="" ng-model="caninfo.cancosaddress"  value="" name="cancosaddress">
                      </div>
                    </div>
                    
                    
					<div class="form-group required">
                      <label for="input-fax" class="col-sm-3 control-label">Employment details, starting from latest</label>
                      <div class="col-sm-8">
                        <textarea style="resize:none; " type="text" class="form-control" id="input-fax" ng-model="caninfo.candetail" ng-model="caninfo.candetail" placeholder="Employment details, starting from latest" value="" name="zip"></textarea>
                      </div>
                    </div>

                  </fieldset>
                 
                  <div class=" row buttons" style="border:none;">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 pull-left">
                      <input type="checkbox" value="1" name="agree"ng-model="checked">
                      &nbsp;I have read and agree to the <a class="agree" href="privacy.php"><b>Privacy Policy</b></a> &nbsp;<br><br>
                      <a href="candidate_profile.php"> <input type="submit" class="btn btn-primary" ng-click="regCan()" value="Continue"></a>
                    </div>
                  </div>
                </form>
              
                </fieldset> 
                </div>    
				
				<!-- Div Start here  for searcch all canditdate by company---->
				
				
				
			<div class="col-md-12 panel panel-default users-content " ng-show = "allcandidate">
			
			
   <div class="table-responsive"   id="">
      <table class="table table-striped">
         <thead>
            <tr>
               <th>
                  No
               </th>
               <th>
                  Candidate Name
               </th>
               <th>
                  Blood Group
               </th>
               <th>
                  Gender
               </th>
               <th>
                  Action
               </th>
            </tr>
         </thead>
         <tr ng-repeat-start="result in results" >
            <td>
            <td>{{$index + 1}}</td>
            </td>
            <td>
               {{result.canname}}
            </td>
            <td>
               {{result.canbloodgroup}}
            </td>
            <td>
               {{result.cangender}}
            </td>
         <td>
		 <button type="button" class="btn btn-danger btn-cons" data-ng-click="showMoreDetail(result)">Show More Detail</button>
		 </td>
         </tr>
		 
		 
		 <tr  class="toggle" ng-attr-id="{{result.canid}}" >
		<td  >
		<div >
		<table>
		<tr>
		<th>
		Hello
		</th>
		<td>
		Hello
		</td>
		</tr>
		</table>
		</td>
		</tr>
		 <tr  ng-repeat-end>
		
		 
		 </tr>
      </table>
   </div>
</div>
				
				<div class="col-md-12 panel panel-default users-content " ng-show = "candidatebypancard">
				
				<div class="row">
			  <div class="col-md-12">
			    <div class="col-md-4">
				 <label for="input-fax" class="col-sm-3 control-label">Enter PAN card No</label>
               </div>
			   <div class="col-md-4">
				    <input type="text" class="form-control" id="input-fax" placeholder="PAN card no" ng-model="caninfo.candpancardno"  value="">
               </div>
			   
			   <div class="col-md-4">
				   <button type="button" title="verify" class="btn btn-danger btn-cons" ng-click="ShowCandidateByPancard()" >Filter</button>

               </div>
			
			  </div>
			</div>
				
   <div class="table-responsive"   id="">
      <table class="table table-striped">
         <thead>
            <tr>
               <th>
                  No
               </th>
               <th>
                  Candidate Name
               </th>
               <th>
                  Blood Group
               </th>
               <th>
                  Genderm
               </th>
               
            </tr>
         </thead>
         <tr ng-repeat="resultpancard in resultByPanCard" >
            <td>
            <td>{{$index + 1}}</td>
            </td>
            <td>
               {{resultpancard.canname}}
            </td>
            <td>
               {{resultpancard.canbloodgroup}}
            </td>
            <td>
               {{resultpancard.cangender}}
            </td>
        
         </tr>
      </table>
   </div>
</div>
				
				
				
            <!-- banner end -->
          </div>
          
        <!--Middle Part End-->
      </div>
    </div>
  </div>
  
  <!--Footer Start-->
   <footer id="footer">
    <div class="fpart-first">
      <div class="container">
        <div class="row">
          <div class="contact col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <h5>Contact Details</h5>
            <ul>
              <li class="address"><i class="fa fa-map-marker"></i>Central Square, 22 Hoi Wing Road, New Delhi, India</li>
              <li class="mobile"><i class="fa fa-phone"></i>+91 9898777656</li>
              <li class="email"><i class="fa fa-envelope"></i>Send email via our <a href="contact-us.php">Contact Us</a>
            </ul>
          </div>
          <div class="column col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h5>Information</h5>
            <ul>
              <li><a href="about-us.php">About Us</a></li>
              <li><a href="contact-us.php">Contact Us</a></li>
              <li><a href="privacy.php">Privacy Policy</a></li>
              <li><a href="t&c.php">Terms &amp; Conditions</a></li>
            </ul>
          </div>
          
          <!---<div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
            <h5>Extras</h5>
            <ul>
              <li><a href="#">Brands</a></li>
              <li><a href="#">Gift Vouchers</a></li>
              <li><a href="#">Affiliates</a></li>
              <li><a href="#">Specials</a></li>
            </ul>
          </div>-->
          <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <h5>My Account</h5>
            <ul>
              <li><a href="login.php">My Account</a></li>
              <li><a href="cmp_login.php">Company_Login</a></li>
              <li><a href="candidate_login.php">Candidate_Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="fpart-second">
      <div class="container">
        <div id="powered" class="clearfix">
          <div class="powered_text pull-left flip">
            <p>© Copyright 2016. <a href="http://satyamitsolution.com" target="_blank">Satyam iT Solution.</a>All rights reserved.</p>
          </div>
          <div class="social pull-right flip"> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/facebook.png" alt="Facebook" title="Facebook"></a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/twitter.png" alt="Twitter" title="Twitter"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/google_plus.png" alt="Google+" title="Google+"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/pinterest.png" alt="Pinterest" title="Pinterest"> </a> <a href="#" target="_blank"> <img data-toggle="tooltip" src="image/socialicons/rss.png" alt="RSS" title="RSS"> </a> </div>
        </div>
       
      </div>
    </div>
    <div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
  </footer>  <!--Footer End-->
 
 
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- JS Part End-->

<script>
  
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>
</body>

</html>