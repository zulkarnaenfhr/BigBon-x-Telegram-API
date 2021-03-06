<?php 
    $sumber = "https://api.bingbon.com/api/v1/market/symbols";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- link css navbar  -->
    <link rel="stylesheet" href="style.css">
    <title>Homepage Bigbon API Website</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a id="homeBrand" class="navbar-brand" href="">BigBon API x Kelompok 7</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a id="navbar-menu" class="nav-link active" aria-current="page" href="sendNotificationMaster.php">Message status bot telegram</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="liveMarket">
            <div class="container-fluid">
                <div class="container">
                    <p class="liveMarket-Title">Cryptocurrency x Bigbon API Homepage</p>
                    <div class="row">
                        <div class="col-6 indicatorLeftSection">
                            <p><span class="liveMarket-Time" id="date"></span> <span class="liveMarket-Time"
                                    id="month"></span> <span class="liveMarket-Time" id="year"></span>,
                                <span class="liveMarket-Time" id="hours"></span>.<span class="liveMarket-Time"
                                    id="minute"></span>.<span class="liveMarket-Time" id="second"></span>
                            </p>
                        </div>
                        <div class="col-6 indicatorRightSection">
                            <a href="liveCryptoMarket.html">
                                <button class="spaceCaptButton">View Live Market</button>
                            </a>
                        </div>
                    </div>
                    <table class="tableOutput">
                        <tr>
                            <th class="tableNomor">No</th>
                            <th class="tableAsset">Asset</th>
                            <th class="tablePair">Pair</th>
                            <th class="tableLast">Last Price</th>
                            <th class="tableHigh">High</th>
                            <th class="tableLow">Low</th>
                            <th class="tableLastLow">H-Last</th>
                            <th class="tableLastHigh">Last-L</th>
                        </tr>
                        <?php 
                            $nomor = 1;
                            foreach($data["data"]["result"] as $row){
                        ?>
                        <tr>
                            <th class="tableBawah">
                                <?php echo $nomor++ ?>
                            </th>
                            <th class="tableBawah">
                                <?php echo $row["base_currency"] ?>
                            </th>
                            <th class="tableBawah">
                                <?php echo $row["quote_currency"] ?>
                            </th>
                            <th class="tableBawah">
                                <?php echo $row["last_price"] ?>
                            </th>
                            <th class="tableBawah">
                                <?php echo $row["high"] ?>
                            </th>
                            <th class="tableBawah">
                                <?php echo $row["low"] ?>
                            </th>
                            <th class="tableBawah">
                                <?php 
                                    $isLastLow = $row["high"] - $row["last_price"];
                                    echo number_format($isLastLow,4);
                                ?>
                            </th>
                            <th class="tableBawah">
                                <?php 
                                    $isLastHigh = $row["last_price"] - $row["low"];
                                    echo number_format($isLastLow,4);
                                ?>
                            </th>
                        </tr>
                        <?php 
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>
        <section id="footer">
            <p class="textFooter">Design and Developed by <span>SpaceCapt Tech Industry</span> @2021</p>
        </section>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>