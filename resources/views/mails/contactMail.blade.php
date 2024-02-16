        <!DOCTYPE html>
        <html lang="en">
        <body>
        <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <h2>Full Name: {{ $data['firstName'] }} {{$data['lastName']}}</h2>
                  <br>
                  <h2>Email: {{ $data['email'] }}</h2>
                   <br>
                  <h2>Message Content:</h2>
                  <p>{{ $data['message'] }}</p>
                </div>
              </div>
            </div>
        </body>
        </html>