<html>

<head>

    <title>Samaj Setu - Payment</title>

    <link rel="shortcut icon" href="<?=ASSETS_PATH?>images/favicon.png" /> 

    <link href="<?=ASSETS_PATH?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=ASSETS_PATH?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=ASSETS_PATH?>global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />

    <style>

    .invoice-box {

        max-width: 800px;

        margin: auto;

        padding: 30px;

        border: 1px solid #eee;

        box-shadow: 0 0 10px rgba(0, 0, 0, .15);

        font-size: 16px;

        line-height: 24px;

        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

        color: #555;

    }

    

    .invoice-box table {

        width: 100%;

        line-height: inherit;

        text-align: left;

    }

    

    .invoice-box table td {

        padding: 5px;

        vertical-align: top;

    }

    

    .invoice-box table tr td:nth-child(2) {

        text-align: right;

    }

    

    .invoice-box table tr.top table td {

        padding-bottom: 20px;

    }

    

    .invoice-box table tr.top table td.title {

        font-size: 45px;

        line-height: 45px;

        color: #333;

    }

    

    .invoice-box table tr.information table td {

        padding-bottom: 40px;

    }

    

    .invoice-box table tr.heading td {

        background: #eee;

        border-bottom: 1px solid #ddd;

        font-weight: bold;

    }

    

    .invoice-box table tr.details td {

        padding-bottom: 20px;

    }

    

    .invoice-box table tr.item td{

        border-bottom: 1px solid #eee;

    }

    

    .invoice-box table tr.item.last td {

        border-bottom: none;

    }

    

    .invoice-box table tr.total td:nth-child(2) {

        border-top: 2px solid #eee;

        font-weight: bold;

    }

    

    @media only screen and (max-width: 600px) {

        .invoice-box table tr.top table td {

            width: 100%;

            display: block;

            text-align: center;

        }

        

        .invoice-box table tr.information table td {

            width: 100%;

            display: block;

            text-align: center;

        }

    }

    

    /** RTL **/

    .rtl {

        direction: rtl;

        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;

    }

    

    .rtl table {

        text-align: right;

    }

    

    .rtl table tr td:nth-child(2) {

        text-align: left;

    }



    @media print

    {

        #non-printable { display: none; }

        #show_message {display: none;}

        #printable { display: block; }

        #my_logo {width: 50%!important;}

    }

    </style>

</head>



<body>

  <div id="show_message">

    <center>

      <?php if($payment == 'Successful'){ ?>

      <div class="alert alert-success" style="max-width: 800px;">

        <h4 class="block"><i class="fa fa-check"></i> Success! We recieved your payment</h4>

        <p> We sent you your bill number on your email. </p>

      </div>

    <?php } else if($payment == 'Failure') {?>

      <div class="alert alert-danger" style="max-width: 800px;">

        <h4 class="block"><i class="fa fa-times"></i> Fail! Transaction failed</h4>
        <p><?=$msg;?></p>

      </div>

    <?php } else if ($payment == 'Pending'){ ?>

      <div class="alert alert-warning" style="max-width: 800px;">

        <h4 class="block"><i class="fa fa-hourglass-half"></i> Pending! Transaction pending</h4>
        <p><?=$msg;?></p>
      </div>

    <?php } else { ?>

      <div class="alert alert-danger" style="max-width: 800px;">

        <h4 class="block"><i class="fa fa-times"></i> Error! Transaction failed</h4>
        <p><?="Something went wrong!";?></p>
      </div>

    <?php } ?>

  </center>

  </div>

    <div class="invoice-box" id="invoice-box">

        <table cellpadding="0" cellspacing="0">

            <tr class="top">

                <td colspan="2">

                    <table>

                        <tr>

                            <td class="title">

                                <img id="my_logo" src="<?=UPLOAD_PATH?>invoice_logo.png" style="width:100%; max-width:280px;"> 

                            </td>

                            

                            

                        </tr>

                    </table>

                </td>

            </tr>

            <tr class="information">

                <td colspan="2">

                    <table>

                        <tr>

                            <td>

                                Invoice: <?=$invoice;?><br>

                                Date: <?=$date;?><br>

                                Payment Status: <?=$payment;?><br>

                            </td>

                            

                            <td>

                                <i class="fa fa-user"></i>&nbsp;<?=$full_name_eng;?><br>

                                <i class="fa fa-phone"></i>&nbsp;<?=$mobile;?><br>

                                <i class="fa fa-envelope"></i>&nbsp;<?=$email;?>

                            </td>

                        </tr>

                    </table>

                </td>

            </tr>

            

            <tr class="heading">

                <td>

                    Description

                </td>

                

                <td>

                    Price

                </td>

            </tr>

            

            <tr class="item">

                <td>

                    Slider Advertisement (1 Year)

                </td>

                

                <td>

                    <?php
                    if(empty($amount) || $amount == "0")
                    echo "0";
                    else
                    echo $amount;   
                    ?>

                </td>

            </tr>

            

            <tr class="total">

                <td></td>

                

                <td>

                   Total: <?php
                    if(empty($amount) || $amount == "0")
                    echo "0";
                    else
                    echo $amount;   
                    ?>

                </td>

            </tr>

        </table>

    </div>

    <br>

    <div id="non-printable">

        <center><a href="javascript:;" onclick="window.print();" style="text-decoration: none;color: black;">

          <i class="fa fa-print"></i> &nbsp;Print Invoice</a><br><br>

          <a href="<?=home_url?>" style="text-decoration: none;color: black;">

        <i class="fa fa-home"></i> &nbsp;Go to Home Page</a></center>

    </div>

</body>

</html>