<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="numberAnimate.js"></script>

<style>
  .likes_count {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Set the height to the full viewport height */
  font-size: 150px;
  
}

</style>
    </head>
    <body>
        <div class="container">
            <div class="likes_count">
          <p id="rpm_count"></p>
        <span class="well">0000</span>
      </div>
        <div class="control">
            <input type="text" id="like_input" class="form-control" style="display: none;">
        </div>
    </div>
    <div id="counter"></div>
    </body>

<script>


// Define the URL to send the POST request to
const url = "./index2.php";

// Define the data to send in the POST request
const data = {
  vid_link: "https://fb.watch/iZPJSC4tU4/"
};

// Define a recursive function to make the POST request repeatedly

let like_array = [];
function makePostRequest() {
  $.post(url, data, function(response) {
    // Handle the response from the server
    $("#likes").html(response);
    $("#like_input").val(response);
    like_data = response;


// Remove any commas from the string using the replace() function
const stringWithoutCommas = response.replace(",", "");

// Convert the string to an integer using parseInt()
const likeInt = parseInt(stringWithoutCommas);

    
    like_array.push(likeInt);

    if(like_array.length > 14) {
      let last_like = like_array[like_array.length-1];
      let rpm_likes = like_array[like_array.length-15];
      let distance = last_like - rpm_likes;

    $("#rpm_count").html( "RPM: " + distance);
    }

    console.log(like_array);

    // Call the function again to make another POST request
    makePostRequest();
  });
}

  var $span = $('span');
  $span.numberAnimate();
// Set up a timer to check the input value every 100 milliseconds
setInterval(function() {
    var val = $('input[type=text]').val();
    $span.numberAnimate('set', val);

}, 100);

// Call the function to start making POST requests
makePostRequest();


</script>