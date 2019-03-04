
var config = {
    apiKey: "AIzaSyBjLH-kuTHlEudLkd0QTuO5r8Eu1CoY2As",
    authDomain: "thriffshop.firebaseapp.com",
    databaseURL: "https://thriffshop.firebaseio.com",
    projectId: "thriffshop",
    storageBucket: "",
    messagingSenderId: "469050009816"
};
firebase.initializeApp(config); 



if(ukeys != ''){
  console.log(ukeys);
  var messages = firebase.database().ref('admindata/messages/' + ukeys).orderByKey();
  messages.on('child_added', function(snapshot) { 
    var msg = snapshot.val(); 
    if (msg.reply == ''){
      $('#message').append('<tr><td><p class="pull-right">'+msg.send+'</p></td> </tr>');
    } else {
      $('#message').append('<tr><td><p class="pull-left">'+msg.reply+'</p></td> </tr>');
    }
  });

}

function sendmessages(key){
  var message = $('#msg').val();
  console.log(message);
  let sendadmin = firebase.database().ref('admindata/messages/' +key).push();
  sendadmin.set({
      'send': message,
      'reply': ''
  });
  let sendclient = firebase.database().ref('maindata/'+key+'/messages/admin').push();
  sendclient.set({
      'send': '',
      'reply': message
  });
  $('#msg').val('');
}