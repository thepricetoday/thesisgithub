angular.module('starter.controllers', ['ionic'])
.controller('TabsCtrl', function($scope, $timeout,$ionicLoading,sessionService) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //});
  sessionService.set('islogin','FALSE');
  $scope.cart = [];
  // Setup the loader
   $ionicLoading.show({
    templateUrl:'templates/intro.html',
    animation: 'fade-in',
    showBackdrop: false,
    maxWidth: 10,
    showDelay: 0
  });
   // Set a timeout to clear loader, however you would actually call the $ionicLoading.hide(); method whenever everything is ready or loaded.
  $timeout(function () {
    $ionicLoading.hide();
  }, 2000);

  $scope.getCartPrice = function () {
    var total = 0;
    $scope.cart.forEach(function (product) {
      total += product.price * product.quantity;
    });
    return total;
  };

}) 




.controller('DashCtrl', function($scope,$http,$timeout,$ionicPopup) {

$scope.provincelist = $http.get('http://localhost/prisewise(web)/productprice/place').
    then(function(response) { 
      console.log(response);
      $scope.provinces = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

  $scope.provinceSelect = {};

  // An elaborate, custom popup
  var myPopup = $ionicPopup.show({
    template: '<select  name="provinceSelect" id="provinceSelect" ng-model="provinceSelect.ID"><option ng-repeat="province in provinces"  ng-model="selectedprovince" value="{{province.ID}}">{{ province.placeNAME }}</option></select>',
    title: 'Where are you from?',
    subTitle: 'Only for Region 10',
    scope: $scope,
    cssClass: 'myPopup',
    buttons: [
      {
        text: '<b>Save</b>',
        type: 'button-positive',
        onTap: function(e) {
          if (!$scope.provinceSelect.ID) {
            //don't allow the user to close unless he enters wifi password
            e.preventDefault();
            console.log('ayu');
          } else {
            return $scope.provinceSelect.ID;
            console.log('guba');
          }
        }
      }
    ]
  });
  $scope.placeModal = function(){
    // An elaborate, custom popup
  var myPopup = $ionicPopup.show({
    template: '<select  name="provinceSelect" id="provinceSelect" ng-model="provinceSelect.ID"><option selected>Select</option><option ng-repeat="province in provinces"  ng-model="selectedprovince" value="{{province.ID}}">{{ province.placeNAME }}</option></select>',
    title: 'Where are you from?',
    subTitle: 'Only for Region 10',
    scope: $scope,
    cssClass: 'myPopup',
    buttons: [
      {
        text: '<b>Save</b>',
        type: 'button-positive',
        onTap: function(e) {
          if (!$scope.provinceSelect.ID) {
            //don't allow the user to close unless he enters wifi password
            e.preventDefault();
            console.log('ayu');
          } else {
            return $scope.provinceSelect.ID;
            console.log('guba');
          }
        }
      }
    ]
  });
   myPopup.then(function(res) {
     $scope.uploaddata = $http.get('http://localhost/prisewise(web)/productprice/uploaddata/'+res).
    then(function(response) { 
      $scope.updata = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
     $scope.uploaddata = $http.get('http://localhost/prisewise(web)/productprice/placeid/'+res).
    then(function(response) { 
      $scope.places = response.data;

    }, function(response) {
     console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
    $scope.pricelist = $http.get('http://localhost/prisewise(web)/productprice/pricebyplace/'+res).
    then(function(response) { 
      $scope.list = response.data;
    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

  });
  }
  myPopup.then(function(res) {
     $scope.uploaddata = $http.get('http://localhost/prisewise(web)/productprice/uploaddata/'+res).
    then(function(response) { 
      $scope.updata = response.data;

    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
     $scope.uploaddata = $http.get('http://localhost/prisewise(web)/productprice/placeid/'+res).
    then(function(response) { 
      $scope.places = response.data;

    }, function(response) {
     console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });
    $scope.pricelist = $http.get('http://localhost/prisewise(web)/productprice/pricebyplace/'+res).
    then(function(response) { 
      $scope.list = response.data;
    }, function(response) {
      console.log(response);
      // called asynchronously if an error occurs
      // or server returns response with an error status.
    });

  });

 $scope.addToCart = function (product) {
    var found = false;
    $scope.cart.forEach(function (item) {
      if (item.name === product.name) {
        item.quantity++;
        found = true;
      }
    });
    if (!found) {
      $scope.cart.push(angular.extend({quantity: 1}, product));
    }
  };


 
  
})

.controller('ChatsCtrl', function($scope, Chats) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
 
  $scope.purchased = function(product) {
    console.log($scope.cart);
    $scope.cart.splice($scope.cart.indexOf(product), 1);
    console.log($scope.cart);
  };

})


.controller('AccountCtrl', function($scope,$http,$ionicPopup, $location,loginService,sessionService) {
 $scope.field = '';

 console.log(loginService.isLoggedIn());
console.log(sessionService.get('islogin'));

  $scope.$on('$ionicView.beforeEnter', function () {

      if (sessionService.get('islogin') == 'TRUE') {
       console.log(loginService.isLoggedIn());
        $scope.name = sessionService.get('username');
        console.log($scope.name);
      }
     else{
         $scope.user= {}
            var loginPopup = $ionicPopup.show({
              templateUrl: 'templates/login.html',
              scope: $scope,
              buttons: [{
                  text: '<b>Login</b>',
                  type: 'button-positive',
                  onTap: function(e) {
                    if (!$scope.user.username && !$scope.user.password ) {
                        //don't allow the user to close unless he enters wifi password
                        e.preventDefault();
                       
                      } else {
                        return $scope.user;
                        console.log('guba');
                      }
                    // console.log(loginService.login(user,$scope));
                    // console.log($scope.user);
                  }
                }]
              })
        loginPopup.then(function(res) {
        loginService.login(res,$scope);
 });
 
$scope.guest = function(){
   loginPopup.close();
  $location.path('tab/dash')
}
$scope.register = function(){
    $scope.adduser= {}
            var registerPopup = $ionicPopup.show({
              templateUrl: 'templates/register.html',
              scope: $scope,
              cssClass: 'registerPopup',
              buttons: [{
                  text: '<b>Register</b>',
                  type: 'button-positive',
                  onTap: function(e) {
                    if (!$scope.user.username && !$scope.user.password ) {
                        //don't allow the user to close unless he enters wifi password
                        e.preventDefault();
                       
                      } else {
                        return $scope.user;
                        console.log('guba');
                      }
                    // console.log(loginService.login(user,$scope));
                    // console.log($scope.user);
                  }
                }]
              })
        loginPopup.then(function(res) {
        loginService.login(res,$scope);
 });
  
}
      }

      
    });



$scope.logout = function(){
  loginService.logout();
   $scope.user= {}
            var loginPopup = $ionicPopup.show({
              templateUrl: 'templates/login.html',
              scope: $scope,
              buttons: [{
                  text: '<b>Save</b>',
                  type: 'button-positive',
                  onTap: function(e) {
                    if (!$scope.user.username && !$scope.user.password ) {
                        //don't allow the user to close unless he enters wifi password
                        e.preventDefault();
                       
                      } else {
                        return $scope.user;
                        console.log('guba');
                      }
                    // console.log(loginService.login(user,$scope));
                    // console.log($scope.user);
                  }
                }]
              })

 }

})

.controller('RegisterCtrl', function($scope,$http,$rootScope) {
 
 $rootScope.newAcc = {};
 $scope.signup = function(){
    $http.post("http://localhost/prisewise(web)/productprice/addUserMobile/" , $rootScope.newAcc)
     .then(function(response) {
      console.log(response);  
    }, function(response) {
          console.log(response);
        }); 
        
  };
 
})
.controller('ReportCtrl', function($scope,$http,$rootScope,sessionService) {


      $scope.sendTheMail = function() {
        // create a new instance of the Mandrill class with your API key
        var m = new mandrill.Mandrill('IHNhkCwvtG94atpLU836zA');
        // Collect Inputs
        sessionService.set('usercompletename',user.completename);
        sessionService.set('usercontact',user.contact);
        sessionService.set('useremail',user.email);
        sessionService.set('useraddress',user.address);
        var FirstName = username;
        var MarketName = document.getElementById('MarketName').value;
        var StallNumeber = document.getElementById('StallNumeber').value;
        var ProductName = document.getElementById('ProductName').value;
        var VendorsProductPrice = document.getElementById('VendorsProductPrice').value;
        var emailBody = "<strong>Client Information</strong><br>From: " + LastName +","+ FirstName + "<br>Contact Number: " + ContactNumber + "<br><br><strong>Vendor Information</strong><br>City: " + City + "<br>Market Name: " + MarketName + "<br>Stall Numeber: " + StallNumeber + "<br>Product Name: " + ProductName + "<br>Vendor's Product Price: " + VendorsProductPrice;

        var params = {

            "message": {
                "from_email":Email,
                "to":[{"email":"cheje.vallecera@gmail.com"}],
                "subject": "Price Today App Report Vendor",
                "html": emailBody
            }
        };

        m.messages.send(params);
      };
})



.factory('sessionService',function($window,$ionicHistory){
    return {
      set:function(key,value){
        return $window.localStorage[key] = value;
      },
      get:function(key){
        return $window.localStorage[key] || defaultValue;
      },
      destroy:function(key){
       $window.localStorage.clear();
      $ionicHistory.clearCache();
      $ionicHistory.clearHistory();
      }
    };

})

.factory('loginService',function($http,$location,$ionicPopup,sessionService){
      return{
        login:function(user,scope){
           $http.post("http://localhost/prisewise(web)/productprice/doLogin/" , user).
           then(function(response){
                  if(response.data == 'error'){         
                   scope.field = 'Login field. Check Username/password.'
                   $location.path('/tab/account')
                  }else if(response.data != 'error') {
                    var user =response.data;
                    console.log(user);
                     sessionService.set('userID',user.userID);
                     sessionService.set('username',user.username);
                     sessionService.set('usercompletename',user.completename);
                     sessionService.set('usercontact',user.contact);
                     sessionService.set('useremail',user.email);
                     sessionService.set('useraddress',user.address);
                     sessionService.set('islogin','TRUE');
                     
                  }else{
                     $location.path('/tab/dash')
                  }
            }, function(response) {
               $location.path('/tab/dash')
             }); 
        },
        logout:function(){
          console.log(sessionService.get('islogin'));
          sessionService.destroy('userID');
          sessionService.destroy('username');
          sessionService.destroy('islogin');
          sessionService.set('islogin','FALSE');
          console.log(sessionService.get('islogin'));
        

        },
        isLoggedIn : function() {
        if(sessionService.get('islogin') == 'TRUE' ){
            return true;
           
        } 
        else if (sessionService.get('islogin') == 'FALSE'){
          return false;
            
        }

        else {
            return false;
           
        }
    }
       
      }
       
});


