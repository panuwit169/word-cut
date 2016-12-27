<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>โปรแกรมตัดคำไทย</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
    .btn-circle.btn-lg {
      width: 50px;
      height: 50px;
      padding: 10px 18px;
      font-size: 18px;
      line-height: 1.33;
      border-radius: 25px;
      }
      div.filter-title, h2.filter-title {
          background: url(http://geometrybrand.com/skin/frontend/smartwave/porto/images/slider-bar.png) right no-repeat;
          font-size: 16px;
          font-weight: 300;
          line-height: 42px;
          margin: 0;
          color: #313131;
          text-transform: uppercase;
          text-align: center;
      }
    </style>

  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">โปรแกรมตัดคำไทย</a>
        <ul class="nav navbar-nav pull-right">
          <li><a href="#!" data-toggle="modal" data-target="#myModal">About</a></li>
        </ul>
      </div>
    </nav>

    <div style="padding-top:100px">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <form id="myform" method="post">
                <label>กรุณาใส่ประโยคที่ต้องการ</label>
                <textarea class="form-control" id="transcript" name="transcript" rows="6"><?php echo isset($_POST['transcript'])?  trim($_POST['transcript']):'' ?></textarea><br>
                <div class="row">
                  <div class="text-left" style="position: absolute;"><button class="btn btn-default" id="start_button">พูด</button></div>
                  <div class="text-right"><button class="btn btn-default" onclick="javascript:eraseText();">Clear</button></div>
                </div>
          </div>
          <div class="col-md-2">
                <br><br>
                <center><button type="submit" class="btn btn-danger btn-circle btn-lg"><i class="glyphicon glyphicon-forward"></i></button></center>
            </form>
          </div>
          <div class="col-md-5">
            <label>ผลลัพธ์</label>
            <textarea class="form-control" rows="6" id="output" readonly><?php
            if ($_POST) {
                $time_start = microtime(true);
                $text_to_segment = trim($_POST['transcript']);
                include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'doc/segment.php');
                $segment = new Segment();
                $result = $segment->get_segment_array($text_to_segment);
                echo implode(' | ', $result);
            }
            ?></textarea>
          </div>
        </div>
      </div>
    </div>

    <footer style="padding-top:100px">
      <div class="container">
        <h2 class="filter-title" style="text-align:center">
            <span class="content" style="font-size:16px;letter-spacing:1px;background-color: #fff;padding: 20px;display: inline;"><img src="http://authen.eduroam.kmutnb.ac.th/images/kmutnb.png" height="125px"></span>
        </h2><br>
        <p style="text-align:center">
          <strong>ARTIFICIAL INTELLIGENCE</strong><br>IT3-RA
        </p>
      </div>
    </footer>

    <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ผู้จัดทำ</h4>
          </div>
          <div class="modal-body">
            <table align="center">
              <tr>
                <td>นาย ธีรรักษ์&nbsp;</td>
                <td>ศศิพงษ์&nbsp;</td>
                <td>5706021620041</td>
              </tr>
              <tr>
                <td>นาย วิศรุต&nbsp;</td>
                <td>ยาวุธ&nbsp;</td>
                <td>5706021610118</td>
              </tr>
              <tr>
                <td>นาย ภาณุวิชญ์&nbsp;</td>
                <td>สัตยาวัฒนากุล&nbsp;</td>
                <td>5706021620059</td>
              </tr>
              <tr>
                <td>นาย พนมกร&nbsp;</td>
                <td>นกน้อย&nbsp;</td>
                <td>5706021620156</td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/speech.js"></script>
    <script>
      function eraseText() {
          document.getElementById("output").value = "";
          document.getElementById("transcript").value = "";
        }
    </script>
  </body>
</html>
