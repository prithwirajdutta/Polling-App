<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Polling App</title>
  </head>
  <body style="padding-top:50px;">
    <center>
        <div class="container">
           <div class="row">
               <div class="col-md-6">
                <div class="card" style="max-width:500px;height:500px;">
                    <img src="https://www.organicfacts.net/wp-content/uploads/2013/05/Fruits3.jpg" width="100%" height="300px" /><br>
                    <form class="form-group" id="frm">
                      <div class="row">
                          <div class="col-md-3">
                            <label>Mangoes : </label> <input type="radio" value="mango" name="fruit" id="fruit" class="form-control" /><br>
                          </div>
                          <div class="col-md-3">
                            <label>Banana : </label> <input type="radio" value="banana" name="fruit" id="fruit" class="form-control" /><br>
                          </div>
                          <div class="col-md-3">
                            <label>Apple : </label> <input type="radio" value="apple" name="fruit" id="fruit" class="form-control" /><br>
                          </div>
                          <div class="col-md-3">
                              <label>Grapes : </label> <input type="radio" value="grape" name="fruit" id="fruit" class="form-control" /><br>
                            </div>
                      </div>
                       <input type="submit" name="pollsub" class="btn btn-outline-danger" />
                    </form>
                </div>
               </div>
               <div class="col-md-6">
                    <div class="card" style="max-width:500px;height:500px;padding-top:100px;">
                        <canvas id="myChart"></canvas>
                    </div>
               </div>
           </div>
        </div>
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      $(document).ready(function(){

      
      var frm = document.querySelector("#frm");
      frm.addEventListener("submit",function(e){
        e.preventDefault();
        confirm();
      });
      function confirm(){
        const fruit = $("input[name='fruit']:checked"). val();
        var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              swal({
                    title: "Thank You",
                    text: this.response,
                    icon: "success",
                  });
                  
       fetch(`http://localhost/polling_app/api.php`)
                .then(res=>res.json())
                .then(data => {
                   console.log(data); 
                   var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',

                        // The data for our dataset
                        data: {
                            labels: ['apple','banana','mango','grapes'],
                            datasets: [{
                                label: ['apple','banana','mango','grapes'],
                                backgroundColor: ['#C39BD3','#76D7C4','#F9E79F','#F4D03F'],
                                borderColor: ['#C39BD3','#76D7C4','#F9E79F','#F4D03F'],
                                data: [data.record[0].apple,data.record[0].banana,data.record[0].mango,data.record[0].grape]
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });
                })
                .catch(err => {console.log(err)});

            }
          }
       xhttp.open("POST", "function.php", true);
       xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       xhttp.send("fruit="+fruit+"&pollsub=pollsub");
      }


      fetch(`http://localhost/polling_app/api.php`)
                .then(res=>res.json())
                .then(data => {
                   console.log(data); 
                   var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',

                        // The data for our dataset
                        data: {
                            labels: ['apple','banana','mango','grapes'],
                            datasets: [{
                                label: ['apple','banana','mango','grapes'],
                                backgroundColor: ['#C39BD3','#76D7C4','#F9E79F','#F4D03F'],
                                borderColor: ['#C39BD3','#76D7C4','#F9E79F','#F4D03F'],
                                data: [data.record[0].apple,data.record[0].banana,data.record[0].mango,data.record[0].grape]
                            }]
                        },

                        // Configuration options go here
                        options: {}
                    });
                })
                .catch(err => {console.log(err)});
      });
      
      
    </script>
  </body>
</html>