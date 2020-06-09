<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-pills" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Sistem</a>
          </li>
        </ul>
        <hr>
        <div class="tab-content " id="myTab3Content">
          <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
            <div class="row">
              <span id="urldashboard" url="<?=$url.'/getdata'?>"></span>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Responder</h4>
                      </div>
                      <div class="card-body">
                        <canvas id="responder"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
            <div class="row">
              <span id="urldashboard" url="<?=$url.'/getdata'?>"></span>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Jumlah Pengguna</h4>
                        </div>
                        <div class="card-body">
                          <span id="jumlahuser"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Log</h4>
                        </div>
                        <div class="card-body">
                          <span id="log"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Akses Sistem</h4>
                      </div>
                      <div class="card-body">
                        <canvas id="myChart2"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="fas fa-server"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Upload</h4>
                        </div>
                        <div class="card-body">
                          <span><?=$folderupload.' Mb'?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card card-statistic-1">
                      <div class="card-icon bg-warning">
                        <i class="fas fa-upload"></i>
                      </div>
                      <div class="card-wrap">
                        <div class="card-header">
                          <h4>Backup</h4>
                        </div>
                        <div class="card-body">
                          <span><?=$folderberkas.' Mb'?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>User</h4>
                      </div>
                      <div class="card-body">
                        <canvas id="chartuser"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>    
</div>

<script type="text/javascript">
  var url=$('#urldashboard').attr('url');

  $.getJSON( url, function( data ) {
      var labelakses=[];
      var dataakses=[];
      var jumlahlog=data['log']
      $(data[0]).each(function(i){
          labelakses.push(data[0][i].tanggal);
          dataakses.push(data[0][i].jumlah);
      });
      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labelakses.reverse(),
          datasets: [{
            label: 'Akses Sistem',
            data:dataakses.reverse(),
            borderWidth: 2,
            backgroundColor: '#6777ef',
            borderColor: '#6777ef',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: '#f2f2f2',
              },
              ticks: {
                beginAtZero: true,
                //stepSize: 5
              }
            }],
            xAxes: [{
              ticks: {
                display: false
              },
              gridLines: {
                display: false
              }
            }]
          },
        }
      });

      var labeluser=[];
      var datauser=[];
      var jumlahuser=data[2];
      $(data[1]).each(function(i){
          labeluser.push(data[1][i].tanggal);
          datauser.push(data[1][i].jumlah);
      });
      var ctxuser = document.getElementById("chartuser").getContext('2d');
      var chartuser = new Chart(ctxuser, {
        type: 'bar',
        data: {
          labels: labeluser.reverse(),
          datasets: [{
            label: 'Penambahan user',
            data:datauser.reverse(),
            borderWidth: 2,
            backgroundColor: '#FF3429',
            borderColor: '#FF3429',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: '#f2f2f2',
              },
              ticks: {
                beginAtZero: true,
                //stepSize: 5
              }
            }],
            xAxes: [{
              ticks: {
                display: false
              },
              gridLines: {
                display: false
              }
            }]
          },
        }
      });

      //RESPONDER
      var labelresponder=[];
      var dataresponder=[];
      $(data['responder']).each(function(i){
          labelresponder.push(data['responder'][i].tanggal);
          dataresponder.push(data['responder'][i].jumlah);
      });
      var ctxresponder = document.getElementById("responder").getContext('2d');
      var chartresponder = new Chart(ctxresponder, {
        type: 'bar',
        data: {
          labels: labelresponder.reverse(),
          datasets: [{
            label: 'Responder',
            data:dataresponder.reverse(),
            borderWidth: 2,
            backgroundColor: '#FF3429',
            borderColor: '#FF3429',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false,
                color: '#f2f2f2',
              },
              ticks: {
                beginAtZero: true,
                //stepSize: 5
              }
            }],
            xAxes: [{
              ticks: {
                display: false
              },
              gridLines: {
                display: false
              }
            }]
          },
        }
      });
      
      document.getElementById("jumlahuser").innerHTML=jumlahuser;
      document.getElementById("log").innerHTML=jumlahlog;
  });
</script>
