//FB
window.fbAsyncInit = function() {
  FB.init({
    appId      : '621760831301716',
    xfbml      : true,
    version    : 'v2.2',
    status     : true
  });
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

//Extend jQuery library
$.fn.extend({
  slideRightShow: function() {
    return this.each(function() {
        $(this).show('slide', {direction: 'right'}, 'slow');
    });
  },
  slideLeftHide: function() {
    return this.each(function() {
      $(this).hide('slide', {direction: 'left'}, 'slow');
    });
  },
  slideRightHide: function() {
    return this.each(function() {
      $(this).hide('slide', {direction: 'right'}, 'slow');
    });
  },
  slideLeftShow: function() {
    return this.each(function() {
      $(this).show('slide', {direction: 'left'}, 'slow');
    });
  },
  slideUpShow: function() {
    return this.each(function() {
        $(this).show('slide', {direction: 'up'}, 'slow');
    });
  },
  slideUpHide: function() {
    return this.each(function() {
      $(this).hide('slide', {direction: 'up'}, 'slow');
    });
  },
  slideDownHide: function() {
    return this.each(function() {
      $(this).hide('slide', {direction: 'down'}, 'slow');
    });
  },
  slideDownShow: function() {
    return this.each(function() {
      $(this).show('slide', {direction: 'down'}, 'slow');
    });
  }
});

$(document).ready(function(){
  $('#fbLogin').on('click', function(){
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + ',' + response.id + '.');
        });
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    });
  });
});