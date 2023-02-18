<?php
// include('authentication.php');
// include('adminclaimAuth.php');

//$userProperties = $_SESSION['userProperties'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="./CSS/stylepaid.css">
	<link rel="shortcut icon" type="image/x-icon" href="./svg.png">
	
</head>

<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <a class="navbar-brand tm" href="logout.php">24hrfx trading org</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="packages.php">PACKAGES</a>
                        </li>
                       <li class="nav-item">
                           <a class="nav-link" href="paid2.php">PAID</a>
                          </li> 
                        
						  <?php
                          if(!isset($_SESSION['verifiedUserId'])){

                          
                          ?>
                           <li class="nav-item">
                           <a class="nav-link active" aria-current="page" href="landingpage.php">LOGIN</a>
                        </li>
                           
                        <li class="nav-item">
                           <a  class="nav-link active" aria-current="page" href="signinform.php" >Sign Up</a>
                        </li>
                          <?php
                          }else{
                          ?>
                                                              
                        <li class="nav-item">
                          <a class="nav-link active btn btn- btn-sm btn-hover "id="btnlog"ccc aria-current="page" href="logout.php">RefreshSession</a>
                        </li>
                        <?php
                        
                       }
                          
                          ?>
                        
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>


<body class="container">
		<div class="col-xl-12 col-12 col-md-12">
											<!-- Grid Item -->
											<!-- TradingView Widget BEGIN -->
			<div class="tradingview-widget-container mb-1-5m" style="width: 100%; height: 46px;">
								<iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22OANDA%3ASPX500USD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22OANDA%3ANAS100USD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%5D%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22displayMode%22%3A%22regular%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A46%2C%22utm_source%22%3A%22forex-tradinginvestors.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%2C%22page-uri%22%3A%22forex-tradinginvestors.com%2Fdashboard%22%7D" style="box-sizing: border-box; height: 46px; width: 100%;"></iframe>
								
							<style>
								.tradingview-widget-copyright {
									font-size: 13px !important;
									line-height: 32px !important;
									text-align: center !important;
									vertical-align: middle !important;
									/* @mixin sf-pro-display-font; */
									font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
									color: #9db2bd !important;
								}

								.tradingview-widget-copyright .blue-text {
									color: #2962FF !important;
								}

								.tradingview-widget-copyright a {
									text-decoration: none !important;
									color: #9db2bd !important;
								}

								.tradingview-widget-copyright a:visited {
									color: #9db2bd !important;
								}

								.tradingview-widget-copyright a:hover .blue-text {
									color: #1E53E5 !important;
								}

								.tradingview-widget-copyright a:active .blue-text {
									color: #1848CC !important;
								}

								.tradingview-widget-copyright a:visited .blue-text {
									color: #2962FF !important;
								}
						</style>
				</div>
							<!-- TradingView Widget END -->
			</div>

			<?php
if(isset($_SESSION['status']))
{
    echo"<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
    unset($_SESSION['status']);
}

?>
   

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					
					<div class="card hold">
						<div class="card-header hold">
							<h2>
								Top 5 24HRFXTRADINGORG paid users information
							</h2>
						</div>
						<div class="card-body container hold">
							<table class=" table table-bordered table-striped">
								<thead>
									<tr>
										<th>S1.no</th>
										<th>UserName</th>
										<th>Date</th>
										<th>Amount</th>
                                        <th>Edit</th>
									</tr>
								</thead>
								<tbody>
								<?php
									include('conndb.php');
									
									
									$users=$auth->listUsers();
									$result=$database->getReference('paidTable/')->getValue();
									
									if($result > 0)
									
									{
										$i=1;
										foreach($result as $key => $row){
								?>
											<tr>
											<td><?=$i++;?></td>
											<td><?=$row['userName']?></td>
											<td><?=$row['date']?></td>
											<td><?=$row['Amount']?></td>
                                            <td>
												<a href="paid2editchange.php?id=<?=$key;?>" class="btn btn-primary btn-sm">Edit</a>
											</td>
											
										
											</tr>
                                            <tr>
                                            <td><?=$i++;?></td>
											<td><?=$row['userName1']?></td>
											<td><?=$row['date1']?></td>
											<td><?=$row['Amount1']?></td>  
                                            </tr>
                                            <tr>
                                            <td><?=$i++;?></td>
											<td><?=$row['username2']?></td>
											<td><?=$row['date2']?></td>
											<td><?=$row['Amount2']?></td>
                                            </tr>
                                            <tr>
                                            <td><?=$i++;?></td>
											<td><?=$row['username3']?></td>
											<td><?=$row['date3']?></td>
											<td><?=$row['Amount3']?></td>
                                            </tr>
                                            <tr>
                                            <td><?=$i++;?></td>
											<td><?=$row['userName4']?></td>
											<td><?=$row['date4']?></td>
											<td><?=$row['Amount4']?></td>
                                            </tr>
								<?php
										}
									 } else{tr
								?>
											<tr>
											<td colspan="?">No Record Found</td>
										</tr>

								<?php

									 }

									?>

								</tbody>
									




							</table>

						</div>
					</div>

				</div>
		</div>

	</div>


								
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>