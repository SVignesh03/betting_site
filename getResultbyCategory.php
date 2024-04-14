<?php
ob_start();
session_start();
if ($_SESSION['frontuserid'] == "") {
    header("location:index.php");
    exit();
}

include("db.php"); // Assuming this file contains your database connection details

$category = $_POST['category'];
$userid = $_SESSION['frontuserid'];
$today = date('Y-m-d');
?>
    <div class="containerrecord text-center">
        <a href="#" class="recordlink">
            <p>
                <i class="icon ion-md-trophy"></i>
                <div class="title">Parity Record</div>
            </p>
        </a>
    </div>

    <div class="table-container" id="paritycontainer">
        <table class="table table-borderless table-hover" id="parityt">
            <thead>
                <tr>
                    <th>Period</th>
                    <th>Price</th>
                    <th>Number</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Assuming your table name is 'tbl_result' and the relevant field is 'category'
                $parityrecordQuery = mysqli_query($conn, "SELECT * FROM `tbl_result` ORDER BY id DESC LIMIT 480");
                $parityrecordRow = mysqli_num_rows($parityrecordQuery);

                if ($parityrecordRow == '') {
                    ?>
                    <tr>
                        <td colspan="4">
                            <div style="display: flex;">
                                <div class="spacer"></div>
                                <div>No data available!</div>
                                <div class="spacer"></div>
                            </div>
                        </td>
                    </tr>
                    <?php
                } else {
                    while ($parityResult = mysqli_fetch_array($parityrecordQuery)) {
                        if ($parityResult['resulttype'] == 'real') {
                            ?>
                            <tr>
                                <td><?php echo $parityResult['periodid']; ?></td>
                                <td><?php echo $parityResult['price']; ?></td>
                                <td>
                                    <span style="color: <?php
                                        if ($parityResult['color'] == 'green') {
                                            echo "#1DCC70";
                                        } elseif ($parityResult['color'] == 'red') {
                                            echo "#ff2d55";
                                        } else {
                                            echo "#9c27b0"; // Assuming other colors are represented by a single color code in your database
                                        }
                                        ?>">
                                        <?php echo $parityResult['result']; ?>
                                    </span>
                                </td>
                                <td>
                                    <div style="display: flex;">
                                        <div class="spacer"></div>
                                        <?php
                                        if ($parityResult['color'] == 'GREEN') {
                                            ?>
                                            <div class="point green" style="background:#1DCC70;"></div>
                                            <?php
                                        } elseif ($parityResult['color'] == 'RED') {
                                            ?>
                                            <div class="point red" style="background:#ff2d55;"></div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="point" style="background:#9c27b0;"></div>
                                            <?php
                                        }
                                        ?>
                                        <div class="spacer"></div>
                                    </div>
                                </td>
                            </tr>
                            <?php }}} ?>