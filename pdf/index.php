<!DOCTYPE html>
<html>
    <head>
        <title>PDF</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <style>
            {
                background-color:yellow;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div style="background-color:white;border:1px solid #ccccc; padding: 16px;margin-top:40px">
                    <center><h3>Tickets Invoice</h3></center>
                    <table class="table table=hover">
                        <tr>
                        <th>Name</th>
                        <th>Booking ID</th>
                          <th>View</th>
                          <th>Download</th>
                        </tr>
                        <?php
                        $con=new PDO("mysql:host=localhost;dbname=tms","root","");
                        $query1=mysqli($con,"select id,fullname,mobilenumber,regdate from tblusers where id=14");;
                        $result=$con->prepare($query1);
                        $result->execute();
                        if($result->rowCount())
                        {
                            while($tblusers = $result->fetch())
                            { ?>
                                <tr>
                             <td></td>
                              <td></td>

                              <td>
                                <a href="link.php?id=<? php echo $tblusers['id'];?>">View online</a>
                              </td>
                             <td>
                                <a href="link.php?id=<? php echo $tblusers['id'];?>">Download</a>
                            </td>
                         </tr>
                         <?php
                            }
                        }
                        else{
                            echo "<br><br>Data Not Found";
                        }
                        ?>
                    </table>
                </div> 
            </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </body>
</html>
